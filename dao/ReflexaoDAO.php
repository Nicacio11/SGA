<?php

class ReflexaoDAO extends BaseDAO{

  public function __construct(){
    parent::__construct();
  }

  public function adiciona($reflexao){
    $sql = $this->db->prepare("INSERT INTO reflexao (titulo, data, corpo, Usuario_idUsuario) VALUES (:titulo, :data, :corpo, :idUsuario)");
    $sql->bindValue(":titulo", $reflexao->getTitulo());
    $sql->bindValue(":data", "NOW()");
    $sql->bindValue(":corpo", $reflexao->getCorpo());
    $sql->bindValue(":idUsuario", unserialize($_SESSION['usuario'])->getId());
    $sql->execute();
  }

  public function getReflexoes():Reflexao[]{
    $reflexoes = array();
    $sql= $this->db->prepare("SELECT idReflexao, titulo, data, corpo, Usuario_idUsuario FROM reflexao;");
    $sql->execute();

    if($sql->rowCount()>0){
      foreach($sql->fetchAll() as $reflex){
        $reflexao = new Reflexao();
        $reflexao->setId($reflex['idReflexao']);
        $reflexao->setTitulo($reflex['titulo']);
        $reflexao->setData($reflex['data']);
        $reflexao->setCorpo($reflex['corpo']);
        $reflexao->setIdUsuario($reflex['Usuario_idUsuario'])
        $reflexoes[] =$reflexao;
      }
      return $reflexoes;
    }
  }
}
