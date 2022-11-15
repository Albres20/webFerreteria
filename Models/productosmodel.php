<?php

    class Productosmodel extends Model implements IModel{
        
        private $prd_codigo;
        private $prd_nombre;
        private $prd_estado;
        private $prd_fec_creacion;
        private $prd_imagen;
        private $cat_id;
        ///////////
        private $dpr_idProducto;
        private $dpr_prec_compra;
        private $dpr_prec_prod;
        private $dpr_stock;
        private $dpr_marca;
        private $dpr_fec_ult_modificacion;
        //private $prd_codigo;
        private $cat_color;
        private $cat_nombre;
      
        public function __construct(){
            parent::__construct();
            $this->prd_estado = "A";
        }

        public function save(){
            try{
                $query = $this->prepare('INSERT INTO productos (productos_prd_codigo, productos_prd_nombre, productos_marca, 
                productos_preccompra, productos_ganancia, productos_precventa, productos_cantidad, productos_prd_imagen, productos_cat_ids) 
                VALUES (:productos_prd_codigo, :productos_prd_nombre, :productos_marca, :productos_preccompra, :productos_ganancia, 
                :productos_precventa, :productos_cantidad, :productos_prd_imagen, :productos_cat_ids)');
                $query->execute([
                    'productos_prd_codigo' => $this->prd_codigo,
                    'productos_prd_nombre' => $this->prd_nombre,
                    'productos_marca' => $this->marca,
                    'productos_preccompra' => $this->precio_compra,
                    'productos_ganancia' => $this->ganancia,
                    'productos_precventa' => $this->precio_venta,
                    'productos_cantidad' => $this->stock,
                    'productos_prd_imagen' => $this->prd_imagen,
                    'productos_cat_ids' => $this->cat_id

                ]);
                if($query->rowCount()) return true;

                return false;
            }catch(PDOException $e){
                return false;
            }
        }

        public function getAll(){
            $items = [];

            try{
                $query = $this->query('SELECT productos.prd_codigo, productos.prd_nombre, producto_det.dpr_marca, 
                producto_det.dpr_prec_compra, producto_det.dpr_prec_prod, 
                producto_det.dpr_stock, categoria.cat_color, categoria.cat_nombre
                FROM productos
                LEFT JOIN producto_det 
                on productos.prd_codigo = producto_det.prd_codigo
                INNER JOIN categoria
                on productos.cat_id = categoria.cat_id');
    
                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new Productosmodel();
                    $item->from($p); 
                    
                    array_push($items, $item);
                }
    
                return $items;
    
            }catch(PDOException $e){
                echo $e;
            }
        }

        public function get($id){
            try{
                $query = $this->prepare('SELECT * FROM productos WHERE productos_id = :productos_id');
                $query->execute([ 'productos_id' => $id]);
                $producto = $query->fetch(PDO::FETCH_ASSOC);

                $this->id = $producto['productos_id'];
                $this->prd_codigo = $producto['productos_prd_codigo'];
                $this->prd_nombre = $producto['productos_prd_nombre'];
                $this->marca = $producto['productos_marca'];
                $this->precio_compra = $producto['productos_preccompra'];
                $this->ganancia = $producto['productos_ganancia'];
                $this->precio_venta = $producto['productos_precventa'];
                $this->stock = $producto['productos_cantidad'];
                $this->prd_imagen = $producto['productos_prd_imagen'];
                $this->cat_id = $producto['productos_cat_ids'];

                return $this;
            }catch(PDOException $e){
                return false;
            }
        }

        function updatePhoto($hash, $productos_id){
            try{
                $query = $this->db->connect()->prepare('UPDATE productos SET productos_prd_imagen = :val WHERE productos_id = :productos_id');
                $query->execute(['val' => $hash, 'productos_id' => $productos_id]);
    
                if($query->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            
            }catch(PDOException $e){
                return NULL;
            }
        }

        public function getcontarPorCategoria($productos_cat_ids){
            try{
                $query = $this->prepare('SELECT COUNT(*) FROM productos WHERE productos_cat_ids = :productos_cat_ids');
                $query->execute([ 'productos_cat_ids' => $productos_cat_ids]);
                $producto = $query->fetch(PDO::FETCH_ASSOC);

                return $producto['COUNT(*)'];
            }catch(PDOException $e){
                return false;
            }
        }

        public function getProductosBySearch($search){

            try{
                $query = $this->query('SELECT * FROM productos WHERE productos_prd_nombre LIKE "%'.$search.'%" ORDER BY productos_prd_nombre LIMIT 0,6');
    
                $data = $query->fetchAll(PDO::FETCH_ASSOC);

                return $data;
    
            }catch(PDOException $e){
                echo $e;
            }
        }

        public function delete($id){
            try{
                $query = $this->prepare('DELETE FROM productos WHERE productos_id = :productos_id');
                $query->execute([ 'productos_id' => $id]);
                return true;
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }

        public function update(){
            try{
                $query = $this->prepare('UPDATE productos SET productos_prd_codigo = :productos_prd_codigo, productos_prd_nombre = :productos_prd_nombre, 
                productos_marca = :productos_marca, productos_preccompra = :productos_preccompra, productos_ganancia = :productos_ganancia, 
                productos_precventa = :productos_precventa, productos_cantidad = :productos_cantidad, productos_prd_imagen = :productos_prd_imagen, 
                productos_cat_ids = :productos_cat_ids WHERE productos_id = :productos_id');
                $query->execute([
                    'productos_prd_codigo' => $this->prd_codigo,
                    'productos_prd_nombre' => $this->prd_nombre,
                    'productos_marca' => $this->marca,
                    'productos_preccompra' => $this->precio_compra,
                    'productos_ganancia' => $this->ganancia,
                    'productos_precventa' => $this->precio_venta,
                    'productos_cantidad' => $this->stock,
                    'productos_prd_imagen' => $this->prd_imagen,
                    'productos_cat_ids' => $this->cat_id,
                    'productos_id' => $this->id
                ]);
                return true;

            }catch(PDOException $e){
                error_log('PRODUCTOSMODEL::update->PDOException ' . $e);
                return false;
            }
        }

        public function exists($prd_codigo){
            try{
                $query = $this->prepare('SELECT productos_prd_codigo FROM productos WHERE productos_prd_codigo = :productos_prd_codigo');
                $query->execute( ['productos_prd_codigo' => $prd_codigo]);
                
                if($query->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }

        public function existsID($id){
            try{
                $query = $this->prepare('SELECT productos_id FROM productos WHERE productos_id = :productos_id');
                $query->execute( ['productos_id' => $id]);
                
                if($query->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }

        public function from($array){
            $this->prd_codigo = $array['prd_codigo'];
            $this->prd_nombre = $array['prd_nombre'];
            $this->dpr_marca = $array['dpr_marca'];
            $this->dpr_prec_compra = $array['dpr_prec_compra'];
            $this->dpr_prec_prod = $array['dpr_prec_prod'];
            $this->dpr_stock = $array['dpr_stock'];
            $this->cat_color = $array['cat_color'];
            $this->cat_nombre = $array['cat_nombre'];

        }
        
        //setters de los atributos
        public function setprd_codigo($prd_codigo){ $this->prd_codigo = $prd_codigo; }
        public function setprd_nombre($prd_nombre){ $this->prd_nombre = $prd_nombre; }
        public function setprd_estado($prd_estado){ $this->prd_estado = $prd_estado; }
        public function setprd_fec_creacion($prd_fec_creacion){ $this->prd_fec_creacion = $prd_fec_creacion; }
        public function setprd_imagen($prd_imagen){ $this->prd_imagen = $prd_imagen; }
        public function setcat_id($cat_id){ $this->cat_id = $cat_id; }
        public function setdpr_idProducto($dpr_idProducto){ $this->dpr_idProducto = $dpr_idProducto; }
        public function setdpr_prec_compra($dpr_prec_compra){ $this->dpr_prec_compra = $dpr_prec_compra; }
        public function setdpr_prec_prod($dpr_prec_prod){ $this->dpr_prec_prod = $dpr_prec_prod; }
        public function setdpr_stock($dpr_stock){ $this->dpr_stock = $dpr_stock; }
        public function setdpr_marca($dpr_marca){ $this->dpr_marca = $dpr_marca; }
        public function setdpr_fec_ult_modificacion($dpr_fec_ult_modificacion){ $this->dpr_fec_ult_modificacion = $dpr_fec_ult_modificacion; }
        public function setcat_nombre($cat_nombre){ $this->cat_nombre = $cat_nombre; }
        public function setcat_color($cat_color){ $this->cat_color = $cat_color; }

        //getters de los atributos
        public function getprd_codigo(){ return $this->prd_codigo; }
        public function getprd_nombre(){ return $this->prd_nombre; }
        public function getprd_estado(){ return $this->prd_estado; }
        public function getprd_fec_creacion(){ return $this->prd_fec_creacion; }
        public function getprd_imagen(){ return $this->prd_imagen; }
        public function getcat_id(){ return $this->cat_id; }
        public function getdpr_idProducto(){ return $this->dpr_idProducto; }
        public function getdpr_prec_compra(){ return $this->dpr_prec_compra; }
        public function getdpr_prec_prod(){ return $this->dpr_prec_prod; }
        public function getdpr_stock(){ return $this->dpr_stock; }
        public function getdpr_marca(){ return $this->dpr_marca; }
        public function getdpr_fec_ult_modificacion(){ return $this->dpr_fec_ult_modificacion; }
        public function getcat_color(){ return $this->cat_color; }
        public function getcat_nombre(){ return $this->cat_nombre; }

    }
