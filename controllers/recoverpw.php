<?php

class Recoverpw extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        error_log("RecuperarContraseña::constructor()");
    }

    function render(){
        error_log("RecuperarContraseña::RENDER() ");
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        $this->view->errorMessage = '';
        $this->view->render('Default/recoverpw');
    }

}

?>