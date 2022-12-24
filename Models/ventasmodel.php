<?php

class VentasModel extends Model implements IModel{
    
    private $vta_numped;
    private $vta_val_neto;
    private $vta_fec_ped;
    private $vta_est_ped;
    private $usr_codigo;
    private $usr_nombre;
    private $cpr_cliente;
    private $cpr_nombre;
    /// ventas_det
    private $det_prec_prod;
    private $det_cantidad;
    private $det_prec_total;
    private $det_fec_ped;
    private $det_est_ped;
    private $det_cod_prod;
    //private $vta_numped;
    private $prd_codigo;

    public function __construct(){
        parent::__construct();
    }

    public function save(){}

    public function saveProduct($codigo, $cantidad, $precio, $subtotal){
        //guardar en la tabla ventas_det
        try{
            $query = $this->prepare('INSERT INTO ventas_det (prd_codigo, usr_codigo, det_prec_prod, det_cantidad, det_prec_subtotal, det_fec_ped, det_est_ped) 
            VALUES (:prd_codigo, :usr_codigo, :det_prec_prod, :det_cantidad, :det_prec_subtotal, :det_fec_ped, :det_est_ped)');
            $query->execute([
                'prd_codigo' => $codigo,
                'usr_codigo' => $this->usr_codigo,
                'det_prec_prod' => $precio,
                'det_cantidad' => $cantidad,
                'det_prec_subtotal' => $subtotal,
                'det_fec_ped' => $this->det_fec_ped,
                'det_est_ped' => $this->det_est_ped
            ]);
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    public function updateProduct($codigo, $cantidad, $precio, $subtotal){
        //guardar en la tabla ventas_det
        try{
            $query = $this->prepare('UPDATE ventas_det SET det_prec_prod = :det_prec_prod, det_cantidad = :det_cantidad, det_prec_subtotal = :det_prec_subtotal WHERE prd_codigo = :prd_codigo AND usr_codigo = :usr_codigo');
            $query->execute([
                'prd_codigo' => $codigo,
                'usr_codigo' => $this->usr_codigo,
                'det_prec_prod' => $precio,
                'det_cantidad' => $cantidad,
                'det_prec_subtotal' => $subtotal
            ]);
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    public function getAll(){
        $items = [];
        try{
            $query = $this->query("SELECT ventas.vta_numped, clientes.cpr_nombre, ventas.vta_val_neto, ventas.vta_fec_ped, usuario.usr_nombre  FROM ventas 
            LEFT JOIN clientes 
            ON clientes.cpr_id = ventas.cpr_cliente
            LEFT JOIN  usuario  ON usuario.usr_codigo = ventas.usr_codigo");
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new VentasModel();
                $item->from($p); 
                                
                array_push($items, $item);
            }
                
            return $items;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function get($id){
        try{
            $query = $this->prepare('SELECT productos.prd_codigo, productos.prd_nombre, productos.prd_imagen, producto_det.dpr_marca,  
            producto_det.dpr_prec_compra, producto_det.dpr_prec_prod, 
            producto_det.dpr_stock, categoria.cat_nombre, producto_det.dpr_fec_ult_modificacion
            FROM productos
            LEFT JOIN producto_det 
            on productos.prd_codigo = producto_det.prd_codigo
            LEFT JOIN categoria
            on categoria.cat_id = productos.cat_id
            WHERE productos.prd_codigo = :prd_codigo');
            $query->execute([ 'prd_codigo' => $id]);
            $producto = $query->fetch(PDO::FETCH_ASSOC);
            return $producto;
        }catch(PDOException $e){
            error_log('MODELS::PRODUCTOSMODEL::GET::PDOException ' . $e->getMessage());
            return false;
        }
    }
    public function getListaProducto($usr_cod){
        $items = [];
        try{
            $query = $this->prepare("SELECT ventas_det.det_id, productos.prd_nombre, categoria.cat_color, categoria.cat_nombre,
            ventas_det.prd_codigo, ventas_det.det_prec_prod, ventas_det.det_cantidad, ventas_det.det_prec_subtotal
            FROM ventas_det 
            LEFT JOIN productos 
            ON productos.prd_codigo = ventas_det.prd_codigo
            INNER JOIN categoria
            ON productos.cat_id = categoria.cat_id
            WHERE ventas_det.usr_codigo = :usr_codigo");
            $query->execute([ 'usr_codigo' => $usr_cod]);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getCalularVenta($usr_cod){
        $items = [];
        try{
            $query = $this->prepare("SELECT SUM(det_prec_subtotal) AS total FROM ventas_det WHERE usr_codigo = :usr_codigo");
            $query->execute([ 'usr_codigo' => $usr_cod]);
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function delete($id){}
    public function deleteDetalle($id){
        try{
            $query = $this->prepare('DELETE FROM ventas_det WHERE det_id = :det_id');
            $query->execute([ 'det_id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function consultarDetalle($codigo){
        $items = [];
        try{
            $query = $this->prepare("SELECT * FROM ventas_det WHERE prd_codigo = :prd_codigo AND usr_codigo = :usr_codigo");
            $query->execute([ 'usr_codigo' => $this->usr_codigo, 'prd_codigo' => $codigo]);
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function registrarVenta($usr_cod, $total){
        try{
            $query = $this->prepare('INSERT INTO ventas (vta_val_neto, vta_fec_ped, vta_est_ped, usr_codigo, cpr_cliente)
            VALUES (:vta_val_neto, :vta_fec_ped, :vta_est_ped , :usr_codigo, :cpr_cliente)'); 
            $query->execute([
                'cpr_cliente' => $this->cpr_cliente,
                'vta_val_neto' => $total,
                'vta_fec_ped' => $this->vta_fec_ped,
                'usr_codigo' => $usr_cod,
                'vta_est_ped' => $this->vta_est_ped
            ]);
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getUltimaVenta($usr_cod){
        $items = [];
        try{
            $query = $this->prepare("SELECT MAX(vta_numped) AS vta_numped FROM ventas WHERE usr_codigo = :usr_codigo");
            $query->execute([ 'usr_codigo' => $usr_cod]);
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function registrarDetalleVenta($vta_numped, $prd_codigo, $det_cantidad, $det_prec_prod, $det_prec_subtotal){
        try{
            $query = $this->prepare('INSERT INTO ventas_list (ventas_lisidventa, ventas_listidproducto, ventas_listcantidad, ventas_listprecio, ventas_listsubtotal)
            VALUES (:ventas_lisidventa, :ventas_listidproducto, :ventas_listcantidad, :ventas_listprecio, :ventas_listsubtotal)');
            $query->execute([
                'ventas_lisidventa' => $vta_numped,
                'ventas_listidproducto' => $prd_codigo,
                'ventas_listcantidad' => $det_cantidad,
                'ventas_listprecio' => $det_prec_prod,
                'ventas_listsubtotal' => $det_prec_subtotal,
            ]);
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    public function update(){}
    public function from($array){
        $this->vta_numped = $array['vta_numped'];
        $this->cpr_nombre = $array['cpr_nombre'];
        $this->vta_val_neto = $array['vta_val_neto'];
        $this->vta_fec_ped = $array['vta_fec_ped'];
        $this->usr_nombre = $array['usr_nombre'];
    }

    public function getClienteBuscado($cliente){
        try{
            $query = $this->prepare('SELECT cpr_nombre, cpr_tipodocum, cpr_numdoc, cpr_direccion 
                FROM clientes 
                WHERE cpr_nombre = :cpr_nombre or cpr_numdoc = :cpr_numdoc');
            $query->execute([ 'cpr_numdoc' => $cliente, 'cpr_nombre' => $cliente]);
            
            if($query->rowCount() > 0){
                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    $data['nombre'] = $row['cpr_nombre'];
                    $data['tipo'] = $row['cpr_tipodocum'];
                    $data['num'] = $row['cpr_numdoc'];
                    $data['dir'] = $row['cpr_direccion'];
                }
                return $data;
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getProductoBuscado($producto){
        try{
            $query = $this->prepare('SELECT productos.prd_codigo, productos.prd_nombre, productos.prd_imagen, producto_det.dpr_marca,  
            producto_det.dpr_prec_compra, producto_det.dpr_prec_prod, producto_det.dpr_stock 
            FROM productos
            LEFT JOIN producto_det 
            on productos.prd_codigo = producto_det.prd_codigo 
            WHERE productos.prd_nombre = :prd_nombre
            OR productos.prd_codigo = :prd_codigo');
            $query->execute([ 'prd_nombre' => $producto, 'prd_codigo' => $producto]);

            if($query->rowCount() > 0){
                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    $data['codigo'] = $row['prd_codigo'];
                    $data['nombre'] = $row['prd_nombre'];
                    $data['precio_producto'] = $row['dpr_prec_prod'];
                    $data['stock'] = $row['dpr_stock'];
                }
                return $data;
            }

        }catch(PDOException $e){
            echo $e;
        }
    }


    //getter and setter
    public function getVta_numped(){ return $this->vta_numped;}
    public function setVta_numped($vta_numped){ $this->vta_numped = $vta_numped;}
    public function getVta_val_neto(){ return $this->vta_val_neto;}
    public function setVta_val_neto($vta_val_neto){ $this->vta_val_neto = $vta_val_neto;}
    public function getVta_fec_ped(){ return $this->vta_fec_ped;}
    public function setVta_fec_ped($vta_fec_ped){ $this->vta_fec_ped = $vta_fec_ped;}
    public function getVta_est_ped(){ return $this->vta_est_ped;}
    public function setVta_est_ped($vta_est_ped){ $this->vta_est_ped = $vta_est_ped;}
    public function getUsr_codigo(){ return $this->usr_codigo;}
    public function setUsr_codigo($usr_codigo){ $this->usr_codigo = $usr_codigo;}
    public function getUsr_nombre(){ return $this->usr_nombre;}
    public function setUsr_nombre($usr_nombre){ $this->usr_nombre = $usr_nombre;}
    public function getCpr_cliente(){ return $this->cpr_cliente;}
    public function setCpr_cliente($cpr_cliente){ $this->cpr_cliente = $cpr_cliente;}
    public function getCpr_nombre(){ return $this->cpr_nombre;}
    public function setCpr_nombre($cpr_nombre){ $this->cpr_nombre = $cpr_nombre;}
    public function getDet_prec_prod(){ return $this->det_prec_prod;}
    public function setDet_prec_prod($det_prec_prod){ $this->det_prec_prod = $det_prec_prod;}
    public function getDet_cantidad(){ return $this->det_cantidad;}
    public function setDet_cantidad($det_cantidad){ $this->det_cantidad = $det_cantidad;}
    public function getDet_prec_total(){ return $this->det_prec_total;}
    public function setDet_prec_total($det_prec_total){ $this->det_prec_total = $det_prec_total;}
    public function setdet_fec_ped($det_fec_ped){ $this->det_fec_ped = $det_fec_ped;}
    public function getDet_fec_ped(){ return $this->det_fec_ped;}
    public function getDet_est_ped(){ return $this->det_est_ped;}
    public function setDet_est_ped($det_est_ped){ $this->det_est_ped = $det_est_ped;}
    public function getDet_cod_prod(){ return $this->det_cod_prod;}
    public function setDet_cod_prod($det_cod_prod){ $this->det_cod_prod = $det_cod_prod;}
    public function getPrd_codigo(){ return $this->prd_codigo;}
    public function setPrd_codigo($prd_codigo){ $this->prd_codigo = $prd_codigo;}

}
