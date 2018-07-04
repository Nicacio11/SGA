<?php
  class Contato{
    private $id;
    private $email;
    private $endereco;
    private $numero;
    private $descricao;



    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id=$id;
    }
    public function getDescricao(){
      return $this->descricao;
    }
    public function setDescricao($descricao){
      $this->descricao=$descricao;
    }

    public function setEmail($email){
      $this->email=$email;
    }

    public function getEmail(){
      return $this->email;
    }

    public function setNumero($numero){
      $this->numero=$numero;
    }

    public function getNumero(){
      return $this->numero;
    }

    public function setEndereco($endereco){
     $this->endereco = $endereco;
    }
    public function getEndereco(){
      return $this->endereco;
    }

  }
