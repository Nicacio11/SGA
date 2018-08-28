<?php
  class BaseDAO{
    protected $db;

    public function __construct(){

      try{

        if(ENVIRONMENT=='development'){
          $this->db = new PDO("mysql:dbname=sga;host=localhost" , "root","");
        }else{
          $this->db = new PDO("mysql:dbname=u647499775_sga;host=mysql.hostinger.com.br" , "u647499775_gome","renovacaocarismatica");
        }
      }catch(PDOException $e){
        echo 'Erro '.$e->getMessage();
      }
    }
  }
 ?>
