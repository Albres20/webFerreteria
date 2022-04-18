<?php

class NuevaCotizacion extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de Nueva Cotizacion ::constructor() ");
    }

    function render(){
        error_log("Gestion de Nueva Cotizacion ::RENDER() ");

        $this->view->render('admin/nuevaCotizacion', [
            'user' => $this->user,
            //'clientes' => $this->getClienteDB(),
        ]);
        /*$this->view->render('admin/usuarios', [
            "usuarios" => $usuarios
        ]);*/
        //$this->view->render('admin/usuarios');
    }


    function newClienteProveedor(){
        error_log('Admin::newClienteProveedor()');
        if ($_REQUEST['cp_tipodocum'] != "SIN DOCUMENTO") {
            if($this->existPOST(['cp_tipodocum', 'cp_numdocum','cp_nombrelegal','cp_direccion','cp_tipo','cp_telefono'
            ,'cp_correo','cp_datosadicionales'])){
                $tipodocum = $this->getPost('cp_tipodocum');
                $numdocum = $this->getPost('cp_numdocum');
                $nombrelegal = $this->getPost('cp_nombrelegal');
                $direccion = $this->getPost('cp_direccion');
                $tipo = $this->getPost('cp_tipo');
                $telefono = $this->getPost('cp_telefono');
                $correo = $this->getPost('cp_correo');
                $datosadicionales = $this->getPost('cp_datosadicionales');

                $clienteproveedormodel = new ClienteProveedorModel();

                $clienteproveedormodel->setcp_tipodocum($tipodocum);
                $clienteproveedormodel->setcp_numdocum($numdocum);
                $clienteproveedormodel->setcp_nombrelegal($nombrelegal);
                $clienteproveedormodel->setcp_direccion($direccion);
                $clienteproveedormodel->setcp_tipo($tipo);
                $clienteproveedormodel->setcp_telefono($telefono);
                $clienteproveedormodel->setcp_correo($correo);
                $clienteproveedormodel->setcp_datosadicionales($datosadicionales);

                if($clienteproveedormodel->existsNUM($numdocum)){
                    //$this->errorAtSignup('Error al registrar el producto. Escribe un nombre o codigo diferente');
                    $this->redirect('clienteProveedor', ['error' => Errors::ERROR_CLIENTENUM_NEWUSER_EXISTS]);
                    //return;
                }else if($clienteproveedormodel->save()){
                    //$this->view->render('login/index');success
                    error_log('Admin::newClienteProveedor() => new cliente / proveedor creado');
                    $this->redirect('clienteProveedor', ['success' => Success::SUCCESS_CLIENTE_NEWUSER]);
                }else{
                    // $this->errorAtSignup('Error al registrar el producto. Inténtalo más tarde');
                    //return;
                    error_log('Admin::newClienteProveedor() => error al crear cliente / proveedor CON DNI O RUC');
                    $this->redirect('clienteProveedor', ['error' => Errors::ERROR_SIGNUP_NEWCLIENTE_FAILED]);
                }
            }
        
        }else{
            if($this->existPOST('cp_tipodocum','cp_nombrelegal','cp_direccion','cp_tipo','cp_telefono'
            ,'cp_correo','cp_datosadicionales')){
                $tipodocum = $this->getPost('cp_tipodocum');
                $nombrelegal = $this->getPost('cp_nombrelegal');
                $direccion = $this->getPost('cp_direccion');
                $tipo = $this->getPost('cp_tipo');
                $telefono = $this->getPost('cp_telefono');
                $correo = $this->getPost('cp_correo');
                $datosadicionales = $this->getPost('cp_datosadicionales');

                $clienteproveedormodel = new ClienteProveedorModel();
                
                $clienteproveedormodel->setcp_tipodocum($tipodocum);
                $clienteproveedormodel->setcp_numdocum(00000000);
                $clienteproveedormodel->setcp_nombrelegal($nombrelegal);
                $clienteproveedormodel->setcp_direccion($direccion);
                $clienteproveedormodel->setcp_tipo($tipo);
                $clienteproveedormodel->setcp_telefono($telefono);
                $clienteproveedormodel->setcp_correo($correo);
                $clienteproveedormodel->setcp_datosadicionales($datosadicionales);

                if($clienteproveedormodel->existsNOM($nombrelegal)){
                    //$this->errorAtSignup('Error al registrar el producto. Escribe un nombre o codigo diferente');
                    $this->redirect('clienteProveedor', ['error' => Errors::ERROR_CLIENTENOM_NEWUSER_EXISTS]);
                    //return;
                }else if($clienteproveedormodel->save()){
                    //$this->view->render('login/index');success
                    error_log('Admin::newClienteProveedor() => new cliente / proveedor creado');
                    $this->redirect('clienteProveedor', ['success' => Success::SUCCESS_CLIENTE_NEWUSER]);
                }else{
                    // $this->errorAtSignup('Error al registrar el producto. Inténtalo más tarde');
                    //return;
                    error_log('Admin::newClienteProveedor() => error al crear cliente / proveedor SIN DOCUMENTO');
                    $this->redirect('clienteProveedor', ['error' => Errors::ERROR_SIGNUP_NEWCLIENTE_FAILED]);
                }
            }
        }
    }

}

?>