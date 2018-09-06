<?php

  class TestemunhoController extends Controller{

      public function __construct(){

      }
      public function index(){

      }
      public function painel(){
        $usuario = new Usuario();
        $usuario->verificarUsuario();

        $testemunhoDAO = new TestemunhoDAO();
        $total_testemunhos = $testemunhoDAO->getTotal();

        //iniciando a paginação
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
         $p = addslashes($_GET['p']);
       }

       $por_pagina = 10;
       $total_paginas = ceil($total_testemunhos / $por_pagina);
       $testemunhos = $testemunhoDAO->getTestemunhos($p, $por_pagina);

       $dado['testemunhos'] = $testemunhos;
       $dado['total_testemunhos'] = $total_paginas;
       $dado['total_paginas'] = $total_paginas;
       $dado['p']=$p;
        $this->loadTemplate('testemunho/TestemunhoPainel', $dado);
      }
      public function adicionar(){
        $usuario = new Usuario();
        $usuario->verificarUsuario();
        if(
          (isset($_POST['nometestemunhoadd']) && !empty(trim($_POST['nometestemunhoadd']))) &&
          (isset($_POST['emailtestemunhoadd']) && !empty(trim($_POST['emailtestemunhoadd']))) &&
          (isset($_POST['testemunhodescricaoadd']) && !empty(trim($_POST['testemunhodescricaoadd'])))
        ){
          $testemunho = new Testemunho();
          $testemunho->setNome(addslashes($_POST['nometestemunhoadd']));
          $testemunho->setEmail(addslashes($_POST['emailtestemunhoadd']));
          $testemunho->setDescricao(addslashes($_POST['testemunhodescricaoadd']));
          $testemunhoDAO = new TestemunhoDAO();
          $testemunhoDAO->adicionar($testemunho);
          header("Location: ".BASE_URL."testemunho/painel");
          exit;
        }
        $this->loadTemplate('testemunho/TestemunhoAdd');
      }
      public function editar($id){
        $usuario = new Usuario();
        $usuario->verificarUsuario();
        $testemunhoDAO = new TestemunhoDAO();
        $testemunho = $testemunhoDAO->getTestemunho($id);
        if($testemunho == null){
          header("Location: ".BASE_URL.'testemunho/painel');
          exit;
        }
        if(
          (isset($_POST['nometestemunhoedit']) && !empty(trim($_POST['nometestemunhoedit']))) &&
          (isset($_POST['emailtestemunhoedit']) && !empty(trim($_POST['emailtestemunhoedit']))) &&
          (isset($_POST['testemunhodescricaoedit']) && !empty(trim($_POST['testemunhodescricaoedit'])))
      ){

          $testemunho = new Testemunho();
          $testemunho->setNome(addslashes($_POST['nometestemunhoedit']));
          $testemunho->setEmail(addslashes($_POST['emailtestemunhoedit']));
          $testemunho->setDescricao(addslashes($_POST['testemunhodescricaoedit']));
          $testemunho->setId($id);
          $testemunhoDAO->atualizar($testemunho);
          header("Location: ".BASE_URL.'testemunho/painel');
          exit;
        }
        $array['testemunho'] = $testemunho;
        $this->loadTemplate('testemunho/TestemunhoEdit',$array);
      }
      public function apagar($id){
          $usuario = new Usuario();
          $usuario->verificarUsuario();
          $dao = new TestemunhoDAO();
          $dao->apagar($id);
          header('Location:'.BASE_URL.'testemunho');
      }
  }

?>
