<?php

class ReflexaoController extends Controller{
  private $reflexaoDAO;

  public function ReflexaoController(){
    $usuario = new Usuario();
    $usuario->verificarUsuario();

  }
  public function index(){

    $reflexaoDAO = new ReflexaoDAO();
    $dado['reflexoes'] = $reflexaoDAO->getReflexoes();
    $this->loadTemplate('reflexao/ReflexaoPainel', $dado);
  }
  public function adicionar(){
    if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
      $titulo = addslashes($_POST['titulo']);
      $descricao = addslashes($_POST['descricao']);
      $reflexao = new Reflexao($titulo, $descricao);
      $reflexaoDAO = new ReflexaoDAO();
      $reflexaoDAO->adicionar($reflexao);
    }

    $this->loadTemplate("reflexao/ReflexaoAdd");
  }

}
