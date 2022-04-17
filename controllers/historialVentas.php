<?php

class HistorialVentas extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de Historial Ventas ::constructor() ");
    }

    function render(){
        error_log("Gestion de Nueva Venta ::RENDER() ");

        $this->view->render('admin/historialVentas', [
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