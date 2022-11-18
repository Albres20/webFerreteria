<?php
    class Info extends SessionController{

        private $user;
        private $info;
    
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log("Gestion de empresa ::constructor() ");
        }
    
        function render(){
            error_log("Gestion de empresa::RENDER() ");

            $this->view->render('admin/info', [
                'user' => $this->user,
                'empresa' => $this->getJSONFileConfig(),
            ]);
        }

        private function getJSONFileConfig()
        {
            $string = file_get_contents("resource/js/info.json");
            $json = json_decode($string, true);
            $this->info = $json;
    
            return $json;
        }

        function updateDatosEmpresa(){

            $ruta ="";
            $permitidos = array("image/jpg", "image/jpeg", "image/jpe", "image/png");

            if(isset($_FILES["empresa_imagen"]["tmp_name"]) && in_array($_FILES["empresa_imagen"]["type"], $permitidos)){
                    
                $photo = $_FILES['empresa_imagen'];
                $target_dir = RQ."image/empresa/";
                $extarr = explode('.', $photo["name"]);
                $filename = $extarr[sizeof($extarr)-2];
                $ext = $extarr[sizeof($extarr)-1];
                $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
                $target_file = $target_dir . $hash;
                $uploadOk = 1;                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($photo["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {                        //echo "File is not an image.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    //echo "Sorry, your file was not uploaded.";
                    $this->redirect('info', ['error' => Errors::ERROR_EMPRESA_UPDATEPHOTO_FORMAT]);
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($photo["tmp_name"], $target_file)) {
    
                        //$this->model->updatePhoto($hash, $this->user->getId());
                        $ruta = $hash;
    
                        $this->redirect('info', ['success' => Success::SUCCESS_EMPRESA_UPDATEPHOTO]);
                    } else {
                        $this->redirect('info', ['error' => Errors::ERROR_EMPRESA_UPDATEPHOTO]);
                    }
                }
            }

            //$empresamodel->setEmpresaImagen($ruta);
            $this->info[0]['Razon_social'] = "H&T Trading E.I.R.L";
            $this->info[0]['Sector'] = "COMERCIO";
            $this->info[0]['Tipo'] = "EMPRESA INDIVIDUAL DE RESP. LTDA";
            $this->info[0]['Correo'] = "ventas@hyt-trading.com";
            $this->info[0]['Telefono'] = "745-6214";
            $this->info[0]['Logo'] = $ruta;
            $this->info[0]['Region'] = "LIMA";
            $this->info[0]['Provincia'] = "LIMA";
            $this->info[0]['Distrito'] = "COMAS";
            $this->info[0]['Direccion'] = "Av. Jamaica Mza.M Lote 3 Urb. San Agustín 2da Etapa, Comas.";
            error_log($this->info[0]['Logo']);
                
            if(file_put_contents("resource/js/info.json", json_encode($this->info))){
                $this->redirect('info', ['success' => Success::SUCCESS_EMPRESA_UPDATEDATOS]);
            }else{
                //error
                $this->redirect('info', ['error' => Errors::ERROR_EMPRESA_UPDATEPHOTO]);
            }
        }

    }
