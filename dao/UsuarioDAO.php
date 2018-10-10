<?php

  class UsuarioDAO extends BaseDAO{

    public function autenticar($user, $pass){

      $usuario;
      $sql = $this->db->prepare("SELECT idUsuario, login, nome, active FROM usuario WHERE login=:usuario AND senha=:senha");
      $sql->bindValue(":usuario", $user);
      $sql->bindValue(":senha", md5($pass));
      $sql->execute();
      if($sql->rowCount()){
        $usuario = new Usuario();
        $dadosSQL = $sql->fetch();
        $usuario->setId($dadosSQL['idUsuario']);
        $usuario->setNome($dadosSQL['nome']);
        $usuario->setUsuario($dadosSQL['login']);
        $usuario->setActive($dadosSQL['active']);
        $usuario->setImage($this->getImage($usuario->getId()));
        return $usuario;
      }
      return null;
    }

    /**
    *Description - cadastra usuario no banco
    *@author Vitor
    *@param usuario {Usuario} - objeto usuario
    */
    public function cadastrar($usuario){
        if( $this->usuarioExists($usuario->getUsuario()) == false){
          $sql = $this->db->prepare("INSERT INTO usuario (login, senha, nome, active) VALUES (:login, :senha, :nome, :active)");
          $sql->bindValue(":login", $usuario->getUsuario());
          $sql->bindValue(":senha", $usuario->getSenha());
          $sql->bindValue(":nome", $usuario->getNome());
          $sql->bindValue(":active", $usuario->getActive());
          $sql->execute();
          $lastId = $this->db->lastInsertId();

          $this->insertImage($lastId, $usuario->getImage());
          return true;
        }else{
          return false;
        }

    }

    /**
    * Description - insere image no banco
    * @author Vitor
    * @param id - ultimo id de usuario adicionado
    * @param image {Image} - objeto image
    */
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

      $sql = $this->db->prepare("INSERT INTO usuario_image (Usuario_idUsuario, imagePath) VALUES (:fk, :imagePath)");
      $sql->bindValue(":fk", $id);
      $sql->bindValue(":imagePath", $nomedoarquivo);
      $sql->execute();

      move_uploaded_file($im['tmp_name'], "assets/images/usuarios/".$nomedoarquivo);

    }
    public function getImage($id){
      $foto;

      $sql = $this->db->prepare("SELECT idUsuario_image ,imagePath FROM usuario_image WHERE Usuario_idUsuario = :id");
      $sql->bindValue(":id", $id);
      $sql->execute();

      if($sql->rowCount()>0){
        $dado = $sql->fetch();
        $foto = new Image();
        $foto->setId($dado['idUsuario_image']);
        $foto->setImagePath($dado['imagePath']);
        return $foto;
      }
      return null;
    }
    public function getUsuarioById($id){

      $usuario;
      $sql = $this->db->prepare(
        "SELECT idUsuario, login, nome, imagePath, active FROM usuario
        INNER JOIN usuario_image on usuario.idUsuario=usuario_image.Usuario_idUsuario
        WHERE idUsuario=:idUsuario"
      );
      $sql->bindValue(":idUsuario", $id);
      $sql->execute();
      if($sql->rowCount()){
        $usuario = new Usuario();
        $dadosSQL = $sql->fetch();
        $usuario->setUsuario($dadosSQL['login']);
        $usuario->setNome($dadosSQL['nome']);
        $usuario->setActive($dadosSQL['active']);
        $image = new Image();
        $image->setImagePath($dadosSQL['imagePath']);
        $usuario->setImage($image);
        return $usuario;

    }
    return null;
  }
  public function alterar($usuario){
    try{

        $nomedoarquivo = md5(time().rand(0, 99));
        $im = $usuario->getImage()->getImagePath();
        if($im['type']=='image/jpg'){
          $nomedoarquivo = '.jpg';
        }else if($im['type']== 'image/png'){
          $nomedoarquivo = $nomedoarquivo.'.png';
      }else{
        $nomedoarquivo = $nomedoarquivo.'.jpeg';
      }
      echo $nomedoarquivo;

      $sql = $this->db->prepare(
        "UPDATE usuario
        SET usuario.login=:usuario,
        usuario.senha=:senha,
        usuario.nome=:nome,
        usuario.active=:active
        WHERE usuario.idUsuario=:idUsuario;"
      );
      $sql->bindValue(":usuario", $usuario->getUsuario());
      $sql->bindValue(":senha", $usuario->getSenha());
      $sql->bindValue(":nome", $usuario->getNome());
      $sql->bindValue(":active", $usuario->getActive());
      $sql->bindValue(":idUsuario", $usuario->getId());
      $sql->execute();
      $this->getToDelete($usuario->getId());
      $sqlImage = $this->db->prepare(
        "UPDATE usuario_image
        SET imagePath=:imagePath
        WHERE Usuario_idUsuario=:idU;"
      );
      $sqlImage->bindValue(":imagePath", $nomedoarquivo);
      $sqlImage->bindValue(":idU", $usuario->getId());
      $sqlImage->execute();

      move_uploaded_file($im['tmp_name'], "assets/images/usuarios/".$nomedoarquivo);
      return true;
    }catch(Exception $e){
      return false;
    }
  }
  public function getToDelete($id){
    if(isset($id)){
      $sql = $this->db->prepare("SELECT imagePath from usuario_image Where Usuario_idUsuario=:uid");
      $sql->bindValue(":uid", $id);
      if($sql->execute()){
        if($sql->rowCount()>0){
          $dado = $sql->fetch();
          unlink("assets/images/usuarios/".$dado['imagePath']);
          return true;
        }
      }
      return false;
    }
  }
  public function getAll($page, $perPage){
    $offset = ($page - 1) * $perPage;
    $array = array();
    $sql = $this->db->query(
      "SELECT idUsuario, login, nome, active FROM usuario LIMIT $offset, $perPage;"
    );
    if($sql->rowCount()>0){
      foreach($sql->fetchAll() as $usuario){
        $user = new Usuario();
        $user->setId($usuario['idUsuario']);
        $user->setUsuario($usuario['login']);
        $user->setNome($usuario['nome']);
        $user->setActive($usuario['active']);
        $array[] = $user;
      }
      return $array;
    }
  }
  public function getTotal(){
    $sql = $this->db->query("SELECT COUNT(*) as c FROM usuario");
    $data = $sql->fetch();

    return $data['c'];
  }
  public function desativar($id){
    $sql = $this->db->prepare("UPDATE usuario SET active=0 WHERE idUsuario=:id");
    $sql->bindValue("id", $id);
    $sql->execute();
  }
  public function usuarioExists($usuario){
    $sql = "SELECT login FROM usuario WHERE login = :login";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":login", $usuario);
    $sql->execute();

    if($sql->rowCount()>0){
      return true;
    }else{
      return false;
    }
  }
}
?>
