<?php
  //definindo constante para auxiliar no ambiente
  define('ENVIRONMENT', 'development');
  if(ENVIRONMENT=='development'){
    define("BASE_URL", "http://localhost/SGA/");

  }else{
      define("BASE_URL", "http://localhost/SGA/");
  }
