
<?php

class Login extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        $this->view->errorMessage = '';
        $this->view->render('login/index');
    }

    function authenticate(){
        if( $this->existPOST(['username', 'password']) ){
            $usr_nombre = $this->getPost('username');
            $usr_password = $this->getPost('password');

            //validate data
            if($usr_nombre == '' || empty($usr_nombre) || $usr_password == '' || empty($usr_password)){
                //$this->errorAtLogin('Campos vacios');
                error_log('Login::authenticate() empty');
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
                return;
            }
            // si el login es exitoso regresa solo el ID del usuario
            $user = $this->model->login($usr_nombre, $usr_password);
            if($user != NULL){
                // inicializa el proceso de las sesiones
                error_log('Login::authenticate() passed');    
                $this->initialize($user);
            }else{
                //error al registrar, que intente de nuevo
                error_log('Login::authenticate() el user es null');
                //$this->errorAtLogin('Nombre de usuario y/o password incorrecto');
                error_log('Login::authenticate() username and/or password wrong');
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
                return;
            }
        }else{
            // error, cargar vista con errores
            //$this->errorAtLogin('Error al procesar solicitud');
            error_log('Login::authenticate() error with params');
            $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE]);
        }
    }

    function saludo(){
        
    }
}

?>