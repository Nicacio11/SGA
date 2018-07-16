<?php

class ReflexaoDAO extends BaseDAO{

  public function __construct(){
    parent::__construct();
  }

  public function adicionar($reflexao){
    $sql = $this->db->prepare("INSERT INTO reflexao (titulo, data, corpo, Usuario_idUsuario) VALUES (:titulo, NOW(), :corpo, :idUsuario)");
    $sql->bindValue(":titulo", $reflexao->getTitulo());

    $sql->bindValue(":corpo", $reflexao->getCorpo());
    $sql->bindValue(":idUsuario", unserialize($_SESSION['usuario'])->getId());
    $sql->execute();
  }

  public function getReflexoes(){
    $reflexoes = array();
    $sql= $this->db->prepare("SELECT idReflexao, titulo, data, corpo, Usuario_idUsuario FROM reflexao;");
    $sql->execute();

    if($sql->rowCount()>0){
      foreach($sql->fetchAll() as $reflex){
        $reflexao = new Reflexao($reflex['titulo'], $reflex['corpo']);
        $reflexao->setId($reflex['idReflexao']);
        $reflexao->setData($reflex['data']);
        $reflexao->setIdUsuario($reflex['Usuario_idUsuario']);
        $reflexoes[] =$reflexao;
      }
      return $reflexoes;
    }
  }
  public function getLastReflexao(){
    $reflexao;
    $sql = $this->db->prepare("SELECT idReflexao, titulo, data, corpo, Usuario_idUsuario FROM reflexao ORDER BY idReflexao DESC LIMIT 1");
    $sql->execute();

    if($sql->rowCount() > 0){
      $dado = $sql->fetch();
      $reflexao = new Reflexao();
      $reflexao->setId($dado['idReflexao']);
      $reflexao->setTitulo($dado['titulo']);
      $reflexao->setData($dado['data']);
      $reflexao->setCorpo($dado['corpo']);
      $reflexao->setIdUsuario($dado['Usuario_idUsuario']);
      return $reflexao;
    }
    return null;
  }
}
