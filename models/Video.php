<?php
  class Video{
    private $id;
    private $titulo;
    private $descricao;
    private $videoPath;
    private $usuario;

    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id=$id;
    }
    public function setTitulo($titulo){
      $this->titulo=$titulo;
    }
    public function getTitulo(){
      return $this->titulo;
    }
    public function getDescricao(){
      return $this->descricao;
    }
    public function setDescricao($descricao){
      $this->descricao=$descricao;
    }
    public function getVideoPath(){
      return $this->videoPath;
    }
    public function setVideoPath($videoPath){
      $this->videoPath=$videoPath;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }


    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
  }
