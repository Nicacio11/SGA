<?php

/**
 * Description of GaleriaController
 *
 * @author Vitor Nicacio
 */
  class GaleriaController extends Controller{

      public function index(){
      $array['procurar']= (!empty($_GET['procurar']))?$_GET['procurar']:''; 
      $galeriaDAO = new GaleriaDAO();

      $total_galerias = $galeriaDAO->getTotal();

      //iniciando a paginação
      $p = 1;
      if(isset($_GET['p']) && !empty($_GET['p'])) {
       $p = addslashes($_GET['p']);
     }

     $por_pagina = 10;
     $total_paginas = ceil($total_galerias / $por_pagina);
     if($array['procurar']){
        $galerias = $galeriaDAO->getGaleriasLike($array['procurar'], $p, $por_pagina);
        $total_paginas=1;
      }else{
       $galerias = $galeriaDAO->getGalerias($p, $por_pagina);      
      }
     $array['galerias'] = $galerias;
     $array['total_galerias'] = $total_paginas;
     $array['total_paginas'] = $total_paginas;
     $array['p']=$p;
      
      $this->loadView('galeria/GaleriaIndex', $array);

      }

      public function painel(){
        $usuario = new Usuario();
        $usuario->verificarUsuario();

        $galeriaDAO = new GaleriaDAO();
        $total_galerias = $galeriaDAO->getTotal();

        //iniciando a paginação
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
         $p = addslashes($_GET['p']);
       }

       $por_pagina = 10;
       $total_paginas = ceil($total_galerias / $por_pagina);
       $galerias = $galeriaDAO->getGalerias($p, $por_pagina);

       $dado['galerias'] = $galerias;
       $dado['total_galerias'] = $total_paginas;
       $dado['total_paginas'] = $total_paginas;
       $dado['p']=$p;
       $dado['sucesso'] = (!empty($_GET['sucesso']))?$_GET['sucesso']:'';
       $dado['alterado'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
       $dado['removido'] = (!empty($_GET['removido']))?$_GET['removido']:'';

        $this->loadTemplate('galeria/GaleriaPainel', $dado);
      }

      public function adicionar(){
        $usuario = new Usuario();
        $usuario->verificarUsuario();
        $array = array();
        $array['erro'] = (!empty($_GET['erro']))?$_GET['erro']:'';

        if(
          (isset($_POST['tituloag']) && !empty(trim($_POST['tituloag'])))
        ){
          $titulo = addslashes($_POST['tituloag']);

          $galeria = new Galeria();
          $galeria->setTitulo($titulo);
          $galeriaDAO = new GaleriaDAO();
          print_r($titulo);

          if($galeriaDAO->adicionar($galeria)){
            header("Location: ".BASE_URL."galeria/painel?sucesso=exist");
          }else{
            header("Location: ".BASE_URL."galeria/adicionar?erro=exist");
          }
          exit;
        }
        $this->loadTemplate("galeria/GaleriaAdd", $array);

      }
      public function alterar($id){

        $usuario = new Usuario();
        $usuario->verificarUsuario();
        $p = 1;
        $array['removido'] = (!empty($_GET['removido']))?$_GET['removido']:'';

        if(isset($_GET['p']) && !empty($_GET['p'])) {
         $p = addslashes($_GET['p']);
        }
        $galeriaDAO = new GaleriaDAO();
        $galeria = $galeriaDAO->getGaleria($id);
        if($galeria == null){
          header("Location: ".BASE_URL.'galeria/painel');
          exit;
        }
        $array['erro'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
        if((isset($_POST['tituloeg']) && !empty(trim($_POST['tituloeg'])))
      ){
          $titulo = addslashes($_POST['tituloeg']);

          $galeria = new Galeria();
          $galeria->setId($id);
          $galeria->setTitulo($titulo);

          $galeriaDAO = new GaleriaDAO();
          if($galeriaDAO->alterar($galeria)){
            header("Location: ".BASE_URL."Galeria/painel?alterado=exist");
          }else{
            header("Location: ".BASE_URL."Galeria/alterar?erro=nonexist");
          }
          exit;
        }
        $array['galeria'] = $galeria;

        $total_fotos = $galeriaDAO->getTotalById($id);

        $por_pagina = 5;
        $total_paginas = ceil($total_fotos / $por_pagina);
        $array['p']=$p;
        $array['total_fotos'] = $total_paginas;
        $array['total_paginas'] = $total_paginas;
        $array['fotos'] = $galeriaDAO->getFoto($id, $p, $por_pagina);
        $this->loadTemplate("galeria/GaleriaEdit", $array);
      }

      public function adicionarFoto($id){
        $usuario = new Usuario();
        $usuario->verificarUsuario();

        if(isset($id)){
          $array = array();
          $array['erro'] = (!empty($_GET['erro']))?$_GET['erro']:'';
          $galeriaDAO = new GaleriaDAO();
          $array['galeria'] = $galeriaDAO->getGaleria($id);

          if(isset($_FILES['galeriaFotoAdd'])){
            $galerias = $_FILES['galeriaFotoAdd'];
             if(count($galerias)>0){
                for($q=0; $q<count($_FILES['galeriaFotoAdd']['tmp_name']); $q++){
                  $image = new Image();
                  $image->setImagePath($galerias['tmp_name'][$q]);
                  $image->setTipo($galerias['type'][$q]);
                  $galeriaDAO->insertImage($id, $image);
                }
            }
            header("Location: ".BASE_URL."galeria/Painel");

          }

          $this->loadTemplate("galeria/GaleriaImage/GaleriaImageAdd", $array);
        }

      }

      public function alterarFoto($galeriaId ,$id){
        $usuario = new Usuario();
        $usuario->verificarUsuario();
        $galeriaDAO = new GaleriaDAO();
        $foto = $galeriaDAO->getImageById($id);
        $array['foto'] = $foto;
        $array['id'] = $galeriaId;

        if (isset($_FILES['galeriaFotoEdit'])) {
          $image = new Image();
          $image->setId($id);
          $image->setImagePath($_FILES['galeriaFotoEdit']['tmp_name']);
          $image->setTipo($_FILES['galeriaFotoEdit']['type']);

          $galeriaDAO->alterarFoto($image);
           header('Location: '.BASE_URL.'galeria/alterar/'.$galeriaId);
           exit;
          
        }

        $this->loadView("galeria/galeriaimage/GaleriaImageEdit", $array);

      }

      public function apagar($id){
          $usuario = new Usuario();
          $usuario->verificarUsuario();
          if(!empty($id)){

            $dao = new GaleriaDAO();
            if($dao->apagar($id)){
              header('Location:'.BASE_URL.'galeria/painel/?removido=exist');
              exit;
            }
          }
          header('Location:'.BASE_URL.'galeria/painel');
      }
      public function apagarFoto($galeriaId ,$id){
          $usuario = new Usuario();
          $usuario->verificarUsuario();
          if(!empty($id)){

            $dao = new GaleriaDAO();
            if($dao->apagarFoto($id)){
              header('Location:'.BASE_URL.'galeria/alterar/'.$galeriaId.'?removido=exist');
              exit;
            }
          }
          header('Location:'.BASE_URL.'galeria/painel');
      }

  }

?>
