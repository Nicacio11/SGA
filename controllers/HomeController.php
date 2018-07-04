<?php

/**
 * Description of HomeController
 *
 * @author Vitor Nicacio
 */
class HomeController extends Controller{
    public function index(){
        $this->loadView('Home');
    }
}
