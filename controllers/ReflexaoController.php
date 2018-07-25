<?php

class ReflexaoController extends Controller{
  private $reflexaoDAO;

  public function ReflexaoController(){
    $usuario = new Usuario();
    $usuario->verificarUsuario();

  }
  public function index(){

    $reflexaoDAO = new ReflexaoDAO();
    $total_reflexoes = $reflexaoDAO->getTotal();

    //iniciando a paginação
    $p = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])) {
     $p = addslashes($_GET['p']);
   }

   $por_pagina = 10;
   $total_paginas = ceil($total_reflexoes / $por_pagina);
   $reflexoes = $reflexaoDAO->getReflexoes($p, $por_pagina);

   $dado['reflexoes'] = $reflexoes;
   $dado['total_reflexoes'] = $total_paginas;
   $dado['total_paginas'] = $total_paginas;
   $dado['p']=$p;
    $this->loadTemplate('reflexao/ReflexaoPainel', $dado);
  }
  public function adicionar(){
    if(isset($_POST['tituloadd']) && !empty(trim($_POST['tituloadd']))){
      $titulo = addslashes($_POST['tituloadd']);
      $descricao = addslashes($_POST['descricaoadd']);
      $reflexao = new Reflexao($titulo, $descricao);
      $reflexaoDAO = new ReflexaoDAO();
      $reflexaoDAO->adicionar($reflexao);
      header("Location: ".BASE_URL."Reflexao");
      exit;
    }

    $this->loadTemplate("reflexao/ReflexaoAdd");
  }
  public function editar($id){
    $reflexaoDAO = new ReflexaoDAO();

    $reflexao = $reflexaoDAO->getReflexao($id);

    $array['reflexao'] = $reflexao;
    $this->loadTemplate("reflexao/ReflexaoEdit", $array);

  }
  public function apagar($id){
      $dao = new ReflexaoDAO();
      $dao->apagar($id);
      header('Location:'.BASE_URL.'reflexao');
  }

}
