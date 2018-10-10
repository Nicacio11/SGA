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
          $usuario = new Usuario();
          $usuario->setNome($activity['nome']);
          $image->setImagePath($activity['imagePath']);
          $atividade->setUsuario($usuario);
          $array[] = $atividade;
        }
        return $array;
      }

      

    public function apagar($id){
      $retorno= false;
      $sql = $this->db->prepare("DELETE FROM atividade WHERE idAtividade=:id");
      $sql->bindValue("id", $id);
      if($sql->execute()){
        $retorno = true;
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
            unlink("assets/images/atividades/".$dado['imagePath']);
            return true;
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
}
