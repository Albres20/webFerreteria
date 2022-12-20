<?php

class NuevaVenta extends SessionController{

    private $user;
    private $usercod;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        $this->usercod = $this->getUserId();
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
        $productomodel = new VentasModel();
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
        $clientemodel = new VentasModel();
        $clienteBuscado = $clientemodel->getClienteBuscado($cliente);
        error_log("Gestion de Nueva Venta ::mostrarCliente() ::cliente: ".json_encode($clienteBuscado));
        //mostrar los datos en la vista mediante
        echo json_encode($clienteBuscado);
        //return json_encode($res);
    }

    function addproducto(){
        $id = $_POST['id'];
        error_log("Gestion de Nueva Venta ::addproducto() ");
        // $data = [];
        // error_log("Gestion de Nueva Venta ::addproducto() ::producto: ".json_encode($producto));
        $ventasmodel = new VentasModel();

        $obtenerProducto = $ventasmodel->get($id);
        //$ventasmodel->setVta_numped("0000000002");
        $ventasmodel->setVta_fec_ped(date("Y-m-d H:i:s"));
        $ventasmodel->setDet_est_ped("A");
        $vtanumero = "0000000001";
        $codigo = $obtenerProducto["prd_codigo"];
        $precio = $obtenerProducto["dpr_prec_prod"];
        $cantidad = $_POST['cantidad'];
        $subtotal = $precio * $cantidad;
        if($ventasmodel->saveProduct($codigo, $cantidad, $precio, $subtotal, $vtanumero)){
            $msg = "ok";
        }else{
            $msg = "error";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        // //return json_encode($res);
        //print_r($obtenerProducto);
    }

    function listarProductos(){
        error_log("Gestion de Nueva Venta ::listarProductos() ");
        $numventa = "0000000001"; //despues se arregla de como sacar el dato
        $ventasmodel = new VentasModel();
        $lista = $ventasmodel->getListaProducto($numventa);
        //error_log("Gestion de Nueva Venta ::listarProductos() ::productos: ".json_encode($productos, JSON_UNESCAPED_UNICODE));
        //mostrar los datos en la vista mediante
        echo json_encode($lista, JSON_UNESCAPED_UNICODE);
        //return json_encode($res);
    }

}

?>