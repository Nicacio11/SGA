<?php

  class Atividade {
    private $id;
    private $titulo;
    private $descricao;
    private $foto;
    private $tipo;

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
    public function setFoto($foto){
      $this->foto=$foto;

    }
    public function getFoto(){
      return $this->foto;
    }
    public function setTipo($tipo){
      $this->tipo=$tipo;
    }
    public function getTipo(){
      return $this->tipo;
    }
  }
