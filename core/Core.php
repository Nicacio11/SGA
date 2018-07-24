<?php
  //essa é a classe responsavel pela definiçãos controllers e os métodos que serão utilizados

  class Core{

    public function run(){
      $url='/';

      $params = array();

      if(isset($_GET['url'])){
        /*
          ao digitar na url www.vitornicacio.com.br/home ou www.vitornicacio.com.br/index?url=home
          sera armazenadona url /home
        */
        $url .= $_GET['url'];
      }

      //verificando se não esta varia ou somente com a /
      if(!empty($url) && $url!='/'){
        //transforma a string em um array e divide
        $url = explode('/', $url);

        //remove o primeiro item do array - pq sempre vem vazio
        array_shift($url);

        //pegando controlador
        $currentController = $url[0].'Controller';

        //removendo novamente pq não é mais necessario
        array_shift($url);

        //pegando a action ou o método
        if(isset($url[0]) && !empty($url[0])){
          $currentAction = $url[0];
          array_shift($url);
        }else{
          $currentAction = 'index';
        }

        //pegando os parametros
        if(count($url)>0){
          $params = $url;
        }


      }else{
        //definindo controlador default
        $currentController = "HomeController";
        //definindo metodo default
        $currentAction = 'index';
      }

      //verificando se o controlador existe ou n
      if(!file_exists('controllers/'.$currentController.'.php')) {
        $currentController = 'NotFoundController';
        $currentAction = 'index';
      }

      
      //instanciando o controller
      $controller = new $currentController;
      //verificando se o metodo existe ou nãoptimize
      if(!method_exists($controller, $currentAction)){
        $currentAction = 'index';
      }


      //método utilizado para chamar o controllador com os metodos e a os parametros
      call_user_func_array(array($controller, $currentAction), $params);

    }
  }
