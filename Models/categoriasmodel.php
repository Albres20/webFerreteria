<?php
    class CategoriasModel extends Model implements IModel{
        private $categorias_id;
        private $categorias_nombre;
        private $categorias_color;
    
        public function __construct(){
            parent::__construct();
        }
    
        public function save(){
            try{
                $query = $this->prepare('INSERT INTO categorias (categorias_nombre, categorias_color) VALUES(:categorias_nombre, :categorias_color)');
                $query->execute([
                    'categorias_nombre' => $this->categorias_nombre, 
                    'categorias_color' => $this->categorias_color
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
                $query = $this->query('SELECT * FROM categorias');
    
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
        
        public function get($categorias_id){
            try{
                $query = $this->prepare('SELECT * FROM categorias WHERE categorias_id = :categorias_id');
                $query->execute([ 'categorias_id' => $categorias_id]);
                $category = $query->fetch(PDO::FETCH_ASSOC);
    
                $this->from($category);
    
                return $this;
            }catch(PDOException $e){
                return false;
            }
        }
        public function delete($categorias_id){
            try{
                $query = $this->db->connect()->prepare('DELETE FROM categorias WHERE categorias_id = :categorias_id');
                $query->execute([ 'categorias_id' => $categorias_id]);
                return true;
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }
        public function update(){
            try{
                $query = $this->db->connect()->prepare('UPDATE categorias SET categorias_nombre = :categorias_nombre, categorias_color = :categorias_color WHERE categorias_id = :categorias_id');
                $query->execute([
                    'categorias_nombre' => $this->categorias_nombre, 
                    'categorias_color' => $this->categorias_color
                ]);
                return true;
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }
    
        public function exists($categorias_nombre){
            try{
                $query = $this->prepare('SELECT categorias_nombre FROM categorias WHERE categorias_nombre = :categorias_nombre');
                $query->execute( ['categorias_nombre' => $categorias_nombre]);
                
                if($query->rowCount() > 0){
                    error_log('CategoriasModel::exists() => true');
                    return true;
                }else{
                    error_log('CategoriasModel::exists() => false');
                    return false;
                }
            }catch(PDOException $e){
                error_log($e);
                return false;
            }
        }
    
        public function from($array){
            $this->categorias_id = $array['categorias_id'];
            $this->categorias_nombre = $array['categorias_nombre'];
            $this->categorias_color = $array['categorias_color'];
        }
    
        
    
        public function setcategorias_id($categorias_id){$this->categorias_id = $categorias_id;}
        public function setcategorias_nombre($categorias_nombre){$this->categorias_nombre = $categorias_nombre;}
        public function setcategorias_color($categorias_color){$this->categorias_color = $categorias_color;}
    
        public function getcategorias_id(){return $this->categorias_id;}
        public function getcategorias_nombre(){ return $this->categorias_nombre;}
        public function getcategorias_color(){ return $this->categorias_color;}
    }
?>