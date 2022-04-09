<?php

    class Productosmodel extends Model implements IModel{
        
        private $id;
        private $codigo;
        private $nombre;
        private $marca;
        private $precio_compra;
        private $precio_venta;
        private $ganancia;
        private $stock;
        private $imagen;
        //private $fecha;
        private $idcategoria;

        public function setId($id){ $this->id = $id; }
        public function setCodigo($codigo){ $this->codigo = $codigo; }
        public function setNombre($nombre){ $this->nombre = $nombre; }
        public function setMarca($marca){ $this->marca = $marca; }
        public function setPrecioCompra($precio_compra){ $this->precio_compra = $precio_compra; }
        public function setPrecioVenta($precio_venta){ $this->precio_venta = $precio_venta; }
        public function setGanancia($ganancia){ $this->ganancia = $ganancia; }
        public function setStock($stock){ $this->stock = $stock; }
        public function setImagen($imagen){ $this->imagen = $imagen; }
        //public function setFecha($fecha){ $this->fecha = $fecha; }
        public function setIdCategoria($idcategoria){ $this->idcategoria = $idcategoria; }

        public function getId(){ return $this->id; }
        public function getCodigo(){ return $this->codigo; }
        public function getNombre(){ return $this->nombre; }
        public function getMarca(){ return $this->marca; }
        public function getPrecioCompra(){ return $this->precio_compra; }
        public function getPrecioVenta(){ return $this->precio_venta; }
        public function getGanancia(){ return $this->ganancia; }
        public function getStock(){ return $this->stock; }
        public function getImagen(){ return $this->imagen; }
        //public function getFecha(){ return $this->fecha; }
        public function getIdCategoria(){ return $this->idcategoria; }
        
        public function __construct(){
            parent::__construct();
            
            //$this->codigo = '';
            //$this->nombre = '';
            //$this->marca = '';

            //$this->agregado = '';
        }

        public function save(){
            try{
                $query = $this->prepare('INSERT INTO productos (productos_codigo, productos_nombre, productos_marca, 
                productos_preccompra, productos_ganancia, productos_precventa, productos_cantidad, productos_imagen, productos_idcategorias) 
                VALUES (:productos_codigo, :productos_nombre, :productos_marca, :productos_preccompra, :productos_ganancia, 
                :productos_precventa, :productos_cantidad, :productos_imagen, :productos_idcategorias)');
                $query->execute([
                    'productos_codigo' => $this->codigo,
                    'productos_nombre' => $this->nombre,
                    'productos_marca' => $this->marca,
                    'productos_preccompra' => $this->precio_compra,
                    'productos_ganancia' => $this->ganancia,
                    'productos_precventa' => $this->precio_venta,
                    'productos_cantidad' => $this->stock,
                    'productos_imagen' => $this->imagen,
                    'productos_idcategorias' => $this->idcategoria

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
                $query = $this->query('SELECT * FROM productos');
    
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
                $query = $this->prepare('SELECT * FROM productos WHERE id = :id');
                $query->execute([ 'id' => $id]);
                $producto = $query->fetch(PDO::FETCH_ASSOC);

                $this->id = $producto['id'];
                $this->codigo = $producto['codigo'];
                $this->nombre = $producto['nombre'];
                $this->precio_compra = $producto['precio_compra'];
                $this->precio_venta = $producto['precio_venta'];
                $this->stock = $producto['stock'];
                $this->imagen = $producto['imagen'];
                $this->idcategoria = $producto['idcategoria'];

                return $this;
            }catch(PDOException $e){
                return false;
            }
        }

        function updatePhoto($hash, $productos_id){
            try{
                $query = $this->db->connect()->prepare('UPDATE productos SET productos_imagen = :val WHERE productos_id = :productos_id');
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

        public function delete($id){
            try{
                $query = $this->prepare('DELETE FROM productos WHERE id = :id');
                $query->execute([ 'id' => $id]);
                return true;
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }

        public function update(){
            try{
                $query = $this->prepare('UPDATE productos SET codigo = :codigo, nombre = :nombre, precio_compra = :precio_compra, precio_venta = :precio_venta, stock = :stock, imagen = :imagen, idcategoria = :idcategoria WHERE id = :id');
                $query->execute([
                    'codigo' => $this->codigo,
                    'nombre' => $this->nombre,
                    'precio_compra' => $this->precio_compra,
                    'precio_venta' => $this->precio_venta,
                    'stock' => $this->stock,
                    'imagen' => $this->imagen,
                    'idcategoria' => $this->idcategoria,
                    'id' => $this->id
                ]);

                if($query->rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return NULL;
            }
        }

        public function exists($codigo){
            try{
                $query = $this->prepare('SELECT productos_codigo FROM productos WHERE productos_codigo = :productos_codigo');
                $query->execute( ['productos_codigo' => $codigo]);
                
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
            $this->id = $array['productos_id'];
            $this->codigo = $array['productos_codigo'];
            $this->nombre = $array['productos_nombre'];
            $this->marca = $array['productos_marca'];
            $this->precio_compra = $array['productos_preccompra'];
            $this->precio_venta = $array['productos_precventa'];
            $this->stock = $array['productos_cantidad'];
            $this->imagen = $array['productos_imagen'];
            $this->idcategoria = $array['productos_idcategorias'];

        }
    }
?>