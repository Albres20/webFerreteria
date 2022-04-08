<?php
    class JoinProductosCategoriasModel extends Model{
        
        private $productos_id;
        private $productos_codigo;
        private $productos_nombre;
        private $productos_marca;
        private $productos_preccompra;
        private $productos_ganancia;
        private $productos_precventa;
        private $productos_cantidad;
        private $productos_imagen;
        //private $productos_fecha;
        private $productos_idcategoria;

        private $categorias_nombre;
        private $categorias_color;

        public function __construct()
        {
            parent::__construct();
        }

        public function getAll(){
            $items = [];
            try{
                $query = $this->query('SELECT productos.productos_id as productos_id, productos_codigo, productos_nombre, productos_marca, productos_preccompra, productos_ganancia, productos_precventa, productos_cantidad, productos_imagen, productos_idcategorias
                 ,categorias.categorias_id, categorias_nombre, categorias_color  
                 FROM productos INNER JOIN categorias WHERE productos.productos_idcategorias = categorias.categorias_id');
    
    
                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new JoinProductosCategoriasModel();
                    $item->from($p);
                    array_push($items, $item);
                }
    
                return $items;
    
            }catch(PDOException $e){
                echo $e;
            }
        }

        public function from($array){
            $this->productos_id = $array['productos_id'];
            $this->productos_codigo = $array['productos_codigo'];
            $this->productos_nombre = $array['productos_nombre'];
            $this->productos_marca = $array['productos_marca'];
            $this->productos_preccompra = $array['productos_preccompra'];
            $this->productos_ganancia = $array['productos_ganancia'];
            $this->productos_precventa = $array['productos_precventa'];
            $this->productos_cantidad = $array['productos_cantidad'];
            $this->productos_imagen = $array['productos_imagen'];
            //$this->productos_fecha = $array['productos_fecha'];
            $this->productos_idcategoria = $array['productos_idcategorias'];
            $this->categorias_nombre = $array['categorias_nombre'];
            $this->categorias_color = $array['categorias_color'];
        }

        public function toArray(){
            $array = [];
            $array['productos_id'] = $this->productos_id;
            $array['productos_codigo'] = $this->productos_codigo;
            $array['productos_nombre'] = $this->productos_nombre;
            $array['productos_marca'] = $this->productos_marca;
            $array['productos_preccompra'] = $this->productos_preccompra;
            $array['productos_ganancia'] = $this->productos_ganancia;
            $array['productos_precventa'] = $this->productos_precventa;
            $array['productos_cantidad'] = $this->productos_cantidad;
            $array['productos_imagen'] = $this->productos_imagen;
            //$array['productos_fecha'] = $this->productos_fecha;
            $array['productos_idcategorias'] = $this->productos_idcategoria;
            $array['categorias_nombre'] = $this->categorias_nombre;
            $array['categorias_color'] = $this->categorias_color;
            
            return $array;
        }

        public function getproductos_id(){return $this->productos_id;}
        public function getproductos_codigo(){return $this->productos_codigo;}
        public function getproductos_nombre(){return $this->productos_nombre;}
        public function getproductos_marca(){return $this->productos_marca;}
        public function getproductos_preccompra(){return $this->productos_preccompra;}
        public function getproductos_ganancia(){return $this->productos_ganancia;}
        public function getproductos_precventa(){return $this->productos_precventa;}
        public function getproductos_cantidad(){return $this->productos_cantidad;}
        public function getproductos_imagen(){return $this->productos_imagen;}
        //public function getproductos_fecha(){return $this->productos_fecha;}
        public function getproductos_idcategoria(){return $this->productos_idcategoria;}
        public function getcategorias_nombre(){return $this->categorias_nombre;}
        public function getcategorias_color(){return $this->categorias_color;}
        
    }
?>