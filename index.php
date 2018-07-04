
<?php
    require './environment.php';


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
>>>>>>> a07dbecc987a0a082ab887cb8bba91afdb1262fd