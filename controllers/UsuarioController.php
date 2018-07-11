<?php

  class UsuarioController extends Controller{

    public function __construct(){
    }

      public function index(){
        if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
          $nomePessoa = unserialize($_SESSION['usuario'])->getNome();
          $imagePessoa = unserialize($_SESSION['usuario'])->getImage()->getImagePath();
          $data = array();
          $data['nome']=$nomePessoa;
          $data['imagem']=$imagePessoa;
          $this->loadTemplate('PainelInicial', $data);
        }else{
          $this->loadView('Usuario');
        }

      }

      public function login(){
        if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
            $usuario = addslashes($_POST['usuario']);
        }
        if(isset($_POST['senha']) && !empty($_POST['senha'])){
            $senha = addslashes($_POST['senha']);
        }
        $usuarioDAO = new UsuarioDAO();
        $user = $usuarioDAO->autenticar($usuario, $senha);
        if($user != null){
          $_SESSION['usuario'] = serialize($user);
          //echo "Logado com sucesso";
          call_user_func_array(array(new UsuarioController, 'index'), $params = array());
          //$this->loadView('Usuario');
        }
        else{
          echo "Usuário e/ou senha incorretos ou inexistentes";
        }
      }
      public function adicionar(){

      }
      public function sair(){
        unset($_SESSION['usuario']);
        $url = BASE_URL."Usuario";
        header("location: $url");;

      }


  }
 ?>
