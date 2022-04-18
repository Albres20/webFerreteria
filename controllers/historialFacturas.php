<?php

class HistorialFacturas extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion Historial Facturacion ::constructor() ");
    }

    function render(){
        error_log("Gestion Historial Facturacion ::RENDER() ");

        $this->view->render('admin/historialFacturas', [
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