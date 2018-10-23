
<?php

  class GaleriaDAO extends BaseDAO{


    public function __construct(){
      parent::__construct();
    }

    public function adicionar($galeria){
      print_r($galeria);
      $sql = $this->db->prepare("INSERT INTO galeria (titulo, Usuario_idUsuario) VALUES(:titulo, :idpessoa)");
      $sql->bindValue(":titulo", $galeria->getTitulo());
      $sql->bindValue(":idpessoa", unserialize($_SESSION['usuario'])->getId());
      if($sql->execute()){
        return true;
      }else{
        return false;
      }
    }
    public function getGalerias($page, $perPage){
      $offset = ($page - 1) * $perPage;

      $array = array();

        $sql = $this->db->prepare("SELECT idGaleria, titulo
        FROM galeria
        ORDER BY idGaleria DESC LIMIT $offset, $perPage;
        ");
        $sql->execute();

        foreach ($sql->fetchAll() as $activity) {
          $galeria = new Galeria();
          $galeria->setTitulo($activity['titulo']);
          $galeria->setId($activity['idGaleria']);
          $galeria->setImage($this->getImage($galeria->getId()));
          $array[] = $galeria;
        }
        return $array;
      }
      public function getGaleriasLike($like ,$page, $perPage){
      $offset = ($page - 1) * $perPage;

      $array = array();

        $sql = $this->db->prepare("SELECT idGaleria, titulo
        FROM galeria
        WHERE galeria.titulo LIKE '%$like%' ORDER BY idGaleria DESC;
        ");
        $sql->execute();

        foreach ($sql->fetchAll() as $activity) {
          $galeria = new Galeria();
          $galeria->setTitulo($activity['titulo']);
          $galeria->setId($activity['idGaleria']);
          $galeria->setImage($this->getImage($galeria->getId()));
          $array[] = $galeria;
        }
        return $array;
      }
    public function getImage($id){
      $array = array();
      $sql = $this->db->prepare("SELECT imagePath FROM galeria_image WHERE Galeria_idGaleria=$id");
      $sql->execute();
      if($sql->rowCount()>0){
        foreach ($sql->fetchAll() as $foto) {
          $image = new Image();
          $image->setImagePath($foto['imagePath']);
          $array[] = $image;
        }
      }
      return $array;

    }
    public function getLastGaleria(){
      $galeria = new Galeria();
      $sql = $this->db->prepare("SELECT galeria.titulo, galeria.idGaleria 
        FROM galeria 
        ORDER BY galeria.idGaleria DESC LIMIT 1");
      $sql->execute();
      if($sql->rowCount()>0)

        $gal = $sql->fetch();          
        $galeria->setTitulo($gal['titulo']);
        $galeria->setId($gal['idGaleria']);
        $galeria->setImage($this->get($galeria->getId()));
        return $galeria;
      }

    public function get($id){
      $array = array();
      $sql = $this->db->prepare("SELECT galeria_image.idGaleria_Foto, galeria_image.imagePath 
        FROM galeria_image 
        WHERE Galeria_idGaleria=$id");
      $sql->execute();
      if($sql->rowCount()>0)

        foreach ($sql->fetchAll() as $gal) {
          
          $image = new Image();
          $image->setImagePath($gal['imagePath']);
          $image->setId($gal['idGaleria_Foto']);
          $array[]=$image;
        }
        return $array;
    }

      public function getGaleria($id){
        $sql= $this->db->prepare("SELECT idGaleria, titulo FROM galeria WHERE idGaleria=:id");
        $sql->bindValue(":id", $id);
        if($sql->execute()){
          if($sql->rowCount()>0){
            $data = $sql->fetch();
            $galeria = new Galeria();
            $galeria->setId($data['idGaleria']);
            $galeria->setTitulo($data['titulo']);
            return $galeria;
          }
        }
      }

      public function alterar($galeria){
        $sql = $this->db->prepare("UPDATE galeria SET titulo = :titulo WHERE idGaleria = :id");
        $sql->bindValue(":titulo", $galeria->getTitulo());
        $sql->bindValue(":id", $galeria->getId());
        if($sql->execute()){
          return true;
        }
        return false;
      }
      public function getTotal(){
        $sql = $this->db->query("SELECT COUNT(*) as c FROM galeria");
        $data = $sql->fetch();

        return $data['c'];
      }
      public function getFoto($id, $page, $perPage){
        $offset = ($page - 1) * $perPage;
        $array = array();
        $sql = $this->db->prepare("SELECT idGaleria_Foto, imagePath
          FROM galeria_image WHERE Galeria_idGaleria= :id
          LIMIT $offset, $perPage");
          $sql->bindValue(":id", $id);
          $sql->execute();
          if($sql->rowCount()>0){
            foreach($sql->fetchAll() as $dado){
              $image = new Image();
              $image->setId($dado['idGaleria_Foto']);
              $image->setImagePath($dado['imagePath']);
              $array[] = $image;
            }
          }
          return $array;
        }
        /**
        * Description - insere image no banco
        * @author Vitor
        * @param id - id da galeria
        * @param image {Image} - objeto image
        */
        public function insertImage($id, $image){
          $nomedoarquivo = md5(time().rand(0, 99));
          $im = $image->getTipo();

          if($im=='image/jpg'){
            $nomedoarquivo = '.jpg';
          }else if($im== 'jpeg'){
            $nomedoarquivo = $nomedoarquivo.'.jpeg';
          }else{
            $nomedoarquivo = $nomedoarquivo.'.png';
          }

          $sql = $this->db->prepare("INSERT INTO galeria_image (Galeria_idGaleria, imagePath) VALUES (:fk, :imagePath)");
          $sql->bindValue(":fk", $id);
          $sql->bindValue(":imagePath", $nomedoarquivo);
          $sql->execute();

          move_uploaded_file($image->getImagePath(), "assets/images/galerias/".$nomedoarquivo);

        }
        public function alterarFoto($image){
          $nomedoarquivo = md5(time().rand(0, 99));
          $im = $image->getTipo();

          if($im=='image/jpg'){
            $nomedoarquivo = '.jpg';
          }else if($im== 'jpeg'){
            $nomedoarquivo = $nomedoarquivo.'.jpeg';
          }else{
            $nomedoarquivo = $nomedoarquivo.'.png';
          }
            $this->getToDelete($image->getId(), "idGaleria_Foto");
          $sql = $this->db->prepare("UPDATE galeria_image SET imagePath=:imagePath WHERE idGaleria_Foto=:id");
          $sql->bindValue(":imagePath", $nomedoarquivo);
          $sql->bindValue(":id", $image->getId());
          if($sql->execute()){
            move_uploaded_file($image->getImagePath(), "assets/images/galerias/".$nomedoarquivo);
          }
        }
        public function getToDelete($id, $fk){
          if(isset($id)){
            $sql = $this->db->prepare("SELECT imagePath from galeria_image Where $fk=:uid");
            $sql->bindValue(":uid", $id);
            if($sql->execute()){
              if($sql->rowCount()>0){

                $dado = $sql->fetch();
                  unlink("assets/images/galerias/".$dado['imagePath']);
                
                return true;
              }
            }
            return false;
          }
        }
        public function getTotalById($id){
          $sql = $this->db->prepare("SELECT COUNT(*) as c FROM galeria_image Where Galeria_idGaleria=:uid");
          $sql->bindValue(":uid", $id);
          $sql->execute();
          $data = $sql->fetch();

          return $data['c'];
        }
 public function getImageById($id){
      $foto;

      $sql = $this->db->prepare("SELECT idGaleria_Foto ,imagePath FROM galeria_image WHERE idGaleria_Foto = :id");
      $sql->bindValue(":id", $id);
      $sql->execute();

      if($sql->rowCount()>0){
        $dado = $sql->fetch();
        $foto = new Image();
        $foto->setId($dado['idGaleria_Foto']);
        $foto->setImagePath($dado['imagePath']);
        return $foto;
      }
      return null;
    }
    public function apagarFoto($id){
      $this->getToDelete($id, "idGaleria_Foto");
      $sql = $this->db->prepare("DELETE FROM galeria_image WHERE idGaleria_Foto = :id");
      $sql->bindValue(":id", $id);
      if($sql->execute()){
        return true;
      }      
    }

    public function apagar($id){
      $sqlGet = $this->db->prepare("SELECT idGaleria_Foto FROM galeria_image WHERE Galeria_idGaleria=$id");
      if($sqlGet->execute()){
        foreach ($sqlGet->fetchAll() as $im) {
          $this->getToDelete($im['idGaleria_Foto'], "idGaleria_Foto");
        }
       $sql = $this->db->prepare("DELETE FROM galeria_image WHERE Galeria_idGaleria=$id;
        DELETE FROM galeria WHERE idGaleria = $id");
       $sql->execute();
      }
    }
  }


?>
