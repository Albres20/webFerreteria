<?php

class LoginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($usr_nombre, $usr_password){
        // insertar datos en la BD
        error_log("login: inicio");
        try{
            //$query = $this->db->connect()->prepare('SELECT * FROM users WHERE username = :username');
            $query = $this->prepare('SELECT * FROM usuario WHERE usr_nombre = :usr_nombre');
            $query->execute(['usr_nombre' => $usr_nombre]);
            
            if($query->rowCount() == 1){

                $item = $query->fetch(PDO::FETCH_ASSOC);

                $user = new UserModel();
                $user->from($item);

                error_log('login: user id '.$user->getusr_codigo());

                if(password_verify($usr_password, $user->getusr_password())){

                    if($user->getusr_estado() == "A"){
                        error_log('login: user estado valido '.$user->getusr_codigo(). " -> " .$user->getusr_estado());
                        error_log('login: password ok');
                        //actualizamos la fecha del login del usuario
                        if($user->actualizarfecha_login()){
                            error_log('login: fecha login actualizada');
                            return $user;
                        }else{
                            error_log('login: error al actualizar fecha login');
                            return NULL;
                        }
                    }else{
                        error_log('login: user estado invalido '.$user->getusr_codigo(). " -> " .$user->getusr_estado());
                        return NULL;
                    }
                    //return ['id' => $item['id'], 'username' => $item['username'], 'role' => $item['role']];
                    //return $user->getusr_codigo();
                }else{
                    return NULL;
                }
            }
        }catch(PDOException $e){
            return NULL;
        }
    } 
}

?>