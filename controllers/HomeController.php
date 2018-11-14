<?php

/**
 * Description of HomeController
 *
 * @author Vitor Nicacio
 */
class HomeController extends Controller{
    public function index(){
        $array = array();
        $reflexaoDAO = new ReflexaoDAO();
        $video = new VideoDAO();
        $galeriaDAO = new GaleriaDAO();
        $galeria = $galeriaDAO->getLastGaleria();
        $atividadeDAO = new AtividadeDAO();
  
        $array['reflexao'] = $reflexaoDAO->getLastReflexao();
        $array['video'] = $video->getLastVideo();
        $array['galeria']= $galeriaDAO->getLastGaleria();
        $array['atividades'] = $atividadeDAO->getLastAtividades();
        $array['erro'] = (!empty($_GET['erro']))?$_GET['erro']:'';
        if(isset($_POST['descricao']) && !empty('$_descricao')){
            $mensagem = new Mensagem();
            $mensagem->setEmail(addslashes((isset($_POST['email'])?$_POST['email']:'Sem email')));
            $mensagem->setNome(addslashes((isset($_POST['nome'])?$_POST['nome']:'Sem nome')));
            $mensagem->setDescricao(addslashes($_POST['descricao'])."\nNome: ". $mensagem->getNome()."\nEmail: ".$mensagem->getEmail());
            
            $mensagem->send("Pedido de Oração");
              header("Location :".BASE_URL."Home?erro=nonexist");
              exit;
                
            }
        $this->loadView('Home', $array);
    }
    
    public function enviarPedido(){
      if(isset($_POST['descricao']) && !empty('$_descricao')){
            $mensagem = new Mensagem();
            $mensagem->setEmail(addslashes((isset($_POST['email'])?$_POST['email']:'Sem email')));
            $mensagem->setNome(addslashes((isset($_POST['nome'])?$_POST['nome']:'Sem nome')));
            $mensagem->setDescricao(addslashes($_POST['descricao'])."\nNome: ". $mensagem->getNome()."\nEmail: ".$mensagem->getEmail());
            
            $mensagem->send("Pedido de Oração");
              header("Location :".BASE_URL."Home?erro=nonexist");
              exit;
                
            }
              header("Location :".BASE_URL."Home");
            exit;
      }
}
