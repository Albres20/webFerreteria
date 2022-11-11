<?php

class UserModel extends Model implements IModel{

    private $usr_codigo;
    private $usr_nombre;
    private $usr_password;
    private $usr_fullname;
    private $usr_email;
    private $usr_photo;
    private $usr_estado;
    private $rol_id;
    private $ultima_sesion;
    private $usr_agregado;

    public function __construct(){
        parent::__construct();

        $this->usr_nombre = '';
        $this->usr_password = '';
        $this->usr_fullname = '';
        $this->usr_email = '';
        $this->rol_id = 3;
        $this->usr_photo = '';
        //$this->usr_agregado = '';
    }

    function updateRole($role, $iduser){
        try{
            $query = $this->db->connect()->prepare("UPDATE usuarios SET role = :val WHERE id = :id");
            $query->execute(['val' => $role, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            return NULL;
        }
    }
    
    function updateEmail($email, $iduser){
        try{
            $query = $this->db->connect()->prepare('UPDATE usuarios SET email = :val WHERE id = :id');
            $query->execute(['val' => $email, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updateFullname($name, $iduser){
        try{
            $query = $this->db->connect()->prepare('UPDATE usuarios SET name = :val WHERE id = :id');
            $query->execute(['val' => $name, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updatePhoto($name, $iduser){
        try{
            $query = $this->db->connect()->prepare('UPDATE usuarios SET photo = :val WHERE id = :id');
            $query->execute(['val' => $name, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updatePassword($new, $iduser){
        try{
            $hash = password_hash($new, PASSWORD_DEFAULT, ['cost' => 10]);
            $query = $this->db->connect()->prepare('UPDATE usuarios SET password = :val WHERE id = :id');
            $query->execute(['val' => $hash, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function comparePasswords($current, $userid){
        try{
            $query = $this->db->connect()->prepare('SELECT id, password FROM usuarios WHERE id = :id');
            $query->execute(['id' => $userid]);
            
            if($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['password']);

            return NULL;
        }catch(PDOException $e){
            return NULL;
        }
    }

    /*****************************************************************************       */

    public function save(){
        try{
            $query = $this->prepare('INSERT INTO usuarios (username, password, fullname, email, role, photo, estado) VALUES(:username, :password, :fullname, :email, :role, :photo, :estado)');
            $query->execute([
                'username'  => $this->username, 
                'password'  => $this->password,
                'fullname'  => $this->fullname,
                'email'     => $this->email,
                'role'      => $this->role,
                'photo'     => $this->photo,
                'estado'    => $this->estado
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    } 

    public function getAll(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM usuario');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setusr_codigo($p['usr_codigo']);
                $item->setusr_nombre($p['usr_nombre']);
                $item->setusr_password($p['usr_password'], false);
                $item->setusr_fullname($p['usr_fullname']);
                $item->setusr_email($p['usr_email']);
                $item->setrol_id($p['rol_id']);
                $item->setusr_photo($p['usr_photo']);
                $item->setusr_estado($p['usr_estado']);
                $item->setusr_ultima_sesion($p['usr_ultima_sesion']);
                $item->setusr_agregado($p['usr_agregado']);
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
            $query = $this->prepare('SELECT * FROM usuario WHERE usr_codigo = :usr_codigo');
            $query->execute([ 'usr_codigo' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->usr_codigo = $user['usr_codigo'];
            $this->usr_nombre = $user['usr_nombre'];
            $this->usr_password = $user['usr_password'];
            $this->usr_fullname = $user['usr_fullname'];
            $this->usr_email = $user['usr_email'];
            $this->rol_id = $user['rol_id'];
            $this->usr_photo = $user['usr_photo'];
            $this->usr_ultima_sesion = $user['usr_ultima_sesion'];
            $this->usr_agregado = $user['usr_agregado'];

            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM usuarios WHERE id = :id');
            $query->execute([ 'id' => $id]);
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

    public function exists($username){
        try{
            $query = $this->prepare('SELECT username FROM usuarios WHERE username = :username');
            $query->execute( ['username' => $username]);
            
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
            $query = $this->prepare('SELECT id FROM usuarios WHERE id = :id');
            $query->execute( ['id' => $id]);
            
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

    public function actualizarfecha_login(){
        
        date_default_timezone_set('America/Bogota');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha.' '.$hora;
        
        try{
            $query = $this->prepare('UPDATE usuario SET usr_ultima_sesion = :val WHERE usr_codigo = :id');
            $query->execute(['val' => $fechaActual, 'id' => $this->usr_codigo]);

            if($query->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    public function from($array){
        $this->usr_codigo = $array['usr_codigo'];
        $this->usr_nombre = $array['usr_nombre'];
        $this->usr_password = $array['usr_password'];
        $this->usr_fullname = $array['usr_fullname'];
        $this->usr_email = $array['usr_email'];
        $this->usr_photo = $array['usr_photo'];
        $this->usr_estado = $array['usr_estado']; //verifica el estado agarrando consulta el db
        $this->rol_id = $array['rol_id'];
        $this->usr_agregado = $array['usr_agregado'];
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

    public function setusr_codigo($id){             $this->usr_codigo = $id;}
    public function setusr_nombre($username){ $this->usr_nombre = $username;}
    //FIXME: validar si se requiere el parametro de hash
    public function setusr_password($password, $hash = true){ 
        if($hash){
            $this->usr_password = $this->getHashedPassword($password);
        }else{
            $this->usr_password = $password;
        }
    }
    public function setusr_fullname($fullname){ $this->usr_fullname = $fullname;}
    public function setusr_email($email){       $this->usr_email = $email;}
    public function setrol_id($role){         $this->rol_id = $role;}
    public function setusr_photo($photo){       $this->usr_photo = $photo;}
    public function setusr_estado($estado){     $this->usr_estado = $estado;}
    public function setusr_ultima_sesion($ultimo_login){ $this->usr_ultima_sesion = $ultimo_login;}
    public function setusr_agregado($agregado){ $this->usr_agregado = $agregado;}

    public function getusr_codigo(){          return $this->usr_codigo;}
    public function getusr_nombre(){          return $this->usr_nombre;}
    public function getusr_password(){        return $this->usr_password;}
    public function getusr_fullname(){        return $this->usr_fullname;}
    public function getusr_email(){           return $this->usr_email;}
    public function getrol_id(){              return $this->rol_id;}
    public function getusr_photo(){           return $this->usr_photo;}
    public function getusr_estado(){          return $this->usr_estado;}
    public function getusr_ultima_sesion(){   return $this->usr_ultima_sesion;}
    public function getusr_agregado(){        return $this->usr_agregado;}
}

?>