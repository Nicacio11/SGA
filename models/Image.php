<?php
  class Image{
    private $id;
    private $imagePath;

    public function getId(): int{
      return $this->id;
    }
    public function setId(int $id){
      $this->id=$id;
    }

    public function getImagePath():string{
      return $this->imagePath;
    }
    public function setImagePath(string $imagePath){
      $this->imagePath=$imagePath;
    }

  }
