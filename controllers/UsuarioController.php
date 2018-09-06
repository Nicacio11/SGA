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
      public function painel(){
        $usuario = new Usuario();

        $usuario->verificarUsuarioAdmin();
        $dado = array();
        $usuarioDAO = new UsuarioDAO();
        $total_usuarios = $usuarioDAO->getTotal();

        //iniciando a paginação
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
         $p = addslashes($_GET['p']);
       }

       $por_pagina = 10;
       $total_paginas = ceil($total_usuarios / $por_pagina);
       $usuarios = $usuarioDAO->getAll($p, $por_pagina);

       $dado['usuarios'] = $usuarios;
       $dado['total_reflexoes'] = $total_paginas;
       $dado['total_paginas'] = $total_paginas;
       $dado['p']=$p;
        $this->loadTemplate('usuario/UsuarioPainel', $dado);
      }
      public function adicionar(){
        //senhaadd
        //nomeadd
        //activeadd
        //imagemUsuario
        $usuario = new Usuario();
        $usuario->verificarUsuarioAdmin();
        $array = array();
        if(
          (isset($_POST['loginadd']) && !empty(trim($_POST['loginadd']))) &&
          (isset($_POST['senhaadd']) && !empty(trim($_POST['senhaadd']))) &&
          (isset($_POST['nomeadd']) && !empty(trim($_POST['nomeadd']))) &&
          (isset($_POST['activeadd']) && !empty(trim($_POST['activeadd']))) &&
          (isset($_FILES['imagemUsuario']['tmp_name']))
        ){

          $usuario->setUsuario(addslashes($_POST['loginadd']));
          $usuario->setSenha(md5(addslashes($_POST['senhaadd'])));
          $usuario->setNome(addslashes($_POST['nomeadd']));
          $usuario->setActive(addslashes($_POST['activeadd']));
          $imagem = new Image();
          $imagem->setImagePath($_FILES['imagemUsuario']);
          $usuario->setImage($imagem);

          $usuarioDAO = new UsuarioDAO();
          $id = $usuarioDAO->cadastrar($usuario);
          header("Location: ". BASE_URL."usuario/painel");
          exit;
        }
        $this->loadTemplate('usuario/UsuarioAdd', $array);

      }
      public function edit($id){
        $usuario = new Usuario();
        $usuario->verificarUsuarioAdmin();

        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->getUsuarioById($id);
        if($usuario == null){
          header("Location: ".BASE_URL.'usuario/painel');
          exit;
        }

        if(
          (isset($_POST['loginedit']) && !empty(trim($_POST['loginedit']))) &&
          (isset($_POST['senhaedit']) && !empty(trim($_POST['senhaedit']))) &&
          (isset($_POST['nomeedit']) && !empty(trim($_POST['nomeedit']))) &&
          (isset($_POST['activeedit']) && !empty(trim($_POST['activeedit']))) &&
          (isset($_FILES['imagemUsuarioEdit']['tmp_name']))
        ){
          $usuario->setId(addslashes($id));
          $usuario->setUsuario(addslashes($_POST['loginedit']));
          $usuario->setSenha(md5(addslashes($_POST['senhaedit'])));
          $usuario->setNome(addslashes($_POST['nomeedit']));
          $usuario->setActive(addslashes($_POST['activeedit']));
          $imagem = new Image();
          $imagem->setImagePath($_FILES['imagemUsuarioEdit']);
          $usuario->setImage($imagem);

          $usuarioDAO = new UsuarioDAO();
          $id = $usuarioDAO->atualizar($usuario);
          header("Location: ". BASE_URL."usuario/painel");
          exit;
        }

        $array['usuario'] = $usuario;
        $this->loadTemplate("usuario/UsuarioEdit",$array);

      }
      public function desativar($id){
          $usuario = new Usuario();
          $usuario->verificarUsuarioAdmin();
          $dao = new UsuarioDAO();
          $dao->desativar($id);
          header('Location:'.BASE_URL.'usuario/painel');
      }
      public function sair(){
        unset($_SESSION['usuario']);
        $url = BASE_URL."Usuario";
        header("location: $url");;

      }


  }
 ?>
