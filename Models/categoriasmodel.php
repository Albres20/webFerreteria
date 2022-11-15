<?php
    class CategoriasModel extends Model implements IModel{
        private $cat_id;
        private $cat_nombre;
        private $cat_color;
        private $prd_cantidad;
    
        public function __construct(){
            parent::__construct();
        }
    
        public function save(){
            try{
                $query = $this->prepare('INSERT INTO categoria (cat_nombre, cat_color) VALUES(:cat_nombre, :cat_color)');
                $query->execute([
                    'cat_nombre' => $this->cat_nombre, 
                    'cat_color' => $this->cat_color
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
                $query = $this->query('SELECT categoria.cat_id, categoria.cat_nombre, categoria.cat_color, count(productos.cat_id) 
                as  prd_cantidad
                FROM categoria
                LEFT JOIN productos 
                on categoria.cat_id = productos.cat_id
                GROUP BY categoria.cat_id');
    
                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new CategoriasModel();
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
                $query = $this->prepare('SELECT * FROM categoria WHERE cat_id = :cat_id');
                $query->execute([ 'cat_id' => $id]);
                $category = $query->fetch(PDO::FETCH_ASSOC);
    
                $this->cat_id = $category['cat_id'];
                $this->cat_nombre = $category['cat_nombre'];
                $this->cat_color = $category['cat_color'];
    
                return $this;
            }catch(PDOException $e){
                return false;
            }
        }
        public function delete($cat_id){
            try{
                $query = $this->prepare('DELETE FROM categoria WHERE cat_id = :cat_id');
                $query->execute([ 'cat_id' => $cat_id]);
                return true;
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }
        public function update(){
            try{
                $query = $this->prepare('UPDATE categoria SET cat_nombre = :cat_nombre, cat_color = :cat_color WHERE cat_id = :cat_id');
                $query->execute([
                    'cat_id' => $this->cat_id,
                    'cat_nombre' => $this->cat_nombre, 
                    'cat_color' => $this->cat_color
                    ]);
                return true;
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }
    
        public function exists($cat_nombre){
            try{
                $query = $this->prepare('SELECT cat_nombre FROM categoria WHERE cat_nombre = :cat_nombre');
                $query->execute( ['cat_nombre' => $cat_nombre]);
                
                if($query->rowCount() > 0){
                    error_log('CategoriaModel::exists() => true');
                    return true;
                }else{
                    error_log('CategoriaModel::exists() => false');
                    return false;
                }
            }catch(PDOException $e){
                error_log($e);
                return false;
            }
        }

        public function existsID($id){
            try{
                $query = $this->prepare('SELECT cat_id FROM categoria WHERE cat_id = :cat_id');
                $query->execute( ['cat_id' => $id]);
                
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
            $this->cat_id = $array['cat_id'];
            $this->cat_nombre = $array['cat_nombre'];
            $this->cat_color = $array['cat_color'];
            $this->prd_cantidad = $array['prd_cantidad'];
        }
    
        
    
        public function setcat_id($cat_id){$this->cat_id = $cat_id;}
        public function setcat_nombre($cat_nombre){$this->cat_nombre = $cat_nombre;}
        public function setcat_color($cat_color){$this->cat_color = $cat_color;}
    
        public function getcat_id(){return $this->cat_id;}
        public function getcat_nombre(){ return $this->cat_nombre;}
        public function getcat_color(){ return $this->cat_color;}
        public function getprd_cantidad(){ return $this->prd_cantidad;}
    }
?>