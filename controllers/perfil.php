<?php
require_once 'models/usermodel.php';
    class Perfil extends SessionController{

        private $user;
    
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log("Gestion de perfil ::constructor() ");
        }
    
        function render(){
            error_log("Gestion de perfil::RENDER() ");

            $this->view->render('Default/perfil', [
                'user' => $this->user,
            ]);
        /*$this->view->render('admin/usuarios', [
                "usuarios" => $usuarios
            ]);*/
        //$this->view->render('admin/usuarios');
        }


        function updateDatosPersonales(){
            if($this->existPOST(['nombre','apellido', 'email'])){
            
    
                $name = $this->getPost('nombre');
                $lastname = $this->getPost('apellido');
                $fullname = $name . " " . $lastname;
                $email = $this->getPost('email');
                
                $this->user->setFullname($fullname);
                $this->user->setEmail($email);
                 
                if($this->user->update()){
                    $this->redirect('perfil', ['success' => Success::SUCCESS_USER_UPDATEDATOS]);
                }else{
                    //error
                }
            }else{
                $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATENAME]);
                return;
            }
        }

        function updatePassword(){
            if(!$this->existPOST(['current_password', 'new_password'])){
                $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATEPASSWORD]);
                return;
            }
    
            $current = $this->getPost('current_password');
            $new     = $this->getPost('new_password');
    
            if(empty($current) || empty($new)){
                $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATEPASSWORD_EMPTY]);
                return;
            }
    
            if($current === $new){
                $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATEPASSWORD_ISNOTTHESAME]);
                return;
            }
    
            //validar que el current es el mismo que el guardado
            $newHash = new UserModel();
            $newHash->comparePasswords($current, $this->user->getId());
            if($newHash != NULL){
                //si lo es actualizar con el nuevo
                $this->user->setPassword($new, true);
                
                if($this->user->update()){
                    $this->redirect('perfil', ['success' => Success::SUCCESS_USER_UPDATEPASSWORD]);
                }else{
                    //error
                    $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATEPASSWORD]);
                }
            }else{
                $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATEPASSWORD]);
                return;
            }
        }
    }
?>    