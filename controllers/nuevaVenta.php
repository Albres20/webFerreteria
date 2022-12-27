<?php

require RQ . 'fpdf/fpdf.php';

class NuevaVenta extends SessionController{

    private $user;
    private $usercod;
    private $info;

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

    private function getJSONFileConfig()
    {
        $string = file_get_contents("resource/js/info.json");
        $json = json_decode($string, true);
        $this->info = $json;

        return $json;
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
        $ventasmodel->setdet_fec_ped(date("Y-m-d H:i:s"));
        $ventasmodel->setDet_est_ped("A");
        $ventasmodel->setUsr_codigo($this->usercod);
        $codigo = $obtenerProducto["prd_codigo"];
        $precio = $obtenerProducto["dpr_prec_prod"];
        $cantidad = $_POST['cantidad'];
        $comprobar = $ventasmodel->consultarDetalle($codigo);
        if(empty($comprobar)){
            $subtotal = $precio * $cantidad;
            if($ventasmodel->saveProduct($codigo, $cantidad, $precio, $subtotal)){
                $msg = "ok";
            }else{
                $msg = "error";
            }
        }else{
            $total_cantidad = $comprobar['det_cantidad'] + $cantidad;
            $subtotal = $precio * $total_cantidad;
            if($ventasmodel->updateProduct($codigo, $total_cantidad, $precio, $subtotal)){
                $msg = "update";
            }else{
                $msg = "error";
            }
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        // //return json_encode($res);
        //print_r($obtenerProducto);
    }

    function listarProductos(){
        error_log("Gestion de Nueva Venta ::listarProductos() ");
        //$numventa = "0000000001"; //despues se arregla de como sacar el dato
        $ventasmodel = new VentasModel();
        $data["detalle"] = $ventasmodel->getListaProducto($this->usercod);
        $data["total_pagar"] = $ventasmodel->getCalularVenta($this->usercod);
        //error_log("Gestion de Nueva Venta ::listarProductos() ::productos: ".json_encode($data, JSON_UNESCAPED_UNICODE));
        //mostrar los datos en la vista mediante
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        //return json_encode($res);
    }

    function delete($id){
        error_log("Gestion de Nueva Venta ::delete de lista nueva venta() " . $id[0]);
        $ventasmodel = new VentasModel();
        if($ventasmodel->deleteDetalle($id[0])){
            $msg = "ok";
        }else{
            $msg = "error";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //print_r($id);
    }

    ///////////////////////////////
    function guardarVenta($cpr_cliente){
        error_log("Gestion de Nueva Venta ::guardarVenta() ");
        $ventasmodel = new VentasModel();
        $total = $ventasmodel->getCalularVenta($this->usercod);
        $ventasmodel->setVta_fec_ped(date("Y-m-d H:i:s"));
        $ventasmodel->setVta_est_ped("A");
        if($cpr_cliente[0] == "0"){$ventasmodel->setCpr_cliente(null);
        }else{$ventasmodel->setCpr_cliente($cpr_cliente[0]);}
        //print_r($cpr_cliente);
        if($ventasmodel->registrarVenta($this->usercod, $total['total'])){
            $detalle = $ventasmodel->getListaProducto($this->usercod);
            $idVenta = $ventasmodel->getUltimaVenta($this->usercod);
            foreach ($detalle as $key => $value) {
                $codigo = $value['prd_codigo'];
                $cantidad = $value['det_cantidad'];
                $precio = $value['det_prec_prod'];
                $subtotal = $value['det_prec_subtotal'];
                error_log("idventa:".$idVenta['vta_numped']. " codigo: " . $codigo . " cantidad: " . $cantidad . " precio: " . $precio . " subtotal: " . $subtotal);
                if($ventasmodel->registrarDetalleVenta($idVenta['vta_numped'], $codigo, $cantidad, $precio, $subtotal)){
                    $msg = "ok";
                }else{$msg = "error registrarDetalleVenta";}
                $stock_actual = $ventasmodel->get($codigo);
                $stock = $stock_actual["dpr_stock"] - $cantidad;
                $ventasmodel->actualizarStock($codigo, $stock);
            }
            if($ventasmodel-> vaciarDetalle($this->usercod)){
                $msg = array('msg' => 'ok', 'id_venta' => $idVenta['vta_numped']);
            }
        }else{
            $msg = "error registrarVenta";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    }

    function generarPDF($id_venta){
        error_log("Gestion de Nueva Venta ::generarPDF() ". $id_venta[0]);
        $ventasmodel = new VentasModel();
        //require('fpdf.php');
        $empresa = $this->getJSONFileConfig();

        $pdf = new FPDF($orientation='P',$unit='mm');
        $pdf->AddPage();
        $pdf->SetTitle("Comprobante de Venta");
        $pdf->SetFont('Arial','B',20);    
        $textypos = 5;
        $pdf->setY(12);
        $pdf->setX(10);
        // Agregamos los datos de la empresa
        $pdf->Cell(5,$textypos,$empresa[0]['Razon_social']);
        $pdf->SetFont('Arial','B',10);    
        $pdf->setY(30);$pdf->setX(10);
        $pdf->Cell(5,$textypos,"DE:");
        $pdf->SetFont('Arial','',10);    
        $pdf->setY(35);$pdf->setX(10);
        $pdf->Cell(5,$textypos,$empresa[0]['Razon_social']);
        $pdf->setY(40);$pdf->setX(10);
        $pdf->Cell(5,$textypos,$empresa[0]['Region'] . ' / ' .$empresa[0]['Provincia'] . ' / ' .$empresa[0]['Distrito']);
        // $pdf->setY(45);$pdf->setX(10);
        // $pdf->Cell(5,$textypos,utf8_decode($empresa[0]['Direccion']));
        $pdf->setY(50);$pdf->setX(10);
        $pdf->Cell(5,$textypos,$empresa[0]['Telefono']);
        $pdf->setY(55);$pdf->setX(10);
        $pdf->Cell(5,$textypos,$empresa[0]['Correo']);
        
        // Agregamos los datos del cliente
        $cliente = $ventasmodel->getClienteVenta($id_venta[0]);
        $pdf->SetFont('Arial','B',10);    
        $pdf->setY(30);$pdf->setX(75);
        $pdf->Cell(5,$textypos,"PARA:");
        $pdf->SetFont('Arial','',10);    
        $pdf->setY(35);$pdf->setX(75);
        $pdf->Cell(5,$textypos,$cliente["cpr_nombre"]);
        $pdf->setY(40);$pdf->setX(75);
        $pdf->Cell(5,$textypos,utf8_decode($cliente["cpr_direccion"]));
        $pdf->setY(45);$pdf->setX(75);
        $pdf->Cell(5,$textypos,$cliente["cpr_telefono"]);
        $pdf->setY(50);$pdf->setX(75);
        $pdf->Cell(5,$textypos,$cliente["cpr_tipodocum"]);
        $pdf->setY(55);$pdf->setX(75);
        $pdf->Cell(5,$textypos,$cliente["cpr_numdoc"]);
        
        // Agregamos los datos del cliente
        $pdf->SetFont('Arial','B',10);    
        $pdf->setY(30);$pdf->setX(145);
        $pdf->Cell(5,$textypos,"FACTURA #12345");
        $pdf->SetFont('Arial','',10);    
        $pdf->setY(35);$pdf->setX(145);
        $pdf->Cell(5,$textypos, "Fecha: " . date("d/m/Y") );
        $pdf->setY(40);$pdf->setX(145);
        $pdf->Cell(5,$textypos,"");
        $pdf->setY(50);$pdf->setX(145);
        $pdf->Cell(5,$textypos,"");
        
        /// Apartir de aqui empezamos con la tabla de productos
        $pdf->setY(60);$pdf->setX(145);
            $pdf->Ln();
        /////////////////////////////
        //// Array de Cabecera
        $header = array("Cod.", "Descripcion","Cant.","Precio","Total");
        //// Arrar de Productos
        $productos = $ventasmodel->getProVenta($id_venta[0]);
            // Column widths
            $w = array(20, 95, 20, 25, 25);
            // Header
            for($i=0;$i<count($header);$i++)
                $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
            $pdf->Ln();
            // Data
            $total = 0;
            foreach($productos as $row)
            {
                $pdf->Cell($w[0],6,$row['ventas_listidproducto'],1);
                $pdf->Cell($w[1],6,utf8_decode($row['prd_nombre']),1);
                $pdf->Cell($w[2],6,number_format($row['ventas_listcantidad']),'1',0,'R');
                $pdf->Cell($w[3],6,"S/. ".number_format($row['ventas_listprecio'],2,".",","),'1',0,'R');
                $pdf->Cell($w[4],6,"S/. ".number_format($row['ventas_listcantidad'] * $row['ventas_listprecio'],2,".",","),'1',0,'R');
        
                $pdf->Ln();
                $total+=$row['ventas_listprecio']*$row['ventas_listcantidad'];
        
            }
        /////////////////////////////
        //// Apartir de aqui esta la tabla con los subtotales y totales
        $yposdinamic = 60 + (count($productos)*10);
        
        $pdf->setY($yposdinamic);
        $pdf->setX(235);
            $pdf->Ln();
        /////////////////////////////
        $header = array("", "");
        $data2 = array(
            array("Subtotal",$total),
            array("Impuesto", 0),
            array("Total", $total),
        );
            // Column widths
            $w2 = array(40, 40);
            // Header
        
            $pdf->Ln();
            // Data
            foreach($data2 as $row)
            {
        $pdf->setX(115);
                $pdf->Cell($w2[0],6,$row[0],1);
                $pdf->Cell($w2[1],6,"S/. ".number_format($row[1], 2, ".",","),'1',0,'R');
        
                $pdf->Ln();
            }
        /////////////////////////////
        
        $yposdinamic += (count($data2)*10);
        $pdf->SetFont('Arial','B',10);    
        
        $pdf->setY($yposdinamic);
        $pdf->setX(10);
        $pdf->Cell(5,$textypos,"TERMINOS Y CONDICIONES");
        $pdf->SetFont('Arial','',10);    
        
        $pdf->setY($yposdinamic+10);
        $pdf->setX(10);
        $pdf->Cell(5,$textypos,"El cliente se compromete a pagar la factura.");
        $pdf->setY($yposdinamic+20);
        
        
        
        $pdf->Image(URL . RQ . 'image/empresa/' . $empresa[0]['Logo'] . '', 165, 0, 35, 30);
        $pdf->output();
    } 

}

?>