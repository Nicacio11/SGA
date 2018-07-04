<?php

  class Galeria{
    private $id;
    private $titulo;
    private $fotos = [];
  

  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id=$id;
  }
  public function setTitulo($titulo){
    $this->titulo-$titulo;
  }
  public function getTitulo(){
    return $this->titulo;
  }
  public function getFotos(){
    return $this->fotos;
  }
  public function addFotos($foto){
     $this->fotos[]=$foto;
  }
}

