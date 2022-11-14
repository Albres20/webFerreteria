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
                //$photos = $this->getPost('user_imagen');
                $ruta ="";
                $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");

                if(isset($_FILES["user_imagen"]["tmp_name"]) && in_array($_FILES["user_imagen"]["type"], $permitidos)){
                    
                    $photo = $_FILES['user_imagen'];
                    $target_dir = RQ."image/usuarios/";
                    $extarr = explode('.', $photo["name"]);
                    $filename = $extarr[sizeof($extarr)-2];
                    $ext = $extarr[sizeof($extarr)-1];
                    $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
                    $target_file = $target_dir . $hash;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $check = getimagesize($photo["tmp_name"]);
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        //echo "File is not an image.";
                        $uploadOk = 0;
                    }
        
                    if ($uploadOk == 0) {
                        //echo "Sorry, your file was not uploaded.";
                        $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATEPHOTO_FORMAT]);
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($photo["tmp_name"], $target_file)) {
    
                            //$this->model->updatePhoto($hash, $this->user->getId());
                            $ruta = $hash;
    
                            $this->redirect('perfil', ['success' => Success::SUCCESS_USER_UPDATEPHOTO]);
                        } else {
                            $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATEPHOTO]);
                        }
                    }
                }

                $this->user->setusr_fullname($fullname);
                $this->user->setusr_email($email);
                $this->user->setusr_photo($ruta);
                 
                if($this->user->update()){
                    $this->redirect('perfil', ['success' => Success::SUCCESS_USER_UPDATEDATOS]);
                }else{
                    //error
                    $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATENAME]);
                }
            }else{
                //'No se puede actualizar los datos personales'
                $this->redirect('perfil', ['error' => Errors::ERROR_USER_UPDATEDATOSPERSONALES]);
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
            $newHash->comparePasswords($current, $this->user->getusr_codigo());
            if($newHash != NULL){
                //si lo es actualizar con el nuevo
                $this->user->setusr_password($new, true);
                
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