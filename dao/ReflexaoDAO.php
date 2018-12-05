<?php

class ReflexaoDAO extends BaseDAO{

  public function __construct(){
    parent::__construct();
  }

  public function adicionar($reflexao){
    $retorno = false;
    try{
        $sql = $this->db->prepare("INSERT INTO reflexao 
		(titulo, data, corpo, Usuario_idUsuario) 
		VALUES 
		(:titulo, NOW(), :corpo, :idUsuario)");
        $sql->bindValue(":titulo", $reflexao->getTitulo());

        $sql->bindValue(":corpo", $reflexao->getCorpo());
        $sql->bindValue(":idUsuario", unserialize($_SESSION['usuario'])->getId());
        if($sql->execute()){
          $retorno = true;
        }
      }catch(Exception $e){
        throw $e->getMessage();
      }
      return $retorno;
    }

  public function getReflexoes($page, $perPage){
    $offset = ($page - 1) * $perPage;

    $reflexoes = array();
    $sql= $this->db->prepare("SELECT
      idReflexao,
      titulo,
      data,
      corpo,
      Usuario_idUsuario FROM reflexao
      ORDER BY idReflexao DESC LIMIT $offset, $perPage;");
    $sql->execute();

    if($sql->rowCount()>0){
      foreach($sql->fetchAll() as $reflex){
        $reflexao = new Reflexao($reflex['titulo'], $reflex['corpo']);
        $reflexao->setId($reflex['idReflexao']);
        $reflexao->setData($reflex['data']);
        $usuario = new Usuario();
        $usuario->setId($reflex['Usuario_idUsuario']);
        $reflexao->setUsuario($usuario);
        $reflexoes[] =$reflexao;
      }
      return $reflexoes;
    }
  }
  public function getReflexoesLike($like, $page, $perPage){
    $offset = ($page - 1) * $perPage;

    $reflexoes = array();
    $sql= $this->db->prepare("SELECT
      idReflexao,
      titulo,
      data,
      corpo,
      Usuario_idUsuario FROM reflexao 
      WHERE reflexao.titulo LIKE '%$like%'
      ORDER BY idReflexao DESC;");
    $sql->execute();

    if($sql->rowCount()>0){
      foreach($sql->fetchAll() as $reflex){
        $reflexao = new Reflexao($reflex['titulo'], $reflex['corpo']);
        $reflexao->setId($reflex['idReflexao']);
        $reflexao->setData($reflex['data']);
        $usuario = new Usuario();
        $usuario->setId($reflex['Usuario_idUsuario']);
        $reflexao->setUsuario($usuario);
        $reflexoes[] =$reflexao;
      }
      return $reflexoes;
    }
  }
  public function getLastReflexao(){
    $reflexao;
    $sql = $this->db->prepare("SELECT
      reflexao.idReflexao,
      reflexao.titulo,
      reflexao.data,
      reflexao.corpo,
      usuario.nome,
      usuario_image.idUsuario_image,
      usuario_image.imagePath FROM reflexao
      INNER JOIN usuario on reflexao.Usuario_idUsuario = usuario.idUsuario
      INNER JOIN usuario_image on usuario_image.Usuario_idUsuario = usuario.idUsuario
      ORDER BY idReflexao DESC LIMIT 1");
    $sql->execute();

    if($sql->rowCount() > 0){
      $dado = $sql->fetch();
      $reflexao = new Reflexao($dado['titulo'],$dado['corpo']);
      $reflexao->setId($dado['idReflexao']);
      $reflexao->setData($dado['data']);
      $usuario = new Usuario();
      $usuario->setNome($dado['nome']);
      $image = new Image();
      $image->setId($dado['idUsuario_image']);
      $image->setImagePath($dado['imagePath']);
      $usuario->setImage($image);
      $reflexao->setUsuario($usuario);
      return $reflexao;
    }
    return null;
  }
  public function getReflexao($id){
    $reflexao;
    $sql = $this->db->prepare("SELECT idReflexao, titulo, data, corpo, reflexao.Usuario_idUsuario, usuario.nome, usuario_image.imagePath FROM reflexao 
    INNER JOIN usuario on reflexao.Usuario_idUsuario = usuario.idUsuario
    INNER JOIN usuario_image on usuario.idUsuario = usuario_image.Usuario_idUsuario WHERE reflexao.idReflexao=:id");
    $sql->bindValue("id", $id);
    $sql->execute();

    if($sql->rowCount() > 0){
      $dado = $sql->fetch();
      $reflexao = new Reflexao($dado['titulo'], $dado['corpo']);
      $reflexao->setId($dado['idReflexao']);
      $reflexao->setData($dado['data']);
      $usuario = new Usuario();
      $usuario->setId($dado['Usuario_idUsuario']);
      $usuario->setNome($dado['nome']);
      $image = new Image();
      $image->setImagePath($dado['imagePath']);
      $usuario->setImage($image);
      $reflexao->setUsuario($usuario);
      return $reflexao;
    }
    return null;
  }
  public function apagar($id){
    $retorno = false;
    try{

      $sql = $this->db->prepare("DELETE FROM reflexao WHERE idReflexao=:id");
      $sql->bindValue("id", $id);
      if($sql->execute()){
        $retorno = true;
      }
    }catch(Exception $e){
      throw $e->getMessage();
    }
    return $retorno;
  }
  public function alterar($reflexao){
    $retorno = false;
    try{
      $sql = $this->db->prepare("UPDATE reflexao SET titulo=:titulo, corpo=:corpo WHERE idReflexao = :idReflexao");
      $sql->bindValue(":titulo", $reflexao->getTitulo());
      $sql->bindValue(":corpo", $reflexao->getCorpo());
      $sql->bindValue(":idReflexao", $reflexao->getId());
      if($sql->execute()){
        $retorno = true;
      }
    }catch(Exception $e){
      throw $e->getMessage();
    }
    return $retorno;
  }
  public function getTotal(){
    $sql = $this->db->query("SELECT COUNT(*) as c FROM reflexao");
    $data = $sql->fetch();

    return $data['c'];
  }
}
