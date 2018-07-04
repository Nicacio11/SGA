<?php
  class Coordenador{
    private $id;
    private $nome;
    private $imagePath;

    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id=$id;
    }
    public function getImagePath(){
      return $this->imagePath;
    }
    public function setImagePath($imagePath){
      $this->imagePath=$imagePath;
    }
    public function getNome(){
      return $this->nome;
    }
    public function setNome($nome){
      $this->nome=$nome;
    }
  }
