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
        $palabraclave = strval($_POST['busqueda']);
        // $busqueda = "{$palabraclave}%";
        error_log("Gestion de Nueva Venta ::buscarProducto() ::producto: ".$palabraclave);
        $productomodel = new ProductosModel();
        $productos = $productomodel->getProductosBySearch($palabraclave);
        error_log("Gestion de Nueva Venta ::buscarProducto() ::productos: ".json_encode($productos, JSON_UNESCAPED_UNICODE));
        //mostrar los datos en la vista mediante
        echo json_encode($productos, JSON_UNESCAPED_UNICODE);
        //return json_encode($res);
    }

    function buscarCliente(){
        error_log("Gestion de Nueva Venta ::buscarCliente() ");
        $palabraclave = strval($_POST['busqueda']);
        // $busqueda = "{$palabraclave}%";
        error_log("Gestion de Nueva Venta ::buscarCliente() ::cliente: ".$palabraclave);
        $clientemodel = new ClienteProveedorModel();
        $clientes = $clientemodel->getClientesBySearch($palabraclave);
        error_log("Gestion de Nueva Venta ::buscarCliente() ::clientes: ".json_encode($clientes));
        //mostrar los datos en la vista mediante
        echo json_encode($clientes);
        //return json_encode($res);
    }

    function mostrarProducto(){
        error_log("Gestion de Nueva Venta ::mostrarProducto() ");
        $producto = $_POST['producto'];
        error_log("Gestion de Nueva Venta ::mostrarProducto() ::producto nombre o codigo: ".$producto);
        $productomodel = new ProductosModel();
        $productoBuscado = $productomodel->getProductoBuscado($producto);
        error_log("Gestion de Nueva Venta ::mostrarProducto() ::producto: ".json_encode($productoBuscado, JSON_UNESCAPED_UNICODE));
        //mostrar los datos en la vista mediante
        echo json_encode($productoBuscado, JSON_UNESCAPED_UNICODE);
        //return json_encode($res);
    }

    function mostrarCliente(){
        error_log("Gestion de Nueva Venta ::mostrarCliente() ");
        $cliente = $_POST['cliente'];
        error_log("Gestion de Nueva Venta ::mostrarCliente() ::nombre, RUC o DNI: ".$cliente);
        $clientemodel = new ClienteProveedorModel();
        $clienteBuscado = $clientemodel->getClienteBuscado($cliente);
        error_log("Gestion de Nueva Venta ::mostrarCliente() ::cliente: ".json_encode($clienteBuscado));
        //mostrar los datos en la vista mediante
        echo json_encode($clienteBuscado);
        //return json_encode($res);
    }

}

?>