<?php
  class Ministerio{
    private $id;
    private $nome;
    private $descricao;
    private $coordenador;

    public function getDescricao(){
      return $this->descricao;
    }
    public function setDescricao($descricao){
      $this->descricao=$descricao;
    }
    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id=$id;
    }
    public function getNome(){
      return $this->nome;
    }
    public function setNome($nome){
      $this->nome=$nome;
    }
    public function getCoordenador(){
      return $this->coordenador;
    }
    public function setCoordenador($coordenador){
      $this->coordenador=$coordenador;
    }
  }
