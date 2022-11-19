<?php
$producto = $_REQUEST['consulta'];
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
//mostrar los datos en la vista mediante 
//return json_encode($res);
echo json_encode($res);
?>