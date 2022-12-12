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
            //$this->beginTransaction();
            try {
                $query = $this->prepare('INSERT INTO productos (prd_codigo, prd_nombre, prd_estado, prd_fec_creacion, prd_imagen, cat_id)
                    VALUES (:prd_codigo, :prd_nombre, :prd_estado, :prd_fec_creacion, :prd_imagen, :cat_id)');
                $query->execute([
                    'prd_codigo' => $this->prd_codigo,
                    'prd_nombre' => $this->prd_nombre,
                    'prd_estado' => $this->prd_estado,
                    'prd_fec_creacion' => $this->prd_fec_creacion,
                    'prd_imagen' => $this->prd_imagen,
                    'cat_id' => $this->cat_id
                ]);
                //$dProduct = $this->lastInsertId();
                $query1 = $this->prepare('INSERT INTO producto_det (dpr_prec_compra, dpr_prec_prod, dpr_stock, dpr_marca, prd_codigo)
                VALUES (:dpr_prec_compra, :dpr_prec_prod, :dpr_stock, :dpr_marca, :prd_codigo)');
                $query1->execute([
                    'dpr_prec_compra' => $this->dpr_prec_compra,
                    'dpr_prec_prod' => $this->dpr_prec_prod,
                    'dpr_stock' => $this->dpr_stock,
                    'dpr_marca' => $this->dpr_marca,
                    'prd_codigo' => $this->prd_codigo
               ]);
                //$this->commit();
                return true;
            } catch (PDOException $e) {
                //$this->rollback();
                error_log('MODELS::PRODUCTOSMODEL::SAVE::PDOException ' . $e->getMessage());
                return false;
            }
        }

        public function getAll(){
            $items = [];

            try{
                $query = $this->query('SELECT productos.prd_codigo, productos.prd_nombre, productos.prd_imagen, producto_det.dpr_marca, 
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
                $query = $this->prepare('SELECT productos.prd_codigo, productos.prd_nombre, productos.prd_imagen, producto_det.dpr_marca,  
                producto_det.dpr_prec_compra, producto_det.dpr_prec_prod, 
                producto_det.dpr_stock, productos.cat_id, producto_det.dpr_fec_ult_modificacion
                FROM productos
                LEFT JOIN producto_det 
                on productos.prd_codigo = producto_det.prd_codigo
                WHERE productos.prd_codigo = :prd_codigo');
                $query->execute([ 'prd_codigo' => $id]);
                $producto = $query->fetch(PDO::FETCH_ASSOC);

                $this->prd_codigo = $producto['prd_codigo'];
                $this->prd_nombre = $producto['prd_nombre'];
                $this->prd_imagen = $producto['prd_imagen'];
                $this->dpr_marca = $producto['dpr_marca'];
                $this->dpr_prec_compra = $producto['dpr_prec_compra'];
                $this->dpr_prec_prod = $producto['dpr_prec_prod'];
                $this->dpr_stock = $producto['dpr_stock'];
                $this->cat_id = $producto['cat_id'];
                $this->dpr_fec_ult_modificacion = $producto['dpr_fec_ult_modificacion'];

                return $this;
            }catch(PDOException $e){
                error_log('MODELS::PRODUCTOSMODEL::GET::PDOException ' . $e->getMessage());
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
        //ventas
        public function getProductosBySearch($search){

            try{
                $query = $this->query('SELECT productos.prd_codigo, productos.prd_nombre, producto_det.dpr_stock, producto_det.dpr_prec_prod 
                FROM productos
                LEFT JOIN producto_det 
                on productos.prd_codigo = producto_det.prd_codigo 
                WHERE productos.prd_nombre LIKE "%'.$search.'%"
                OR productos.prd_codigo LIKE "%'.$search.'%"
                ORDER BY productos.prd_nombre LIMIT 0,6');
                //$query->execute([ 'buscar' => $search]);
    
                if($query->rowCount() > 0){
                    while($row = $query->fetch(PDO::FETCH_ASSOC)){
                        $data[] = $row['prd_nombre'];
                        $data[] = $row['prd_codigo'];
                    }
                    return $data;
                }
    
            }catch(PDOException $e){
                echo $e;
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
                        $data['imagen'] = $row['prd_imagen'];
                        $data['marca'] = $row['dpr_marca'];
                        $data['precio_compra'] = $row['dpr_prec_compra'];
                        $data['precio_producto'] = $row['dpr_prec_prod'];
                        $data['stock'] = $row['dpr_stock'];
                    }
                    return $data;
                }
    
            }catch(PDOException $e){
                echo $e;
            }
        }





        public function update(){}

        public function delete($id){
            try{
                $query1 = $this->prepare('DELETE FROM producto_det WHERE prd_codigo = :prd_codigo');
                $query1->execute([ 'prd_codigo' => $id]);

                $query = $this->prepare('DELETE FROM productos WHERE prd_codigo = :prd_codigo');
                $query->execute([ 'prd_codigo' => $id]);
                return true;
            }catch(PDOException $e){
                error_log('MODELS::PRODUCTOSMODEL::DELETE::PDOException ' . $e->getMessage());
                echo $e;
                return false;
            }
        }

        public function update1($codigoAnterior){
            try{
                $query = $this->prepare('UPDATE producto_det
                JOIN productos
                on productos.prd_codigo = producto_det.prd_codigo
                SET productos.prd_codigo = :codigoNuevo, productos.prd_nombre = :prd_nombre, productos.prd_imagen = :prd_imagen, 
                productos.cat_id = :cat_id, producto_det.dpr_prec_compra = :dpr_prec_compra, producto_det.dpr_prec_prod = :dpr_prec_prod, 
                producto_det.dpr_stock = :dpr_stock, producto_det.dpr_marca = :dpr_marca,
                producto_det.dpr_fec_ult_modificacion = :dpr_fec_ult_modificacion
                WHERE productos.prd_codigo = :codigoAnterior');
                $query->execute([
                    'codigoNuevo' => $this->prd_codigo,
                    'prd_nombre' => $this->prd_nombre,
                    'prd_imagen' => $this->prd_imagen,
                    'cat_id' => $this->cat_id,
                    'dpr_prec_compra' => $this->dpr_prec_compra,
                    'dpr_prec_prod' => $this->dpr_prec_prod,
                    'dpr_stock' => $this->dpr_stock,
                    'dpr_marca' => $this->dpr_marca,
                    'dpr_fec_ult_modificacion' => $this->dpr_fec_ult_modificacion,
                    'codigoAnterior' => $codigoAnterior
                ]);
                //$this->commit();
                return true;

            }catch(PDOException $e){
                error_log('PRODUCTOSMODEL::update->PDOException ' . $e);
                return false;
            }
        }

        public function exists($prd_codigo){
            try{
                $query = $this->prepare('SELECT prd_codigo FROM productos WHERE prd_codigo = :prd_codigo');
                $query->execute( ['prd_codigo' => $prd_codigo]);
                
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
            $this->prd_imagen = $array['prd_imagen'];
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
