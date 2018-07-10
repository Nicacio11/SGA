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
          $_SESSION['usuario'] = serialize($user);
          echo "Logado com sucesso";
          //var_dump($_SESSION['usuario']);
          echo unserialize( $_SESSION['usuario'] )->getUsuario();
        }
        else{
          echo "Usuário e/ou senha incorretos ou inexistentes";
        }
      }
      public function adicionar(){

      }


  }
 ?>
