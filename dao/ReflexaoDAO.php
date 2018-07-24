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

  public function getReflexoes($page, $perPage){
    $offset = ($page - 1) * $perPage;

    $reflexoes = array();
    $sql= $this->db->prepare("SELECT idReflexao, titulo, data, corpo, Usuario_idUsuario FROM reflexao LIMIT $offset, $perPage;");
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
  public function getReflexao($id){
    $reflexao;
    $sql = $this->db->prepare("SELECT idReflexao, titulo, data, corpo, Usuario_idUsuario FROM reflexao WHERE idReflexao=:id");
    $sql->bindValue("id", $id);
    $sql->execute();

    if($sql->rowCount() > 0){
      $dado = $sql->fetch();
      $reflexao = new Reflexao($dado['titulo'], $dado['corpo']);
      $reflexao->setId($dado['idReflexao']);
      $reflexao->setData($dado['data']);
      $reflexao->setIdUsuario($dado['Usuario_idUsuario']);
      return $reflexao;
    }
    return null;
  }
  public function apagar($id){
    $sql = $this->db->prepare("DELETE FROM reflexao WHERE idReflexao=:id");
    $sql->bindValue("id", $id);
    $sql->execute();
  }
  public function getTotal(){
    $sql = $this->db->query("SELECT COUNT(*) as c FROM reflexao");
    $data = $sql->fetch();

    return $data['c'];
  }
}
