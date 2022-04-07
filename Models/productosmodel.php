<?php

    class Productosmodel extends Model implements IModel{
        
        private $id;
        private $codigo;
        private $nombre;
        private $precio_compra;
        private $precio_venta;
        private $stock;
        private $imagen;
        //private $fecha;
        private $idcategoria;

        public function setId($id){ $this->id = $id; }
        public function setCodigo($codigo){ $this->codigo = $codigo; }
        public function setNombre($nombre){ $this->nombre = $nombre; }
        public function setPrecioCompra($precio_compra){ $this->precio_compra = $precio_compra; }
        public function setPrecioVenta($precio_venta){ $this->precio_venta = $precio_venta; }
        public function setStock($stock){ $this->stock = $stock; }
        public function setImagen($imagen){ $this->imagen = $imagen; }
        //public function setFecha($fecha){ $this->fecha = $fecha; }
        public function setIdCategoria($idcategoria){ $this->idcategoria = $idcategoria; }

        public function getId(){ return $this->id; }
        public function getCodigo(){ return $this->codigo; }
        public function getNombre(){ return $this->nombre; }
        public function getPrecioCompra(){ return $this->precio_compra; }
        public function getPrecioVenta(){ return $this->precio_venta; }
        public function getStock(){ return $this->stock; }
        public function getImagen(){ return $this->imagen; }
        //public function getFecha(){ return $this->fecha; }
        public function getIdCategoria(){ return $this->idcategoria; }
        
        public function __construct(){
            parent::__construct();
    
            //$this->agregado = '';
        }

        public function save(){
            try{
                $query = $this->prepare('INSERT INTO productos (codigo, nombre, precio_compra, precio_venta, stock, imagen, idcategoria) VALUES (:codigo, :nombre, :precio_compra, :precio_venta, :stock, :imagen, :idcategoria)');
                $query->execute([
                    'codigo' => $this->codigo,
                    'nombre' => $this->nombre,
                    'precio_compra' => $this->precio_compra,
                    'precio_venta' => $this->precio_venta,
                    'stock' => $this->stock,
                    'imagen' => $this->imagen,
                    'idcategoria' => $this->idcategoria
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

        public function getAll(){
            $items = [];
            try{
                $query = $this->query('SELECT * FROM productos');
                $query->execute();

                if($query->rowCount() > 0){
                    while($row = $query->fetch(PDO::FETCH_ASSOC)){
                        $item = new Productosmodel();
                        $item->setId($row['id']);
                        $item->setCodigo($row['codigo']);
                        $item->setNombre($row['nombre']);
                        $item->setPrecioCompra($row['precio_compra']);
                        $item->setPrecioVenta($row['precio_venta']);
                        $item->setStock($row['stock']);
                        $item->setImagen($row['imagen']);
                        $item->setIdCategoria($row['idcategoria']);
                        array_push($items, $item);
                    }
                }
                return $items;
            }catch(PDOException $e){
                return NULL;
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

        public function from($array){
            $this->id = $array['id'];
            $this->codigo = $array['codigo'];
            $this->nombre = $array['nombre'];
            $this->precio_compra = $array['precio_compra'];
            $this->precio_venta = $array['precio_venta'];
            $this->stock = $array['stock'];
            $this->imagen = $array['imagen'];
            $this->idcategoria = $array['idcategoria'];
        }
    }
?>