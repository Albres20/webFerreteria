<?php

class Seguimiento extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion Seguimiento ::constructor() ");
    }

    function render(){
        error_log("Gestion Seguimiento ::RENDER() ");

        $this->view->render('admin/seguimiento', [
            'user' => $this->user,
            //'clientes' => $this->getClienteDB(),
        ]);
        /*$this->view->render('admin/usuarios', [
            "usuarios" => $usuarios
        ]);*/
        //$this->view->render('admin/usuarios');
    }


}

?>