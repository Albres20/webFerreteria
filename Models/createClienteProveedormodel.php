<?php

class CreateClienteProveedorModel extends Model implements IModel{

    private $id;
    private $username;
    private $password;
    private $fullname;
    private $fullapellido;
    private $email;
    private $role;
    private $photo;
    private $estado;
    private $dni;
    //private $ultimo_login;
    //private $agregado;

    public function __construct(){
        parent::__construct();

        $this->username = '';
        $this->password = '';
        $this->fullname = '';
        $this->fullapellido = '';
        $this->email = '';
        $this->role = '';
        $this->photo = '';
        $this->estado = 1;
        $this->ultimo_login = '';
        $this->dni = '';
        //$this->agregado = '';
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
            $query = $this->prepare('INSERT INTO clientes (fullname, fullapellido,  email, dni, role, estado) VALUES(:fullname, :fullapellido, :email, :dni, :role, :estado)');
            $query->execute([
                'fullname'  => $this->fullname, 
                'fullapellido'  => $this->fullapellido,
                'email'     => $this->email,
                'dni'     => $this->dni,
                'role'      => $this->role,
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
            $query = $this->query('SELECT * FROM clientes');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new CreateClienteProveedorModel();
                $item->setId($p['id']);
                $item->setFullname($p['fullname']);
                $item->setFullapellido($p['fullapellido'], false);
                $item->setEmail($p['email']);
                $item->setDni($p['dni']);
                $item->setRole($p['role']);
                $item->setEstado($p['estado']);
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
            $query = $this->prepare('SELECT * FROM usuarios WHERE id = :id');
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

    public function from($array){
        $this->id = $array['id'];
        $this->username = $array['username'];
        $this->password = $array['password'];
        $this->fullname = $array['fullname'];
        $this->email = $array['email'];
        $this->role = $array['role'];
        $this->photo = $array['photo'];
        $this->estado = $array['estado']; //verifica el estado agarrando consulta el db
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

    public function setId($id){             $this->id = $id;}
    public function setUsername($username){ $this->username = $username;}
    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->getHashedPassword($password);
        }else{
            $this->password = $password;
        }
    }
    public function setFullname($fullname){ $this->fullname = $fullname;}
    public function setFullapellido($fullapellido){ $this->fullapellido = $fullapellido;}
    public function setDni($dni){ $this->dni = $dni;}
    public function setEmail($email){       $this->email = $email;}
    public function setRole($role){         $this->role = $role;}
    //public function setPhoto($photo){       $this->photo = $photo;}
    public function setEstado($estado){     $this->estado = $estado;}
    //public function setUltimo_login($ultimo_login){ $this->ultimo_login = $ultimo_login;}
    //public function setAgregado($agregado){ $this->agregado = $agregado;}

    public function getId(){                return $this->id;}
    public function getUsername(){          return $this->username;}
    public function getPassword(){          return $this->password;}
    public function getFullname(){          return $this->fullname;}
    public function getEmail(){             return $this->email;}
    public function getRole(){              return $this->role;}
    //public function getPhoto(){             return $this->photo;}
    public function getEstado(){            return $this->estado;}
    //public function getUltimo_login(){      return $this->ultimo_login;}
    //public function getAgregado(){          return $this->agregado;}
    
}
class CreateProveedorModel extends Model implements IModel{

    private $id;
    private $username;
    private $password;
    private $fullname;
    private $email;
    private $role;
    private $photo;
    private $estado;
    //private $ultimo_login;
    //private $agregado;

    public function __construct(){
        parent::__construct();

        $this->username = '';
        $this->password = '';
        $this->fullname = '';
        $this->email = '';
        $this->role = '';
        $this->photo = '';
        $this->estado = 1;
        $this->ultimo_login = '';
        //$this->agregado = '';
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
            $query = $this->prepare('INSERT INTO proveedor (fullname, fullapellido,  email, dni, role, estado) VALUES(:fullname, :fullapellido, :email, :dni, :role, :estado)');
            $query->execute([
                'fullname'  => $this->fullname, 
                'fullapellido'  => $this->fullapellido,
                'email'     => $this->email,
                'dni'     => $this->dni,
                'role'      => $this->role,
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
            $query = $this->query('SELECT * FROM usuarios');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p['id']);
                $item->setUsername($p['username']);
                $item->setPassword($p['password'], false);
                $item->setFullname($p['fullname']);
                $item->setEmail($p['email']);
                $item->setRole($p['role']);
                $item->setPhoto($p['photo']);
                $item->setEstado($p['estado']);
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
            $query = $this->prepare('SELECT * FROM usuarios WHERE id = :id');
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

    public function from($array){
        $this->id = $array['id'];
        $this->username = $array['username'];
        $this->password = $array['password'];
        $this->fullname = $array['fullname'];
        $this->email = $array['email'];
        $this->role = $array['role'];
        $this->photo = $array['photo'];
        $this->estado = $array['estado']; //verifica el estado agarrando consulta el db
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

    public function setId($id){             $this->id = $id;}
    public function setUsername($username){ $this->username = $username;}
    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->getHashedPassword($password);
        }else{
            $this->password = $password;
        }
    }
    public function setFullname($fullname){ 
        $this->fullname = $fullname;
    }
    public function setFullapellido($fullapellido){ 
        $this->fullapellido = $fullapellido;
    }
    public function setDni($dni){ 
        $this->dni = $dni;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setRole($role){
        $this->role = $role;
    }
    //public function setPhoto($photo){       $this->photo = $photo;}
    public function setEstado($estado){     $this->estado = $estado;}
    //public function setUltimo_login($ultimo_login){ $this->ultimo_login = $ultimo_login;}
    //public function setAgregado($agregado){ $this->agregado = $agregado;}

    public function getId(){                return $this->id;}
    public function getUsername(){          return $this->username;}
    public function getPassword(){          return $this->password;}
    public function getFullname(){          return $this->fullname;}
    public function getEmail(){             return $this->email;}
    public function getDni(){             return $this->dni;}
    public function getRole(){              return $this->role;}
    //public function getPhoto(){             return $this->photo;}
    public function getEstado(){            return $this->estado;}
    //public function getUltimo_login(){      return $this->ultimo_login;}
    //public function getAgregado(){          return $this->agregado;}
    
}
?>