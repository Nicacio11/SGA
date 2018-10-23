<?php

class ReflexaoController extends Controller{
  private $reflexaoDAO;

  public function ReflexaoController(){

  }
  public function index(){
     $array['procurar']= (!empty($_GET['procurar']))?$_GET['procurar']:''; 
      $reflexaoDAO = new ReflexaoDAO();

      $total_reflexoes = $reflexaoDAO->getTotal();

      //iniciando a paginação
      $p = 1;
      if(isset($_GET['p']) && !empty($_GET['p'])) {
       $p = addslashes($_GET['p']);
     }

     $por_pagina = 10;
     $total_paginas = ceil($total_reflexoes / $por_pagina);
     if($array['procurar']){
        $reflexoes = $reflexaoDAO->getReflexoesLike($array['procurar'], $p, $por_pagina);
        $total_paginas=1;
      }else{
       $reflexoes = $reflexaoDAO->getReflexoes($p, $por_pagina);      
      }
     $array['reflexoes'] = $reflexoes;
     $array['total_reflexoes'] = $total_paginas;
     $array['total_paginas'] = $total_paginas;
     $array['p']=$p;
      
      $this->loadView('reflexao/ReflexaoIndex', $array);

  }
  public function reflexaoDetails($id){
      $array = array();
      if(isset($id) && $id != 0){
          $reflexaoDAO = new ReflexaoDAO();
          $reflexao = $reflexaoDAO->getReflexao($id);
          $reflexao->setData($data = date('d/m/Y', strtotime($reflexao->getData())));
          $array['reflexao'] = $reflexao;
          if(!empty($array['reflexao'])){
            $this->loadView('reflexao/ReflexaoDetails', $array);
            exit;
          }
        }
          header("Location: ".BASE_URL."reflexao");
          exit; 

      }

  public function painel(){
    $usuario = new Usuario();
    $usuario->verificarUsuario();

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
   $dado['sucesso'] = (!empty($_GET['sucesso']))?$_GET['sucesso']:'';
   $dado['alterado'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
   $dado['removido'] = (!empty($_GET['removido']))?$_GET['removido']:'';

    $this->loadTemplate('reflexao/ReflexaoPainel', $dado);
  }
  public function adicionar(){
    $usuario = new Usuario();
    $usuario->verificarUsuario();
        $array = array();
        $array['erro'] = (!empty($_GET['erro']))?$_GET['erro']:'';

    if(
      (isset($_POST['tituloadd']) && !empty(trim($_POST['tituloadd']))) &&
      (isset($_POST['descricaoadd']) && !empty(trim($_POST['descricaoadd'])))
    ){
      $titulo = addslashes($_POST['tituloadd']);
      $descricao = addslashes($_POST['descricaoadd']);
      $reflexao = new Reflexao($titulo, $descricao);
      $reflexaoDAO = new ReflexaoDAO();
      if($reflexaoDAO->adicionar($reflexao)){
        header("Location: ".BASE_URL."Reflexao/painel?sucesso=exist");
      }else{
        header("Location: ".BASE_URL."Reflexao/adicionar?erro=exist");

      }
      exit;
    }

    $this->loadTemplate("reflexao/ReflexaoAdd", $array);
  }
  public function alterar($id){

    $usuario = new Usuario();
    $usuario->verificarUsuario();
    $reflexaoDAO = new ReflexaoDAO();
    $reflexao = $reflexaoDAO->getReflexao($id);
    if($reflexao == null){
      header("Location: ".BASE_URL.'reflexao/painel');
      exit;
    }
    $array['erro'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
    if(isset($_POST['tituloedit']) && !empty(trim($_POST['tituloedit']))
    && isset($_POST['descricaoedit']) && !empty(trim($_POST['descricaoedit']))
  ){

      $titulo = addslashes($_POST['tituloedit']);
      $descricao = addslashes($_POST['descricaoedit']);
      $reflexao = new Reflexao($titulo, $descricao);
      $reflexao->setId($id);

      if($reflexaoDAO->alterar($reflexao)){
        header("Location: ".BASE_URL."Reflexao/painel?alterado=exist");
      }else{
        header("Location: ".BASE_URL."Reflexao/alterar?erro=nonexist");
      }
      exit;
    }



    $array['reflexao'] = $reflexao;
    $this->loadTemplate("reflexao/ReflexaoEdit", $array);

  }
  public function apagar($id){
      $usuario = new Usuario();
      $usuario->verificarUsuario();
      if(!empty($id)){

        $dao = new ReflexaoDAO();
        if($dao->apagar($id)){
          header('Location:'.BASE_URL.'reflexao/painel?removido=exist');
          exit;
        }
      }
      header('Location:'.BASE_URL.'reflexao/painel');
  }

}
