<?php

if(isset($_GET['funcion']) && !empty($_GET['funcion'])) {
    $funcion = $_GET['funcion'];

    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch($funcion) {
        case 'funcion1': 
            $a -> mostrarTablaProductosCompra();
            break;
        case 'funcion2': 
            $b -> accion2();
            break;
    }
}
class Buscarproductoajax {

    function mostrarTablaProductosCompra()
    {
        //if(!empty($_REQUEST['buscarProductoCompra'])){
            $search = $_REQUEST['buscarProductoCompra'];
            $productomodel = new ProductosModel();
            $productos = $productomodel->getProductosBySearch($search);
            $res = array();
            foreach($productos as $producto){
                $res[] = array(
                    'productos_codigo' => $producto['productos_codigo'],
                    'productos_nombre' => $producto['productos_nombre'],
                    'productos_cantidad' => $producto['productos_cantidad']
                );
            }
            echo json_encode($res);

        //}
    }
}
$a = new Buscarproductoajax();
$a -> mostrarTablaProductosCompra();

?>