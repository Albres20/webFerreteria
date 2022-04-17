<?php

class HistorialCotizaciones extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de Nueva Cotizaciones ::constructor() ");
    }

    function render(){
        error_log("Gestion de Nueva Cotizaciones ::RENDER() ");

        $this->view->render('admin/historialCotizaciones', [
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