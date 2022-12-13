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
            'historial' => $this->getVentasDB()
        ]);
        /*$this->view->render('admin/usuarios', [
            "usuarios" => $usuarios
        ]);*/
        //$this->view->render('admin/usuarios');
    }

    private function getVentasDB(){
        $res = [];

        $historialmodel = new VentasModel();
        $historialventas = $historialmodel->getAll();

        foreach ($historialventas as $historial) {
            $historialsarray = [];
            $historialsarray['historial'] = $historial;
            // $categoryArray['total'] = $total;
            // $categoryArray['count'] = $numberOfExpenses;
            // $categoryArray['category'] = $category;

            array_push($res, $historialsarray);
        }
        //$res = array_values(array_unique($res));

        return $res;
    }

}

?>