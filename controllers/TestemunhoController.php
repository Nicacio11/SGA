<?php

  class TestemunhoController extends Controller{

      public function __construct(){
        $usuario = new Usuario();
        $usuario->verificarUsuario();
      }

      public function index(){
        $array = array();
        $testemunhos = null;
        $array['testemunhos'] = $testemunhos;
        $this->loadTemplate('testemunho/TestemunhoPainel', $array);
      }
      public function adicionar(){
        $this->loadTemplate('testemunho/TestemunhoAdd');
      }
      public function editar($id){
        $this->loadTemplate('testemunho/TestemunhoEdit');
      }
  }

?>
