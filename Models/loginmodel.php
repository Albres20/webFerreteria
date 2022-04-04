<?php

class LoginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        // insertar datos en la BD
        error_log("login: inicio");
        try{
            //$query = $this->db->connect()->prepare('SELECT * FROM users WHERE username = :username');
            $query = $this->prepare('SELECT * FROM usuarios WHERE username = :username');
            $query->execute(['username' => $username]);
            
            if($query->rowCount() == 1){

                $item = $query->fetch(PDO::FETCH_ASSOC);

                $user = new UserModel();
                $user->from($item);

                error_log('login: user id '.$user->getId());

                if(password_verify($password, $user->getPassword())){

                    if($user->getEstado() == 1){
                        error_log('login: user estado valido '.$user->getId(). " -> " .$user->getEstado());
                        error_log('login: password ok');
                        //actualizamos la fecha del login del usuario
                        $this->actualizarfecha_login($user->getId());
                        return $user;
                    }else{
                        error_log('login: user estado invalido '.$user->getId(). " -> " .$user->getEstado());
                        return NULL;
                    }
                    //return ['id' => $item['id'], 'username' => $item['username'], 'role' => $item['role']];
                    //return $user->getId();
                }else{
                    return NULL;
                }
            }
        }catch(PDOException $e){
            return NULL;
        }
    }

    public function actualizarfecha_login($iduser){
        
        date_default_timezone_set('America/Bogota');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha.' '.$hora;
        
        try{
            $query = $this->prepare('UPDATE usuarios SET ultimo_login = :val WHERE id = :id');
            $query->execute(['val' => $fechaActual, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
                error_log('login: actualizar fecha login en :'.$fechaActual);
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    

}

?>