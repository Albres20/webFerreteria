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
    function enviarCorreo(){
        if( $this->existPOST(['emailaddress']) ){
            $username = $this->getPost('emailaddress');
            $recover=new EnviadoModel();        
            error_log($username);
            if($recover->send($username)){
                echo "<script> alert('Contraseña enviado creo1');</script>";
            }
            else{
                echo "<script> alert('Contraseña No enviada creo1');</script>";
            }

            
            
        }
        else{
            echo "<script> alert('No cargo correo');</script>";
        }
    } 

}

?>