<?php
/**
 * Modelo de usuarios
 */
class UsuariosController extends SessionController{
    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
        error_log("user " . $this->user->getUsername());
    }
    
    function render(){
        $this->view->render('Usuarios/index', [
            "user" => $this->user
        ]);
    }
}
?>