<?php
  class BaseDAO{
    protected $db;

    public function __construct(){

      try{

        if(ENVIRONMENT=='development'){
          $this->db = new PDO("mysql:dbname=sga;host=localhost;charset=utf8" , "root","");
        }else{
          $this->db = new PDO("mysql:dbname=u647499775_sga;host=mysql.hostinger.com.br;charset=utf8" , "u647499775_gome","renovacaocarismatica");
        }
        $this->db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      }catch(PDOException $e){
        echo 'Erro '.$e->getMessage();
      }
    }
  }
 ?>
