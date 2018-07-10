<?php

  class UsuarioDAO extends BaseDAO{

    public function autenticar($usuario, $senha){

      $usuario = new Usuario();
      return $usuario;
      /*$sql = $this->db->prepare("SELECT FROM usuario WHERE usuario = :usuario AND senha = :senha");
      $sql->bindValue(":usuario", $usuario);
      $sql->bindValue(":senha", $senha);
      $sql->execute();
      if($sql->rowCount()){
        $dadoSQL = $sql->fetch();
        $usuario->setId($dadoSQL['id']);
        $usuario->setNome($dadosSQL['nome']);
        $usuario->setUsuario($dado['usuario']);
        $usuario->setImagePath($dado['imagePath']);
        return $usuario;
      }
      return null;*/

    }

  }
?>
