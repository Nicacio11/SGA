<?php
  class AtividadeDAO extends BaseDAO{

    public function __construct(){
      parent::__construct();
    }

    public function adicionar($atividade){
      $sql = $this->db->prepare("INSERT INTO atividade (titulo, descricao, data, Usuario_idUsuario) VALUES(:titulo, :descricao, :data, :idUsuario)");
      $sql->bindValue(":titulo", $atividade->getTitulo());
      $sql->bindValue(":descricao", $atividade->getDescricao());
      $sql->bindValue(":data", $atividade->getData());
      $sql->bindValue(":idUsuario", unserialize($_SESSION['usuario'])->getId());
      if($sql->execute()){
        $lastId = $this->db->lastInsertId();
        $this->insertImage($lastId, $atividade->getImage());
        return true;
      }
      return false;
    }
    public function insertImage($id, $image){
      $nomedoarquivo = md5(time().rand(0, 99));
      $im = $image->getImagePath();

      if($im['type']=='image/jpg'){
        $nomedoarquivo = '.jpg';
      }else if($im['type']== 'jpeg'){
        $nomedoarquivo = $nomedoarquivo.'.jpeg';
      }else{
        $nomedoarquivo = $nomedoarquivo.'.png';
      }

      $sql = $this->db->prepare("INSERT INTO atividade_image (Atividade_idAtividade, imagePath) VALUES (:fk, :imagePath)");
      $sql->bindValue(":fk", $id);
      $sql->bindValue(":imagePath", $nomedoarquivo);
      $sql->execute();

      move_uploaded_file($im['tmp_name'], "assets/images/atividades/".$nomedoarquivo);

    }

    public function alterar($atividade){
      $retorno = false;
      try{

          $nomedoarquivo = md5(time().rand(0, 99));
          $im = $atividade->getImage()->getImagePath();
          if($im['type']=='image/jpg'){
            $nomedoarquivo = '.jpg';
          }else if($im['type']== 'image/png'){
            $nomedoarquivo = $nomedoarquivo.'.png';
        }else{
          $nomedoarquivo = $nomedoarquivo.'.jpeg';
        }

        $sql = $this->db->prepare(
          "UPDATE atividade
          SET atividade.titulo=:titulo,
          atividade.data=:data,
          atividade.descricao=:descricao
          WHERE atividade.idAtividade=:idAtividade;"
        );
        $sql->bindValue(":titulo", $atividade->getTitulo());
        $sql->bindValue(":data", $atividade->getData());
        $sql->bindValue(":descricao", $atividade->getDescricao());
        $sql->bindValue(":idAtividade", $atividade->getId());

        if($sql->execute()){

          if($this->getToDelete($atividade->getId())){
              $sqlImage = $this->db->prepare(
                "UPDATE atividade_image
                SET imagePath=:imagePath
                WHERE Atividade_idAtividade=:idU;"
              );
              $sqlImage->bindValue(":imagePath", $nomedoarquivo);
              $sqlImage->bindValue(":idU", $atividade->getId());
              if($sqlImage->execute()){
                  move_uploaded_file($im['tmp_name'], "assets/images/atividades/".$nomedoarquivo);
                  $retorno = true;
                }
              }
          }

      }catch(Exception $e){
        throw $e;
      }
      return $retorno;
    }
    public function getAtividades($page, $perPage){
      $offset = ($page - 1) * $perPage;

      $array = array();
      $sql= $this->db->prepare("SELECT atividade.idAtividade,
        atividade.titulo,
        atividade.descricao,
        atividade.data,
        usuario.nome,
        usuario_image.imagePath as imagePath,
        atividade_image.imagePath as aImagePath
        FROM atividade
        INNER JOIN usuario ON atividade.Usuario_idUsuario = usuario.idUsuario
        INNER JOIN usuario_image ON usuario.idUsuario=usuario_image.Usuario_idUsuario
        INNER JOIN atividade_image ON atividade_image.Atividade_idAtividade = atividade.idAtividade
        ORDER BY idAtividade DESC LIMIT $offset, $perPage;");

        $sql->execute();

        foreach ($sql->fetchAll() as $activity) {
          $image = new Image();
          $image->setImagePath($activity['aImagePath']);

          $atividade = new Atividade($activity['titulo'],
                                    $activity['descricao'],
                                    $image,
                                    $activity['data']
                                    );
          $atividade->setId($activity['idAtividade']);
          $usuario = new Usuario();
          $usuario->setNome($activity['nome']);
          $uimage= new Image();
          $uimage->setImagePath($activity['imagePath']);
          $usuario->setImage($uimage);
          $atividade->setUsuario($usuario);
          $array[] = $atividade;
        }
        return $array;
      }
  public function getAtividadesLike($like, $page, $perPage){

      $array = array();
      $sql= $this->db->prepare("SELECT atividade.idAtividade,
        atividade.titulo,
        atividade.descricao,
        atividade.data,
        usuario.nome,
        usuario_image.imagePath as imagePath,
        atividade_image.imagePath as aImagePath
        FROM atividade
        INNER JOIN usuario ON atividade.Usuario_idUsuario = usuario.idUsuario
        INNER JOIN usuario_image ON usuario.idUsuario=usuario_image.Usuario_idUsuario
        INNER JOIN atividade_image ON atividade_image.Atividade_idAtividade = atividade.idAtividade
        WHERE atividade.titulo LIKE '%$like%' 
        ORDER BY idAtividade DESC 
        ");

        $sql->execute();

        foreach ($sql->fetchAll() as $activity) {
          $image = new Image();
          $image->setImagePath($activity['aImagePath']);

          $atividade = new Atividade($activity['titulo'],
                                    $activity['descricao'],
                                    $image,
                                    $activity['data']
                                    );
          $atividade->setId($activity['idAtividade']);
          $usuario = new Usuario();
          $usuario->setNome($activity['nome']);
          $uimage= new Image();
          $uimage->setImagePath($activity['imagePath']);
          $usuario->setImage($uimage);
          $atividade->setUsuario($usuario);
          $array[] = $atividade;
        }
        return $array;
      }



    public function apagar($id){
      $retorno= false;
      $image = $this->getToDelete($id);
      $sql = $this->db->prepare("DELETE FROM atividade_image WHERE Atividade_idAtividade=:id");
      $sql->bindValue("id", $id);
      if($sql->execute()){
        $sql = $this->db->prepare("DELETE FROM atividade WHERE idAtividade=:ida");
        $sql->bindValue("ida", $id);
        if($sql->execute()){
          $retorno = true;
        }


      }
      return $retorno;
    }
    public function getToDelete($id){
      if(isset($id)){
        $sql = $this->db->prepare("SELECT imagePath from atividade_image Where Atividade_idAtividade=:uid");
        $sql->bindValue(":uid", $id);
        if($sql->execute()){
          if($sql->rowCount()>0){
            $dado = $sql->fetch();
            if(unlink("assets/images/atividades/".$dado['imagePath'])){
              return true;
            }
          }
        }
        return false;
      }
    }
    public function getTotal(){
      $sql = $this->db->query("SELECT COUNT(*) as c FROM atividade");
      $data = $sql->fetch();

      return $data['c'];
    }
    public function getAtividade($id){
      $sql = $this->db->prepare("SELECT atividade.titulo,
        atividade.descricao,
        atividade.data,
        atividade_image.imagePath as imagemAtividade,
        usuario.nome,
        usuario_image.imagePath as imagemUsuario
        FROM atividade
        INNER JOIN atividade_image ON atividade.idAtividade = atividade_image.Atividade_idAtividade
        INNER JOIN usuario ON usuario.idUsuario = atividade.Usuario_idUsuario
        INNER JOIN usuario_image ON usuario_image.Usuario_idUsuario = usuario.idUsuario
        WHERE atividade.idAtividade = :id");
        $sql->bindValue(":id", "$id");
        if($sql->execute()){
          if($sql->rowCount()>0){
            $data = $sql->fetch();
            $image = new Image();
            $image->setImagePath($data['imagemAtividade']);
            $atividade = new Atividade(
              $data['titulo'],
              $data['descricao'],
              $image,
              $data['data']
            );
            $uimage = new Image();
            $uimage->setImagePath($data['imagemUsuario']);
            $usuario = new Usuario();
            $usuario->setImage($uimage);
            $usuario->setNome($data['nome']);
            $atividade->setUsuario($usuario);

            return $atividade;
          }

        }
        return null;
    }
    public function getLastAtividades(){
      $array;
      $sql = $this->db->prepare("SELECT atividade.idAtividade, atividade.titulo,
        atividade.descricao,
        atividade.data,
        atividade_image.imagePath as imagemAtividade,
        usuario.nome,
        usuario_image.imagePath as imagemUsuario
        FROM atividade
        INNER JOIN atividade_image ON atividade.idAtividade = atividade_image.Atividade_idAtividade
        INNER JOIN usuario ON usuario.idUsuario = atividade.Usuario_idUsuario
        INNER JOIN usuario_image ON usuario_image.Usuario_idUsuario = usuario.idUsuario
        ORDER BY idAtividade DESC LIMIT 10");
        if($sql->execute()){
          if($sql->rowCount()>0){
            foreach ($sql->fetchAll() as $data) {
            $image = new Image();
            $image->setImagePath($data['imagemAtividade']);
            $atividade = new Atividade(
              $data['titulo'],
              $data['descricao'],
              $image,
              $data['data']
            );
            $atividade->setId($data['idAtividade']);
            $array[]=$atividade;
            }
            

            return $array;
          }

        }
        return null;
    }
}
