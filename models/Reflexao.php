<?php
  class Reflexao{
    private $id;
    private $titulo;
    private $corpo;
    private $data;
    private $idUsuario;

    public function __construct($titulo, $corpo){
      $this->titulo = $titulo;
      $this->corpo = $corpo;
    }
    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id=$id;
    }
    public function getIdUsuario(){
      return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
      $this->idUsuario=$idUsuario;
    }
    public function setTitulo($titulo){
      $this->titulo=$titulo;
    }
    public function getTitulo(){
      return $this->titulo;
    }

    public function getCorpo(){
      return $this->corpo;
    }

    public function setCorpo($corpo){
      $this->corpo=$corpo;
    }

    public function getData(){
      return $this->data;
    }
    public function setData($data){
      $this->data=$data;
    }
  }
