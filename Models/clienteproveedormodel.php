<?php

class ClienteProveedorModel extends Model implements IModel{

    private $cpr_id;
    private $cpr_tipodocum;//
    private $cpr_numdoc;
    private $cpr_nombre;//
    private $cpr_direccion;
    private $cpr_tipo;//
    private $cpr_telefono;
    private $cpr_correo;
    private $cpr_datosadicionales;//
    private $cpr_fechacreacion;

    public function __construct(){
        parent::__construct();
        //$this->agregado = '';
    }

    /*****************************************************************************       */

    public function save(){
        try{
            $query = $this->prepare('INSERT INTO clientes (cpr_tipodocum, cpr_numdoc, cpr_nombre, cpr_direccion, cpr_tipo, cpr_telefono, cpr_correo, cpr_datosadicionales) 
            VALUES (:cpr_tipodocum, :cpr_numdoc, :cpr_nombre, :cpr_direccion, :cpr_tipo, :cpr_telefono, :cpr_correo, :cpr_datosadicionales)');
            $query->execute([
                'cpr_tipodocum' => $this->cpr_tipodocum,
                'cpr_numdoc' => $this->cpr_numdoc,
                'cpr_nombre' => $this->cpr_nombre,
                'cpr_direccion' => $this->cpr_direccion,
                'cpr_tipo' => $this->cpr_tipo,
                'cpr_telefono' => $this->cpr_telefono,
                'cpr_correo' => $this->cpr_correo,
                'cpr_datosadicionales' => $this->cpr_datosadicionales
                ]);
            return true;
            }catch(PDOException $e){
                return false;
        }
    } 

    public function getAll(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM clientes');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ClienteProveedorModel();
                $item->from($p); 
                
                array_push($items, $item);
            }

            return $items;

        }catch(PDOException $e){
            echo $e;
        }
    }

    /**
     *  Gets an item
     */
    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM clientes WHERE id = :id');
            $query->execute([ 'id' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->password = $user['password'];
            $this->fullname = $user['fullname'];
            $this->email = $user['email'];
            $this->role = $user['role'];
            $this->photo = $user['photo'];
            $this->estado = $user['estado'];

            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM clientes WHERE cpr_id = :cpr_id');
            $query->execute([ 'cpr_id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE clientes SET username = :username, password = :password, fullname = :fullname, email = :email, role = :role, photo = :photo, estado = :estado WHERE id = :id');
            $query->execute([
                'id'        => $this->id,
                'username' => $this->username, 
                'password' => $this->password,
                'fullname' => $this->fullname,
                'email'    => $this->email,
                'role'     => $this->role,
                'photo' => $this->photo,
                'estado' => $this->estado

                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function existsNUM($cpr_numdoc){
        try{
            $query = $this->prepare('SELECT cpr_numdoc FROM clientes WHERE cpr_numdoc = :cpr_numdoc');
            $query->execute( ['cpr_numdoc' => $cpr_numdoc]);
            
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

    public function existsNOM($cpr_nombre){
        try{
            $query = $this->prepare('SELECT cpr_nombre FROM clientes WHERE cpr_nombre = :cpr_nombre');
            $query->execute( ['cpr_nombre' => $cpr_nombre]);
            
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
            $query = $this->prepare('SELECT cpr_id FROM clientes WHERE cpr_id = :cpr_id');
            $query->execute( ['cpr_id' => $id]);
            
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
        $this->cpr_id = $array['cpr_id'];
        $this->cpr_tipodocum = $array['cpr_tipodocum'];
        $this->cpr_numdoc = $array['cpr_numdoc'];
        $this->cpr_nombre = $array['cpr_nombre'];
        $this->cpr_direccion = $array['cpr_direccion'];
        $this->cpr_tipo = $array['cpr_tipo'];
        $this->cpr_telefono = $array['cpr_telefono'];
        $this->cpr_correo = $array['cpr_correo'];
        $this->cpr_datosadicionales = $array['cpr_datosadicionales'];
    }

    public function toArray(){
        $array = [];
        $array['id'] = $this->id;
        $array['username'] = $this->username;
        $array['password'] = $this->password;
        $array['fullname'] = $this->fullname;
        $array['email'] = $this->email;
        $array['role'] = $this->role;
        $array['photo'] = $this->photo;
        $array['estado'] = $this->estado;
        
        return $array;
    }

    /****************************************************************    */

    public function setcpr_id($cpr_id){             $this->cpr_id = $cpr_id;}
    public function setcpr_tipodocum($cpr_tipodocum){ $this->cpr_tipodocum = $cpr_tipodocum;}
    public function setcpr_numdoc($cpr_numdoc){ $this->cpr_numdoc = $cpr_numdoc;}
    public function setcpr_nombre($cpr_nombre){ $this->cpr_nombre = $cpr_nombre;}
    public function setcpr_direccion($cpr_direccion){ $this->cpr_direccion = $cpr_direccion;}
    public function setcpr_tipo($cpr_tipo){ $this->cpr_tipo = $cpr_tipo;}
    public function setcpr_telefono($cpr_telefono){ $this->cpr_telefono = $cpr_telefono;}
    public function setcpr_correo($cpr_correo){ $this->cpr_correo = $cpr_correo;}
    public function setcpr_datosadicionales($cpr_datosadicionales){ $this->cpr_datosadicionales = $cpr_datosadicionales;}
    public function setcpr_fechacreacion($cpr_fechacreacion){ $this->cpr_fechacreacion = $cpr_fechacreacion;}

    public function getcpr_id(){ return $this->cpr_id;}
    public function getcpr_tipodocum(){ return $this->cpr_tipodocum;}
    public function getcpr_numdoc(){ return $this->cpr_numdoc;}
    public function getcpr_nombre(){ return $this->cpr_nombre;}
    public function getcpr_direccion(){ return $this->cpr_direccion;}
    public function getcpr_tipo(){ return $this->cpr_tipo;}
    public function getcpr_telefono(){ return $this->cpr_telefono;}
    public function getcpr_correo(){ return $this->cpr_correo;}
    public function getcpr_datosadicionales(){ return $this->cpr_datosadicionales;}
    public function getcpr_fechacreacion(){ return $this->cpr_fechacreacion;}
}
?>