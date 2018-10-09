<?php

  class VideoController extends Controller{

      public function __construct(){

      }
      public function index(){

      }
      public function painel(){
        $usuario = new Usuario();
        $usuario->verificarUsuario();

        $videoDAO = new VideoDAO();
        $total_videos = $videoDAO->getTotal();
        $dado = array();
        $dado['sucesso'] = (!empty($_GET['sucesso']))?$_GET['sucesso']:'';
        $dado['alterado'] = (!empty($_GET['alterado']))?$_GET['alterado']:'';
        $dado['removido'] = (!empty($_GET['removido']))?$_GET['removido']:'';

        //iniciando a paginação
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
         $p = addslashes($_GET['p']);
       }

       $por_pagina = 10;
       $total_paginas = ceil($total_videos / $por_pagina);
       $videos = $videoDAO->getVideos($p, $por_pagina);

       $dado['videos'] = $videos;
       $dado['total_videos'] = $total_paginas;
       $dado['total_paginas'] = $total_paginas;
       $dado['p']=$p;
        $this->loadTemplate('video/VideoPainel', $dado);
      }
      public function adicionar(){
        $usuario = new Usuario();
        $usuario->verificarUsuario();
        $array['erro'] = (!empty($_GET['erro']))?$_GET['erro']:'';

        if(
          (isset($_POST['tituloav']) && !empty(trim($_POST['tituloav']))) &&
          (isset($_POST['urlav']) && !empty(trim($_POST['urlav']))) &&
          (isset($_POST['descricaoav']) && !empty(trim($_POST['descricaoav'])))
        ){
          $video = new Video();
          $video->setTitulo(addslashes($_POST['tituloav']));
          $video->setVideoPath(addslashes($_POST['urlav']));
          $video->setDescricao(addslashes($_POST['descricaoav']));
          $videoDAO = new VideoDAO();

          if($videoDAO->adicionar($video)){
            header("Location: ".BASE_URL."video/painel?sucesso=exist");
          }else{
            header("Location: ".BASE_URL."video/adicionar?erro=exist");

          }

          exit;
        }
        $this->loadTemplate('video/VideoAdd', $array);
      }
      public function alterar($id){
        $usuario = new Usuario();
        $usuario->verificarUsuario();
        $videoDAO = new VideoDAO();
        $video = $videoDAO->getVideo($id);

        if($video == null){
          header("Location: ".BASE_URL.'video/painel');
          exit;
        }
        if(
          (isset($_POST['tituloev']) && !empty(trim($_POST['tituloev']))) &&
          (isset($_POST['urlev']) && !empty(trim($_POST['urlev']))) &&
          (isset($_POST['descricaoev']) && !empty(trim($_POST['descricaoev'])))
        ){
          $video = new Video();
          $video->setTitulo(addslashes($_POST['tituloev']));
          $video->setVideoPath(addslashes($_POST['urlev']));
          $video->setDescricao(addslashes($_POST['descricaoev']));
          $video->setId($id);
          if($videoDAO->alterar($video)){
            header("Location: ".BASE_URL."video/painel?alterado=exist");
          }else{
            header("Location: ".BASE_URL."video/alterar/".$id."?erro=nonexist");
          }
          exit;
        }
        $array['erro'] = (!empty($_GET['erro']))?$_GET['erro']:'';
        $array['video'] = $video;
        $this->loadTemplate('video/VideoEdit',$array);
      }
      public function apagar($id){
          $usuario = new Usuario();
          $usuario->verificarUsuario();
          if(!empty($id)){

            $dao = new VideoDAO();
            if($dao->apagar($id)){
              header('Location:'.BASE_URL.'video/painel?removido=exist');
              exit;
            }
          }
          header('Location:'.BASE_URL.'video');
      }
  }

?>
