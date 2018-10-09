<?php
  class Mensagem{
    private $id;
    private $email;
    private $nome;
    private $descricao;


    public function send($tipo = array()){

      if(@mail('mensageirosdeemanuel.go@gmail.com', $tipo['tipo'] ,$this->getDescricao(),$this->getEmail())){
        return true;
      }
      return false;
    }
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
      $this->descricao;
    }
  }
