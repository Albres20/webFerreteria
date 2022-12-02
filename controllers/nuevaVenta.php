<?php

class NuevaVenta extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de Nueva Venta ::constructor() ");
    }

    function render(){
        error_log("Gestion de Nueva Venta ::RENDER() ");

        $this->view->render('admin/nuevaVenta', [
            'user' => $this->user,
            //'clientes' => $this->getClienteDB(),
        ]);
        /*$this->view->render('admin/usuarios', [
            "usuarios" => $usuarios
        ]);*/
        //$this->view->render('admin/usuarios');
    }

    //recoger la consulta de demo.new-venta.js
    function buscarProducto(){
        error_log("Gestion de Nueva Venta ::buscarProducto() ");
        $producto = $_POST['consulta'];
        error_log("Gestion de Nueva Venta ::buscarProducto() ::producto: ".$producto);
        $productomodel = new ProductosModel();
        $productos = $productomodel->getProductosBySearch($producto);
        $res = array();
        foreach($productos as $producto){
            $res[] = array(
                'estado' => 'success',
                'codigo' => $producto['prd_codigo'],
                'nombre' => $producto['prd_nombre'],
                'stock' => $producto['dpr_stock'],
                'precio' => $producto['dpr_prec_prod']
            );
        }
        error_log("Gestion de Nueva Venta ::buscarProducto() ::productos: ".json_encode($res));
        //mostrar los datos en la vista mediante
        echo json_encode($res);
        //return json_encode($res);
    }

    function buscarCliente(){
        error_log("Gestion de Nueva Venta ::buscarCliente() ");
        $cliente = $_POST['query'];
        error_log("Gestion de Nueva Venta ::buscarCliente() ::cliente: ".$cliente);
        $clientemodel = new ClienteProveedorModel();
        $clientes = $clientemodel->getClientesBySearch($cliente);
        $res = array();
        foreach($clientes as $cliente){
            $res[] = array(
                'nombre' => $cliente['cpr_nombre'],
                'tipoDOC' => $cliente['cpr_tipodocum'],
                'numDOC' => $cliente['cpr_numdoc'],
                'direccion' => $cliente['cpr_direccion'],
            );
        }
        error_log("Gestion de Nueva Venta ::buscarCliente() ::clientes: ".json_encode($res));
        //mostrar los datos en la vista mediante
        echo json_encode($res);
        //return json_encode($res);
    }

}

?>