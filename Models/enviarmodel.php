<?php

class EnviadoModel extends Model{
    private $correo;


    public function __construct(){
        parent::__construct();
        $this->correo = '';
    }

    public function send($correo){
        try{
            $query = $this->prepare('SELECT * FROM usuarios WHERE email = :email');
            $query->execute([ 'email' => $correo]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            error_log($user);
            $nr = mysqli_num_rows($user);
            
            if($user['email']==$correo){
                $enviarpass= $user['password'];
                $paracorreo 		= $correo;
                $titulo				= "Recuperar Password";
                $mensaje			= "Tu password es: ".$enviarpass;
                $tucorreo			= "From: xxxx@gmail.com";

                
                if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
                {
                    echo "<script> alert('Contraseña enviado');window.location= 'index.html' </script>";
                    return true;
                }else
                {
                    echo "<script> alert('Error');window.location= 'index.html' </script>";
                    return false;
                }
            }
            else
            {
                echo "<script> alert('Este correo no existe');window.location= 'index.html' </script>";
                return false;
            }
            
                    

            
        }catch(PDOException $e){
            return false;
        }
    }
    public function setUsername($correo){ $this->correo = $correo;}
    public function getUsername(){          return $this->correo;}
    

    

}

?>