<?php

  class UsuarioController extends Controller{

    public function __construct(){
    }

      public function index(){
        $this->loadView('Usuario');
      }

      public function login(){
        if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
            $usuario = addslashes($_POST['usuario']);
        }
        if(isset($_POST['senha']) && !empty($_POST['senha'])){
            $senha = addslashes($_POST['senha']);
        }
        $usuarioDAO = new UsuarioDAO();
        $user = $usuarioDAO->autenticar($usuario, md5($senha));
        if($user != null){
          //$_SESSION['usuario'] = $user;
          echo "Logado com sucesso";
        }
        else{
          echo "Erro ao logar";
        }
      }
      public function adicionar(){

      }


  }
 ?>
