<?php

  class Atividade {
    private $id;
    private $titulo;
    private $descricao;
    private $image;
    private $tipo;
    private $usuario;

    public function __construct($id = null, $titulo, $descricao, $image){
      $this->id = ($id!=null?$id:null);
      $this->titulo = $titulo;
      $this->descricao = $descricao;
      $this->image = $image;
    }
    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id=$id;
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
    public function setTitulo($titulo){
      $this->titulo= $titulo;
    }
    public function setImage($image){
      $this->image=$image;

    }
    public function getImage(){
      return $this->image;
    }
    public function setTipo($tipo){
      $this->tipo=$tipo;
    }
    public function getTipo(){
      return $this->tipo;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function getUsuario(){
      return $this->usuario;
    }
  }
