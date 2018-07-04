<?php
	class QuemSomos{
    private $titulo;
    private $descricao;
  

  public function getTitulo(){
    return $this->titulo;
  }
  public function getDescricao(){
    return $this->descricao;
  }
  public function setDescricao($descricao){
    $this->descricao=$descricao;
  }
  public function setTitulo($titulo){
    $this->titulo= $titulo;
  }
  
  }

