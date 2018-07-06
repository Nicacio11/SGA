<?php

  class UsuarioController extends Controller{

    public function __construct(){
      if(session_id() == ''){
        session_start();
      }
    }

      public function index(){
        $this->loadView('Usuario');
      }


  }
 ?>
