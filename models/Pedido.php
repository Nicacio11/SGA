<?php
  class Contato{
    private $id;
    private $emailPessoa;
    private $nomePessoa;
    private $pedido;



    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id=$id;
    }

    public function setEmailPessoa($emailPessoa){
      $this->emailPessoa=$emailPessoa;
    }

    public function getEmailPessoa(){
      return $this->email;
    }
    public function setNomePessoa($nomePessoa){
      $this->nomePessoa = $nomePessoa;
    }
    public function getNomePessoa(){
      return $this->nomePessoa;
    }

    public function setPedido($pedido){
      $this->pedido = $pedido;
    }
    public function getPedido(){
      $this->pedido;
    }
  }


