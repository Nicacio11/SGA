<?php

  class TestemunhoController extends Controller{

      public function __construct(){

      }
      public function index(){

      }
      public function painel(){
        $usuario = new Usuario();
        $usuario->verificarUsuario();

        $dado = array();
        $dado['sucesso'] = (!empty($_GET['sucesso']))?$_GET['sucesso']:'';
        $dado['alterado'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
        $dado['removido'] = (!empty($_GET['removido']))?$_GET['removido']:'';

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
        $array = array();
        $array['erro'] = (!empty($_GET['erro']))?$_GET['erro']:'';

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

          if($testemunhoDAO->adicionar($testemunho)){
            header("Location: ".BASE_URL."testemunho/painel?sucesso=exist");
          }else{
            header("Location: ". BASE_URL."usuario/adicionar?erro=exist");
          }
          exit;
        }
        $this->loadTemplate('testemunho/TestemunhoAdd', $array);
      }
      public function alterar($id){
        $usuario = new Usuario();
        $usuario->verificarUsuario();
        $testemunhoDAO = new TestemunhoDAO();
        $testemunho = $testemunhoDAO->getTestemunho($id);
        $array = array();
        $array['erro'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
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

          if($testemunhoDAO->alterar($testemunho)){

            header("Location: ".BASE_URL.'testemunho/painel?alterado=exist');
          }else{
            header("Location: ".BASE_URL.'testemunho/alterar?erro=nonexist');

          }
          exit;
        }
        $array['testemunho'] = $testemunho;
        $this->loadTemplate('testemunho/TestemunhoEdit',$array);
      }
      public function apagar($id){
          $usuario = new Usuario();
          $usuario->verificarUsuario();

          if(!empty($id)){
            $dao = new TestemunhoDAO();
            if($dao->apagar($id)){
              header('Location:'.BASE_URL.'testemunho/painel?removido=exist');
               exit;
            }
          }
          header('Location:'.BASE_URL.'testemunho/painel');
      }
  }

?>
