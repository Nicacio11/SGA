<?php
  //definindo constante para auxiliar no ambiente
  define('ENVIRONMENT', 'development');
  if(ENVIRONMENT=='development'){
    define("BASE_URL", "http://localhost/SGA/");


  }else if(ENVIRONMENT =='production'){
      define("BASE_URL", "http://www.vitornicacio.com.br/projetos/SGA/");
  }else{
      define("BASE_URL", "vitor-nicacio.000webhostapp.com/projetos/SGA/");
  }

