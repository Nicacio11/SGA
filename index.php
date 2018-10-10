
<?php
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    session_start();
    //unset($_SESSION['usuario']);
    require './environment.php';
    header('Content-Type: text/html; charset=utf-8');

    spl_autoload_register(function($class){

        if(file_exists('controllers/'.$class.'.php')){
            require_once 'controllers/'.$class.'.php';
        }else if(file_exists('models/'.$class.'.php')){
            require_once 'models/'.$class.'.php';
        }else if (file_exists('core/'.$class.'.php')){
            require_once 'core/'.$class.'.php';
        }else if(file_exists('dao/'.$class.'.php')){
            require_once 'dao/'.$class.'.php';
        }else{
           require_once $class.'.php';
       }
    });

		$core = new Core();
		$core->run();
