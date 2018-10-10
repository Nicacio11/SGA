<?php
  /*
    * Description - Classe modelo para os usuarios do sistema
    * @author Vitor Nicacio
    @param id - id do usuario
    @param usuario - login do usuario
    @param senha - senha do usuario
    @param nome - nome do usuario
    @param Foto - caminho da imagme
  */
  class Usuario{
    private $id;
    private $usuario;
    private $senha;
    private $nome;
    private $image;
    private $active;

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
    public function setSenha($senha){
      $this->senha=$senha;
    }
    public function getSenha(){
      return $this->senha;
    }
    public function getImage(){
      return $this->image;
    }
    public function setImage($image){
      $this->image=$image;
    }
    public function setUsuario($usuario){
      $this->usuario =  $usuario;
    }

    public function getUsuario(){
      return $this->usuario;
    }
    public function setActive($active){
      $this->active =  $active;
    }

    public function getActive(){
      return $this->active;
    }

    public function verificarUsuario(){
      if($_SESSION['usuario'] == null || unserialize($_SESSION['usuario'])->getActive() < 1){
        header("location: ".BASE_URL."Usuario");
      }
    }
    public function verificarUsuarioAdmin(){
      if($_SESSION['usuario'] == null || unserialize($_SESSION['usuario'])->getActive() < 2){
        header("location: ".BASE_URL."Usuario");
      }
    }
  }
