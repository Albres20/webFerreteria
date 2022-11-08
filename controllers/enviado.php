<?php

class Enviado extends SessionController{

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
        $this->view->render('Default/enviado');
    }
    function enviarCorreo(){
        if( $this->existPOST(['emailaddress']) ){
            $username = $this->getPost('emailaddress');
            error_log($username);
            $user = $this->model->send($username);
            //$this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
            echo "<script> alert('Contraseña enviado creo1');</script>";
            
        }
        else{
            echo "<script> alert('Contraseña enviado creo2');</script>";
        }
    }    

}

?>