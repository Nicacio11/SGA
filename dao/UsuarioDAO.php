<?php

  class UsuarioDAO extends BaseDAO{

    public function autenticar($user, $pass){

      $usuario;
      $sql = $this->db->prepare("SELECT idUsuario, login, nome FROM usuario WHERE login=:usuario AND senha=:senha");
      $sql->bindValue(":usuario", $user);
      $sql->bindValue(":senha", md5($pass));
      $sql->execute();
      if($sql->rowCount()){
        $usuario = new Usuario();
        $dadosSQL = $sql->fetch();
        $usuario->setId($dadosSQL['idUsuario']);
        $usuario->setNome($dadosSQL['nome']);
        $usuario->setUsuario($dadosSQL['login']);
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
    public function cadatrar($usuario){
        $sql = $this->db->prepare("INSERT INTO usuario (login, senha, nome, active) VALUES (:login, :senha, :nome, :active)");
        $sql->bindValue(":login", $usuario->getUsuario());
        $sql->bindValue(":senha", $usuario->getSenha());
        $sql->bindValue(":nome", $usuario->getNome());
        $sql->bindValue(":active", $usuario->getActive());
        $sql->execute();
        $lastId = $db->lastInsertId();

        $this->insertImage($lastId, $usuario->getImagePath());

    }

    /**
    * Description - insere image no banco
    * @author Vitor
    * @param id - ultimo id de usuario adicionado
    * @param image {Image} - objeto image
    */
    public function insertImage($id, $image){

      $sql = $this->db->prepare("INSERT INTO usuario_image (Usuario_idUsuario, imagePath) VALUES (:fk, :imagePath)");
      $sql->bindValue(":fk", $id);
      $sql->bindValue(":imagePath", $image->getImagePath());
      $sql->execute();
    }
    public function getImage($id):Image{
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

  }
?>
