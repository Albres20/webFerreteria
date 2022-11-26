<?php

class ClienteProveedor extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de cliente/proveedor ::constructor() ");
    }

    function render(){
        error_log("Gestion de cliente/proveedor::RENDER() ");

        $this->view->render('admin/clienteProveedor', [
            'user' => $this->user,
            'clientes' => $this->getClienteDB(),
        ]);
    }
    /////////////////////////////////////////////
    //NUEVO CLIENTE
    /////////////////////////////////////////////
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

                if(!$clienteproveedormodel->existsNUM($numdocum)){
                    $clienteproveedormodel->setcpr_tipodocum($tipodocum);
                    $clienteproveedormodel->setcpr_numdoc($numdocum);
                    $clienteproveedormodel->setcpr_nombre($nombrelegal);
                    $clienteproveedormodel->setcpr_direccion($direccion);
                    $clienteproveedormodel->setcpr_tipo($tipo);
                    $clienteproveedormodel->setcpr_telefono($telefono);
                    $clienteproveedormodel->setcpr_correo($correo);
                    $clienteproveedormodel->setcpr_datosadicionales($datosadicionales);
                    $clienteproveedormodel->setcpr_fechacreacion(date('Y-m-d H:i:s'));

                    $clienteproveedormodel->save();
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

                if(!$clienteproveedormodel->existsNOM($nombrelegal)){
                    $clienteproveedormodel->setcpr_tipodocum($tipodocum);
                    $clienteproveedormodel->setcpr_nombre($nombrelegal);
                    $clienteproveedormodel->setcpr_direccion($direccion);
                    $clienteproveedormodel->setcpr_tipo($tipo);
                    $clienteproveedormodel->setcpr_telefono($telefono);
                    $clienteproveedormodel->setcpr_correo($correo);
                    $clienteproveedormodel->setcpr_datosadicionales($datosadicionales);

                    $clienteproveedormodel->save();
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
    
    /////////////////////////////////////////////
    //ACTUALIZAR CLIENTE / PROVEEDOR
    /////////////////////////////////////////////
    function updateClienteProveedor($params){
        if($params === NULL) $this->redirect('clienteProveedor', ['error' => Errors::ERROR_CLIENTE_UPDATECLIENTE_FAILED]);
        $id = $params[0];
        error_log("clienteProveedor::updateCliente() id = " . $id);
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

                $clienteproveedormodel->get($id);

                $clienteproveedormodel->setcpr_tipodocum($tipodocum);
                $clienteproveedormodel->setcpr_numdoc($numdocum);
                $clienteproveedormodel->setcpr_nombre($nombrelegal);
                $clienteproveedormodel->setcpr_direccion($direccion);
                $clienteproveedormodel->setcpr_tipo($tipo);
                $clienteproveedormodel->setcpr_telefono($telefono);
                $clienteproveedormodel->setcpr_correo($correo);
                $clienteproveedormodel->setcpr_datosadicionales($datosadicionales);

                if($clienteproveedormodel->update()){
                    //$this->view->render('login/index');success
                    error_log('Admin::updateCliente() => cliente / proveedor actualizado');
                    $this->redirect('clienteProveedor', ['success' => Success::SUCCESS_CLIENTE_UPDATEUSER]);
                }else{
                    // $this->errorAtSignup('Error al registrar el producto. Inténtalo más tarde');
                    //return;
                    error_log('Admin::updateCliente() => error al actualizar cliente / proveedor CON DNI O RUC');
                    $this->redirect('clienteProveedor', ['error' => Errors::ERROR_CLIENTE_UPDATECLIENTE_FAILED]);
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

                $clienteproveedormodel->get($id);
                
                $clienteproveedormodel->setcpr_tipodocum($tipodocum);
                $clienteproveedormodel->setcpr_nombre($nombrelegal);
                $clienteproveedormodel->setcpr_direccion($direccion);
                $clienteproveedormodel->setcpr_tipo($tipo);
                $clienteproveedormodel->setcpr_telefono($telefono);
                $clienteproveedormodel->setcpr_correo($correo);
                $clienteproveedormodel->setcpr_datosadicionales($datosadicionales);
                
                if($clienteproveedormodel->update()){
                    //$this->view->render('login/index');success
                    error_log('Admin::updateCliente() => cliente / proveedor actualizado');
                    $this->redirect('clienteProveedor', ['success' => Success::SUCCESS_CLIENTE_UPDATEUSER]);
                }else{
                    // $this->errorAtSignup('Error al registrar el producto. Inténtalo más tarde');
                    //return;
                    error_log('Admin::updateCliente() => error al actualizar cliente / proveedor SIN DOCUMENTO');
                    $this->redirect('clienteProveedor', ['error' => Errors::ERROR_CLIENTE_UPDATECLIENTE_FAILED]);
                }
            }
        }
    }

    /////////////////////////////////////////////
    //ELIMINAR CLIENTE
    /////////////////////////////////////////////
    function delete($params){
        error_log("cliente/proveedor::delete()");
        
        if($params === NULL) $this->redirect('clienteProveedor', ['error' => Errors::ERROR_ADMIN_CLIENTEDELETE]);
        $id = $params[0];
        error_log("cliente/proveedor::delete() id = " . $id);
        $clienteprovModel = new ClienteProveedorModel();

        if($clienteprovModel->existsID($id)){
            $clienteprovModel->delete($id);
            $this->redirect('clienteProveedor', ['success' => Success::SUCCESS_ADMIN_CLIENTEDELETE]);
        }else{
            $this->redirect('clienteProveedor', ['error' => Errors::ERROR_ADMIN_CLIENTEDELETE]);
        }
    }

    /////////////////////////////////////////////
    //OBTENER CLIENTE
    /////////////////////////////////////////////
    function getClienteDB(){
        $res = [];
        $CreateClienteProveedorModel = new ClienteProveedorModel();
        $clientes = $CreateClienteProveedorModel->getAll();

        foreach ($clientes as $cliente) {
            $clientesarray = [];
            $clientesarray['cliente'] = $cliente;
            // $categoryArray['total'] = $total;
            // $categoryArray['count'] = $numberOfExpenses;
            // $categoryArray['category'] = $category;

             array_push($res, $clientesarray);
         }
        //$res = array_values(array_unique($res));

        return $res;
    }


}

?>