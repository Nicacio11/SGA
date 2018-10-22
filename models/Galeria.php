<?php

  class Galeria{
    private $id;
    private $titulo;
    private $images = [];


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
  public function getImages(){
    return $this->images;
  }
  public function addImage($image){
     $this->images[]=$image;
  }
  public function setImage($image){
    $this->images = $image;
  }
}
