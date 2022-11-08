<?php

class ClienteProveedorModel extends Model implements IModel{

    private $cp_id;
    private $cp_tipodocum;
    private $cp_numdocum;
    private $cp_nombrelegal;
    private $cp_direccion;
    private $cp_tipo;
    private $cp_telefono;
    private $cp_correo;
    private $cp_datosadicionales;
    //private $fecha;

    public function __construct(){
        parent::__construct();

        $this->cp_telefono = "000-0000";
        $this->cp_datosadicionales = "Ninguno";
        //$this->agregado = '';
    }

    /*****************************************************************************       */

    public function save(){
        try{
            $query = $this->prepare('INSERT INTO clienteproveedor (cp_tipodocum, cp_numdocum, cp_nombrelegal, cp_direccion, cp_tipo, cp_telefono, cp_correo, cp_datosadicionales) 
            VALUES (:cp_tipodocum, :cp_numdocum, :cp_nombrelegal, :cp_direccion, :cp_tipo, :cp_telefono, :cp_correo, :cp_datosadicionales)');
            $query->execute([
                'cp_tipodocum' => $this->cp_tipodocum,
                'cp_numdocum' => $this->cp_numdocum,
                'cp_nombrelegal' => $this->cp_nombrelegal,
                'cp_direccion' => $this->cp_direccion,
                'cp_tipo' => $this->cp_tipo,
                'cp_telefono' => $this->cp_telefono,
                'cp_correo' => $this->cp_correo,
                'cp_datosadicionales' => $this->cp_datosadicionales
                ]);
            return true;
            }catch(PDOException $e){
                return false;
        }
    } 

    public function getAll(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM clienteproveedor');

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
            $query = $this->prepare('SELECT * FROM clienteproveedor WHERE id = :id');
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
            $query = $this->prepare('DELETE FROM clienteproveedor WHERE cp_id = :cp_id');
            $query->execute([ 'cp_id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE usuarios SET username = :username, password = :password, fullname = :fullname, email = :email, role = :role, photo = :photo, estado = :estado WHERE id = :id');
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

    public function existsNUM($cp_numdocum){
        try{
            $query = $this->prepare('SELECT cp_numdocum FROM clienteproveedor WHERE cp_numdocum = :cp_numdocum');
            $query->execute( ['cp_numdocum' => $cp_numdocum]);
            
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

    public function existsNOM($cp_nombrelegal){
        try{
            $query = $this->prepare('SELECT cp_nombrelegal FROM clienteproveedor WHERE cp_nombrelegal = :cp_nombrelegal');
            $query->execute( ['cp_nombrelegal' => $cp_nombrelegal]);
            
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
            $query = $this->prepare('SELECT cp_id FROM clienteproveedor WHERE cp_id = :cp_id');
            $query->execute( ['cp_id' => $id]);
            
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
        $this->cp_id = $array['cp_id'];
        $this->cp_tipodocum = $array['cp_tipodocum'];
        $this->cp_numdocum = $array['cp_numdocum'];
        $this->cp_nombrelegal = $array['cp_nombrelegal'];
        $this->cp_direccion = $array['cp_direccion'];
        $this->cp_tipo = $array['cp_tipo'];
        $this->cp_telefono = $array['cp_telefono'];
        $this->cp_correo = $array['cp_correo'];
        $this->cp_datosadicionales = $array['cp_datosadicionales'];
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

    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    /****************************************************************    */

    public function setcp_id($cp_id){             $this->cp_id = $cp_id;}
    public function setcp_tipodocum($cp_tipodocum){ $this->cp_tipodocum = $cp_tipodocum;}
    public function setcp_numdocum($cp_numdocum){ $this->cp_numdocum = $cp_numdocum;}
    public function setcp_nombrelegal($cp_nombrelegal){ $this->cp_nombrelegal = $cp_nombrelegal;}
    public function setcp_direccion($cp_direccion){ $this->cp_direccion = $cp_direccion;}
    public function setcp_tipo($cp_tipo){ $this->cp_tipo = $cp_tipo;}
    public function setcp_telefono($cp_telefono){ $this->cp_telefono = $cp_telefono;}
    public function setcp_correo($cp_correo){ $this->cp_correo = $cp_correo;}
    public function setcp_datosadicionales($cp_datosadicionales){ $this->cp_datosadicionales = $cp_datosadicionales;}

    public function getcp_id(){ return $this->cp_id;}
    public function getcp_tipodocum(){ return $this->cp_tipodocum;}
    public function getcp_numdocum(){ return $this->cp_numdocum;}
    public function getcp_nombrelegal(){ return $this->cp_nombrelegal;}
    public function getcp_direccion(){ return $this->cp_direccion;}
    public function getcp_tipo(){ return $this->cp_tipo;}
    public function getcp_telefono(){ return $this->cp_telefono;}
    public function getcp_correo(){ return $this->cp_correo;}
    public function getcp_datosadicionales(){ return $this->cp_datosadicionales;}
}
?>