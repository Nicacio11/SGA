<?php

  class TestemunhoDAO extends BaseDAO{

      public function __construct(){
        parent::__construct();
      }

      public function adicionar($testemunho){

        $sql = $this->db->prepare("INSERT INTO (email, descricao, nome, Usuario_idUsuario)
        VALUES(:email, :descricao, :nome, :Usuario_idUsuario);");
        $sql->bindValue(":email", $testemunho->getEmail());
        $sql->bindValue(":descricao", $testemunho->getDescricao());
        $sql->bindValue(":nome", $testemnho->getNome());
        $sql->bindValue(":Usuario_idUsuario", unserialize($_SESSION['usuario'])->getId());

      }
  }


 ?>
