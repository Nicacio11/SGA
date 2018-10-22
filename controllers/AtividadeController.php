<?php

/**
 * Description of AtividadeController
 *
 * @author Vitor Nicacio
 */
class AtividadeController extends Controller{

    public function index(){
      $array['procurar']= (!empty($_GET['procurar']))?$_GET['procurar']:''; 
      $atividadeDAO = new AtividadeDAO();

      $total_atividades = $atividadeDAO->getTotal();

      //iniciando a paginação
      $p = 1;
      if(isset($_GET['p']) && !empty($_GET['p'])) {
       $p = addslashes($_GET['p']);
     }

     $por_pagina = 10;
     $total_paginas = ceil($total_atividades / $por_pagina);
     if($array['procurar']){
        $atividades = $atividadeDAO->getAtividadesLike($array['procurar'], $p, $por_pagina);
        $total_paginas=1;
      }else{
       $atividades = $atividadeDAO->getAtividades($p, $por_pagina);      
      }
     $array['atividades'] = $atividades;
     $array['total_atividades'] = $total_paginas;
     $array['total_paginas'] = $total_paginas;
     $array['p']=$p;
      
      $this->loadView('atividade/AtividadeIndex', $array);

    }
    public function atividadeDetails($id){
      $array = array();
      if(isset($id) && $id != 0){
          $atividadeDAO = new AtividadeDAO();
          $atividade = $atividadeDAO->getAtividade($id);
          $atividade->setData($data = date('d/m/Y', strtotime($atividade->getData())));
          $array['atividade'] = $atividade;
          if(!empty($array['atividade'])){
            $this->loadView('atividade/AtividadeDetails', $array);
            exit;
          }
        }
          header("Location: ".BASE_URL."atividade");
          exit; 

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
      $atividadeDAO = new AtividadeDAO();
      $atividade = $atividadeDAO->getAtividade($id);
      if($atividade == null){
        header("Location: ".BASE_URL.'atividade/painel');
        exit;
      }
      $array['erro'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
      if((isset($_POST['tituloea']) && !empty(trim($_POST['tituloea']))) &&
        (isset($_POST['dataPesquisaea']) && !empty(trim($_POST['dataPesquisaea']))) &&
        (isset($_POST['descricaoea']) && !empty(trim($_POST['descricaoea']))) &&
        (isset($_FILES['imagemAtividadeea']))
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
          header("Location: ".BASE_URL."Atividade/painel?alterado=exist");
        }else{
          header("Location: ".BASE_URL."Atividade/alterar?erro=nonexist");
        }
        exit;
      }
      $atividade->setData(str_replace("-", "/", $atividade->getData()));
      $atividade->setData(date('d/m/Y', strtotime($atividade->getData())));
      $array['atividade'] = $atividade;
      $this->loadTemplate("atividade/AtividadeEdit", $array);

    }
    public function apagar($id){
        $usuario = new Usuario();
        $usuario->verificarUsuario();
        if(!empty($id)){

          $dao = new AtividadeDAO();
          if($dao->apagar($id)){
            header('Location:'.BASE_URL.'atividade/painel?removido=exist');
            exit;
          }
        }
        header('Location:'.BASE_URL.'atividade/painel');
    }
}
