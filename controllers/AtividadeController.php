<?php

/**
 * Description of AtividadeController
 *
 * @author Vitor Nicacio
 */
class AtividadeController extends Controller{
    public function index(){

    }
    public function painel(){
      $usuario = new Usuario();
      $usuario->verificarUsuario();

      $atividadeDAO = new AtividadeDAO();
      $total_atividades = $atividadeDAO->getTotal();

      //iniciando a paginação
      $p = 1;
      if(isset($_GET['p']) && !empty($_GET['p'])) {
       $p = addslashes($_GET['p']);
     }

     $por_pagina = 10;
     $total_paginas = ceil($total_atividades / $por_pagina);
     $atividades = $atividadeDAO->getAtividades($p, $por_pagina);

     $dado['atividades'] = $atividades;
     $dado['total_atividades'] = $total_paginas;
     $dado['total_paginas'] = $total_paginas;
     $dado['p']=$p;
     $dado['sucesso'] = (!empty($_GET['sucesso']))?$_GET['sucesso']:'';
     $dado['alterado'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
     $dado['removido'] = (!empty($_GET['removido']))?$_GET['removido']:'';

      $this->loadTemplate('atividade/AtividadePainel', $dado);
    }
    public function adicionar(){
      $usuario = new Usuario();
      $usuario->verificarUsuario();
      $array = array();
      $array['erro'] = (!empty($_GET['erro']))?$_GET['erro']:'';

      if(
        (isset($_POST['tituloaa']) && !empty(trim($_POST['tituloaa']))) &&
        (isset($_POST['dataPesquisaaa']) && !empty(trim($_POST['dataPesquisaaa']))) &&
        (isset($_POST['descricaoaa']) && !empty(trim($_POST['descricaoaa']))) &&
        ( isset($_FILES['imagemAtividadeaa']['tmp_name']))
      ){

        $titulo = addslashes($_POST['tituloaa']);
        $descricao = addslashes($_POST['descricaoaa']);
        $data = addslashes($_POST['dataPesquisaaa']);
        $data = str_replace("/", "-", $data);
        $data = date('Y-m-d', strtotime($data));
        $imagem = new Image();
        $imagem->setImagePath($_FILES['imagemAtividadeaa']);

        $atividade = new Atividade($titulo, $descricao, $imagem, $data);
        $atividadeDAO = new AtividadeDAO();
        
        if($atividadeDAO->adicionar($atividade)){
          header("Location: ".BASE_URL."atividade/painel?sucesso=exist");
        }else{
          header("Location: ".BASE_URL."atividade/adicionar?erro=exist");

        }
        exit;
      }

      $this->loadTemplate("atividade/AtividadeAdd", $array);
    }
    public function alterar($id){

          $usuario = new Usuario();
          $usuario->verificarUsuario();
          $atividadeDAO = new ReflexaoDAO();
          $atividade = $atividadeDAO->getReflexao($id);
          if($atividade == null){
            header("Location: ".BASE_URL.'atividade/painel');
            exit;
          }
          $array['erro'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
          if(  (isset($_POST['tituloea']) && !empty(trim($_POST['tituloea']))) &&
            (isset($_POST['dataPesquisaea']) && !empty(trim($_POST['dataPesquisaea']))) &&
            (isset($_POST['descricaoea']) && !empty(trim($_POST['descricaoea']))) &&
            (isset($_POST['imagemAtividadeea']) && !empty(trim($_POST['imagemAtividadeea'])))
        ){

            $titulo = addslashes($_POST['tituloea']);
            $descricao = addslashes($_POST['descricaoea']);
            $data = addslashes($_POST['dataPesquisaea']);
            $data = str_replace("/", "-", $data);
            $data = date('Y-m-d', strtotime($data));
            $imagem = new Image();
            $imagem->setImagePath($_FILES['imagemAtividadeea']);

            $atividade = new Atividade($titulo, $descricao, $imagem, $data);
            $atividade->setId($id);

            $atividadeDAO = new AtividadeDAO();
            if($atividadeDAO->alterar($atividade)){
              header("Location: ".BASE_URL."Reflexao/painel?alterado=exist");
            }else{
              header("Location: ".BASE_URL."Reflexao/alterar?erro=nonexist");
            }
            exit;
          }



          $array['atividade'] = $atividade;
          $this->loadTemplate("atividade/AtividadeEdit", $array);

    }

}
