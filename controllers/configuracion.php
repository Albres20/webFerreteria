<?php
    class Configuracion extends SessionController{

        private $user;
    
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log("Gestion de empresa ::constructor() ");
        }
    
        function render(){
            error_log("Gestion de empresa::RENDER() ");

            $this->view->render('admin/configuracion', [
                'user' => $this->user,
                'empresa' => $this->getEmpresaDB(),
            ]);
        /*$this->view->render('admin/usuarios', [
                "usuarios" => $usuarios
            ]);*/
        //$this->view->render('admin/usuarios');
        }

        function getEmpresaDB(){
            $empresamodel = new EmpresaModel();
            $empresa = $empresamodel->getEmpresa();
            return $empresa;
        }

        function updateDatosEmpresa(){
            if($this->existPOST(['nombre','sector','tipo', 'email', 'telefono'])){
            
    
                $name = $this->getPost('nombre');
                $sector = $this->getPost('sector');
                $tipo = $this->getPost('tipo');
                $email = $this->getPost('email');
                $telefono = $this->getPost('telefono');
                //$photos = $this->getPost('empresa_imagen');

                $ruta ="";
                $permitidos = array("image/jpg", "image/jpeg", "image/jpe", "image/png");
                $empresamodel = new EmpresaModel();

                if(isset($_FILES["empresa_imagen"]["tmp_name"]) && in_array($_FILES["empresa_imagen"]["type"], $permitidos)){
                    
                    $photo = $_FILES['empresa_imagen'];
                    $target_dir = RQ."image/empresa/";
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
                        $this->redirect('configuracion', ['error' => Errors::ERROR_EMPRESA_UPDATEPHOTO_FORMAT]);
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($photo["tmp_name"], $target_file)) {
    
                            //$this->model->updatePhoto($hash, $this->user->getId());
                            $ruta = $hash;
    
                            $this->redirect('configuracion', ['success' => Success::SUCCESS_EMPRESA_UPDATEPHOTO]);
                        } else {
                            $this->redirect('configuracion', ['error' => Errors::ERROR_EMPRESA_UPDATEPHOTO]);
                        }
                    }
                }

                $empresamodel->setEmpresaNombre($name);
                $empresamodel->setEmpresaSector($sector);
                $empresamodel->setEmpresaTipo($tipo);
                $empresamodel->setEmpresaEmail($email);
                $empresamodel->setEmpresaTelefono($telefono);
                $empresamodel->setEmpresaImagen($ruta);
                
                if($empresamodel->updateEmpresa()){
                    $this->redirect('configuracion', ['success' => Success::SUCCESS_EMPRESA_UPDATEDATOS]);
                }else{
                    //error
                    $this->redirect('configuracion', ['error' => Errors::ERROR_EMPRESA_UPDATENAME]);
                }
            }else{
                //'No se puede actualizar los datos personales'
                $this->redirect('configuracion', ['error' => Errors::ERROR_EMPRESA_UPDATENAME]);
                return;
            }
        }

        function updateDireccion(){
            if($this->existPOST(['region', 'provincia', 'distrito', 'direccion'])){
                $region = $this->getPost('region');
                $provincia = $this->getPost('provincia');
                $distrito = $this->getPost('distrito');
                $direccion = $this->getPost('direccion');

                $empresamodel = new EmpresaModel();
                $empresamodel->setEmpresaRegion($region);
                $empresamodel->setEmpresaProvincia($provincia);
                $empresamodel->setEmpresaDistrito($distrito);
                $empresamodel->setEmpresaDireccion($direccion);

                if($empresamodel->updateEmpresaDireccion()){
                    $this->redirect('configuracion', ['success' => Success::SUCCESS_EMPRESA_UPDATEDIRECCION]);
                }else{
                    //error
                    $this->redirect('configuracion', ['error' => Errors::ERROR_EMPRESA_UPDATEDIRECCION]);
                }
            }else{
                //'No se puede actualizar los datos personales'
                $this->redirect('configuracion', ['error' => Errors::ERROR_EMPRESA_UPDATEDIRECCION]);
                return;
            }
        }

    }
?>    