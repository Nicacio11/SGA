<?php

class VideoDAO extends BaseDAO{

  public function __construct(){
    parent::__construct();
  }

  public function adicionar($video){
    $sql = $this->db->prepare("INSERT INTO video (titulo, descricao, url, Usuario_idUsuario) VALUES (:titulo, :descricao, :url, :idUsuario)");
    $sql->bindValue(":titulo", $video->getTitulo());
    $sql->bindValue(":descricao", $video->getDescricao());
    $sql->bindValue(":url", $video->getVideoPath());
    $sql->bindValue(":idUsuario", unserialize($_SESSION['usuario'])->getId());
    $sql->execute();
  }

  public function getVideos($page, $perPage){
    $offset = ($page - 1) * $perPage;

    $videos = array();
    $sql= $this->db->prepare("SELECT idVideo, titulo, descricao, url, usuario.nome
     FROM video 
     INNER JOIN usuario on usuario.idUsuario=video.Usuario_idUsuario 
     LIMIT $offset, $perPage;");
    $sql->execute();

    if($sql->rowCount()>0){
      foreach($sql->fetchAll() as $vid){
        $video = new Video();
        $video->setTitulo($vid['titulo']);
        $video->setDescricao($vid['descricao']);
        $video->setId($vid['idVideo']);
        $video->setUrl($vid['url']);
        $usuario = new Usuario();
        $usuario->setNome($vid['nome']);
        $video->setUsuario($usuario);
        $videos[] =$video;
      }
      return $videos;
    }
  }
  public function getLastVideo(){
    $video;
    $sql = $this->db->prepare("SELECT idVideo, 
    titulo, 
    descricao, 
    url, 
    nome 
    FROM video
    INNER JOIN usuario on usuario.idUsuario=video.Usuario_idUsuario 
    INNER JOIN usuario_image on usuario_image.Usuario_idUsuario= usuario.idUsuario
    ORDER BY idVideo DESC LIMIT 1
    ");
    $sql->execute();

    if($sql->rowCount() > 0){
      $vid = $sql->fetch();
      $video = new Video();
      $video->setTitulo($vid['titulo']);
      $video->setDescricao($vid['descricao']);
      $video->setId($vid['idVideo']);
      $video->setUrl($vid['url']);
      $usuario = new Usuario();
      $usuario->setId($vid['nome']);
      $foto = new Image();
      $foto->setImagePath($vid['imagePath']);
      $usuario->setImage($foto);
      $video->setUsuario($usuario);
      return $video;
    }
    return null;
  }
  public function getVideo($id){
    $video;
    $sql = $this->db->prepare("SELECT idVideo, 
    titulo, 
    descricao, 
    url, 
    nome
    FROM video 
    INNER JOIN usuario on usuario.idUsuario=video.Usuario_idUsuario 
    INNER JOIN usuario_image on usuario_image.Usuario_idUsuario= usuario.idUsuario 
    WHERE idVideo=:id");
    $sql->bindValue("id", $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $vid = $sql->fetch();
        $video = new Video();
        $video->setTitulo($vid['titulo']);
        $video->setDescricao($vid['descricao']);
        $video->setId($vid['idVideo']);
        $video->setUrl($vid['url']);
        $usuario = new Usuario();
        $usuario->setId($vid['nome']);
        $foto = new Image();
        $foto->setImagePath($vid['imagePath']);
        $usuario->setImage($foto);
        $video->setUsuario($usuario);
      return $video;
    }
    return null;
  }
  public function apagar($id){
    $sql = $this->db->prepare("DELETE FROM video WHERE idVideo=:id");
    $sql->bindValue("id", $id);
    $sql->execute();
  }
  public function alterar($video){
    $sql = $this->db->prepare("UPDATE video SET titulo=:titulo, corpo=:corpo WHERE idVideo = :idVideo");
    $sql->bindValue(":titulo", $video->getTitulo());
    $sql->bindValue(":corpo", $video->getCorpo());
    $sql->bindValue(":idVideo", $video->getId());
    $sql->execute();
  }
  public function getTotal(){
    $sql = $this->db->query("SELECT COUNT(*) as c FROM video");
    $data = $sql->fetch();

    return $data['c'];
  }
}
