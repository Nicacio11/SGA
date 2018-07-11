<?php
  class Coordenador{
    private $id;
    private $nome;
    private $image;

    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id=$id;
    }
    public function getImage(){
      return $this->image;
    }
    public function setImage($image){
      $this->image=$image;
    }
    public function getNome(){
      return $this->nome;
    }
    public function setNome($nome){
      $this->nome=$nome;
    }
  }
