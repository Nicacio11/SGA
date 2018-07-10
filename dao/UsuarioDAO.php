<?php

  class UsuarioDAO extends BaseDAO{

    public function autenticar($user, $pass){

      $usuario;
      $sql = $this->db->prepare("SELECT idUsuario, login, nome FROM usuario WHERE login=:usuario AND senha=:senha");
      $sql->bindValue(":usuario", $user);
      $sql->bindValue(":senha", $pass);
      $sql->execute();
      if($sql->rowCount()){
        $usuario = new Usuario();
        $dadosSQL = $sql->fetch();
        $usuario->setId($dadosSQL['idUsuario']);
        $usuario->setNome($dadosSQL['nome']);
        $usuario->setUsuario($dadosSQL['login']);
        $usuario->setFoto($this->getFoto($usuario->getId()));
        return $usuario;
      }
      return null;

    }

    public function getFoto($id){
      $foto;

      $sql = $this->db->prepare("SELECT imagePath FROM usuario_foto WHERE Usuario_idUsuario = :id");
      $sql->bindValue(":id", $id);
      $sql->execute();

      if($sql->rowCount()>0){
        $dado = $sql->fetch();
        $foto = new Foto();
        $foto->setImagePath($dado['imagePath']);
        return $foto;
      }
      return null;
    }

  }
?>
