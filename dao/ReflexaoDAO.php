<?php

class ReflexaoDAO extends BaseDAO{

  public function __construct(){
    parent::__construct();
  }

  public function adiciona($reflexao){
    $sql = $this->db->prepare("INSERT INTO reflexao (titulo, data, corpo, idUsuario) VALUES (:titulo, :data, :corpo, :idUsuario)");
    $sql->bindValue(":titulo", $reflexao->getTitulo());
    $sql->bindValue(":data", "NOW()");
    $sql->bindValue(":corpo", $reflexao->getCorpo());
    $sql->bindValue(":idUsuario", unserialize($_SESSION['usuario'])->getId());
  }
}
