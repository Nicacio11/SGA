<?php
  class Image{
    private $id;
    private $imagePath;
    private $tipo;



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
    public function setTipo($tipo){
      $this->tipo = $tipo;
    }
    public function getTipo(){
      return $this->tipo;
    }
  }
