<?php

class VideoDAO extends BaseDAO{

  public function __construct(){
    parent::__construct();
  }

  public function adicionar($video){
    $retorno = false;
    $sql = $this->db->prepare("INSERT INTO video (titulo, descricao, url, Usuario_idUsuario) VALUES (:titulo, :descricao, :url, :idUsuario)");
    $sql->bindValue(":titulo", $video->getTitulo());
    $sql->bindValue(":descricao", $video->getDescricao());
    $sql->bindValue(":url", $video->getVideoPath());
    $sql->bindValue(":idUsuario", unserialize($_SESSION['usuario'])->getId());
    if($sql->execute()){
      $retorno = true;
    }
    return $retorno;
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
        $video->setVideoPath($vid['url']);
        $usuario = new Usuario();
        $usuario->setNome($vid['nome']);
        $video->setUsuario($usuario);
        $videos[] =$video;
      }
      return $videos;
    }
  }
  public function getVideosLike($like, $page, $perPage){
    $offset = ($page - 1) * $perPage;

    $videos = array();
    $sql= $this->db->prepare("SELECT idVideo, titulo, descricao, url, usuario.nome
     FROM video
     INNER JOIN usuario on usuario.idUsuario=video.Usuario_idUsuario
     WHERE video.titulo LIKE ''%$like%;");
    $sql->execute();

    if($sql->rowCount()>0){
      foreach($sql->fetchAll() as $vid){
        $video = new Video();
        $video->setTitulo($vid['titulo']);
        $video->setDescricao($vid['descricao']);
        $video->setId($vid['idVideo']);
        $video->setVideoPath($vid['url']);
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
    video.titulo,
    video.descricao,
    video.url,
    usuario.nome,
    usuario_image.imagePath
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
      $video->setVideoPath($vid['url']);
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
    WHERE idVideo=:id");
    $sql->bindValue("id", $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $vid = $sql->fetch();
        $video = new Video();
        $video->setTitulo($vid['titulo']);
        $video->setDescricao($vid['descricao']);
        $video->setId($vid['idVideo']);
        $video->setVideoPath($vid['url']);
      return $video;
    }
    return null;
  }
  public function apagar($id){
    $retorno= false;
    $sql = $this->db->prepare("DELETE FROM video WHERE idVideo=:id");
    $sql->bindValue("id", $id);
    if($sql->execute()){
      $retorno = true;
    }
    return $retorno;
  }
  public function alterar($video){
    $retorno = false;
    $sql = $this->db->prepare("UPDATE video SET titulo=:titulo, url=:url, descricao=:descricao WHERE idVideo = :idVideo");
    $sql->bindValue(":titulo", $video->getTitulo());
    $sql->bindValue(":url", $video->getVideoPath());
    $sql->bindValue(":descricao", $video->getDescricao());

    $sql->bindValue(":idVideo", $video->getId());
    if($sql->execute()){
      $retorno = true;
    }
    return $retorno;
  }
  public function getTotal(){
    $sql = $this->db->query("SELECT COUNT(*) as c FROM video");
    $data = $sql->fetch();

    return $data['c'];
  }
}
