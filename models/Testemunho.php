<?php
  class Testemunho{
    private $id;
    private $email;
    private $nome;
    private $descricao;
    private $usuario;



    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id=$id;
    }

    public function setEmail($email){
      $this->email=$email;
    }

    public function getEmail(){
      return $this->email;
    }
    public function setNome($nome){
      $this->nome = $nome;
    }
    public function getNome(){
      return $this->nome;
    }

    public function setDescricao($descricao){
      $this->descricao = $descricao;
    }
    public function getDescricao(){
      return $this->descricao;
    }
    public function getUsuario(){
      return $this->usuario;
    }
    public function setUsuario($usuario){
      $this->usuario=$usuario;
    }

  }
