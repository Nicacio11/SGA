<?php
  class Foto{
    private $id;
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

  }
