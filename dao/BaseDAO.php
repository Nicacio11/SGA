<?php
  class BaseDAO{
    protected $db;

    public function __construct(){

      try{

        if(ENVIRONMENT=='development'){
        //  $this->db = new PDO("" , "","");
        }else{
          $this->db = new PDO("" , "","");
        }
      }catch(PDOException $e){
        echo 'Erro '.$e->getMessage();
      }
    }
  }
 ?>
