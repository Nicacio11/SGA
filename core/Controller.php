<?php

  //classe responsavel pelos metodos de chamar pagina e template
  class Controller{


      public function loadView($viewName, $viewData = array()){
        //faz com que cada key e valor do array seja transformado em variavel e valor
        extract($viewData);
        require 'views/'.$viewName.'.php';

      }

      public function loadTemplate($viewName, $viewData = array()){
        //faz com que cada key e valor do array seja transformado em variavel e valor
        extract($viewData);
        require 'views/template.php';
      }

      public function loadInTemplate($viewName, $viewData = array()){
        //faz com que cada key e valor do array seja transformado em variavel e valor
        extract($viewData);
        require 'views/'.$viewName.'.php';
      }

  }
