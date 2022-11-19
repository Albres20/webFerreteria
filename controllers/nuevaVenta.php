<?php

class NuevaVenta extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de Nueva Venta ::constructor() ");
    }

    function render(){
        error_log("Gestion de Nueva Venta ::RENDER() ");

        $this->view->render('admin/nuevaVenta', [
            'user' => $this->user,
            //'clientes' => $this->getClienteDB(),
        ]);
        /*$this->view->render('admin/usuarios', [
            "usuarios" => $usuarios
        ]);*/
        //$this->view->render('admin/usuarios');
    }

    //recoger la consulta de demo.new-venta.js
    function buscarProducto(){
        error_log("Gestion de Nueva Venta ::buscarProducto() ");
        $producto = $_POST['consulta'];
        error_log("Gestion de Nueva Venta ::buscarProducto() ::producto: ".$producto);
        $productomodel = new ProductosModel();
        $productos = $productomodel->getProductosBySearch($producto);
        $res = array();
        foreach($productos as $producto){
            $res[] = array(
                'estado' => 'success',
                'codigo' => $producto['prd_codigo'],
                'nombre' => $producto['prd_nombre'],
                'stock' => $producto['dpr_stock'],
                'precio' => $producto['dpr_prec_prod']
            );
        }
        error_log("Gestion de Nueva Venta ::buscarProducto() ::productos: ".json_encode($res));
        //mostrar los datos en la vista mediante
        echo json_encode($res);
        //return json_encode($res);
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

                $clienteproveedormodel->setcpr_tipodocum($tipodocum);
                $clienteproveedormodel->setcpr_numdoc($numdocum);
                $clienteproveedormodel->setcpr_nombre($nombrelegal);
                $clienteproveedormodel->setcpr_direccion($direccion);
                $clienteproveedormodel->setcpr_tipo($tipo);
                $clienteproveedormodel->setcpr_telefono($telefono);
                $clienteproveedormodel->setcpr_correo($correo);
                $clienteproveedormodel->setcpr_datosadicionales($datosadicionales);

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
                
                $clienteproveedormodel->setcpr_tipodocum($tipodocum);
                $clienteproveedormodel->setcpr_numdoc(00000000);
                $clienteproveedormodel->setcpr_nombre($nombrelegal);
                $clienteproveedormodel->setcpr_direccion($direccion);
                $clienteproveedormodel->setcpr_tipo($tipo);
                $clienteproveedormodel->setcpr_telefono($telefono);
                $clienteproveedormodel->setcpr_correo($correo);
                $clienteproveedormodel->setcpr_datosadicionales($datosadicionales);

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