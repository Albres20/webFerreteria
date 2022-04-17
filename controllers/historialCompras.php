<?php

class HistorialCompras extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de Historial Compras ::constructor() ");
    }

    function render(){
        error_log("Gestion de Nueva Compra ::RENDER() ");

        $this->view->render('admin/historialCompras', [
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