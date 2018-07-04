<?php
  class Testemunho{
    private $id;
    private $emailPessoa;
    private $nomePessoa;
    private $testemunho;
    private $data;



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

    public function setTestemunho($testemunho){
      $this->testemunho = $testemunho;
    }
    public function getTestemunho(){
      $this->testemunho;
    }

    public function getData(){
      return $this->data;
    }
    public function setData($data){
      $this->data=$data;
    }
  }

