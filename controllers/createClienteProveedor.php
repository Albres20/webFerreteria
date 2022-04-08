<?php

class CreateClienteProveedor extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de usuarios ::constructor() ");
    }

    function render(){
        error_log("Gestion de creacion cliente proveedor::RENDER() ");

        $this->view->render('admin/createClienteProveedor', [
            'user' => $this->user,
            'usuarios' => $this->getClienteDB()
        ]);
        /*$this->view->render('admin/usuarios', [
            "usuarios" => $usuarios
        ]);*/
        //$this->view->render('admin/usuarios');
    }

    // private function getUsuariosDB(){
    //     $res = [];

    //     $userModel = new UserModel();
    //     $users = $userModel->getAll();

    //     $res['count-users'] = count($users);
    //     return $res;
    // }
    // function createUsuarios(){
    //     $this->view->render('admin/crearusuariomodal');
    // }

    // devuelve el JSON para las llamadas AJAX
    function getUsuariosJSON()
    {
            header('Content-Type: application/json');
            $res = [];
            $userModel = new UserModel();
            $users = $userModel->getAll();
    
            foreach ($users as $user) {
                array_push($res, $user->toArray());
            }
            
            echo json_encode($res);
    }

    function newUsuarios(){
        error_log('Admin::newUsuarios()');
        if($this->existPOST(['fullname', 'fullapellido', 'email', 'dni', 'role', 'estado'])){
            $fullname=$this->getPost('fullname');
            $fullapellido = $this->getPost('fullapellido');
            $pass = $this->getPost('password');
            $dni = $this->getPost('dni');
            $email = $this->getPost('email');
            $role = $this->getPost('role');
            $estado = $this->getPost('estado');
            echo '<script language="javascript">alert("juas");</script>';
            if($role=='cliente'){
                $createClienteProveedorModel = new createClienteProveedorModel();
                if(!$createClienteProveedorModel->exists($fullname)){
                    $createClienteProveedorModel->setFullname($fullname);
                    $createClienteProveedorModel->setFullapellido($fullapellido);
                    $createClienteProveedorModel->setDni($dni);
                    $createClienteProveedorModel->setEmail($email);
                    $createClienteProveedorModel->setRole($role);
                    $createClienteProveedorModel->setEstado($estado);
                    $createClienteProveedorModel->save();
                    error_log('Admin::newUsuarios() => new usuario creado');
                    $this->redirect('createClienteProveedor', ['success' => Success::SUCCESS_ADMIN_NEWUSER]);
                }else{
                    $this->redirect('createClienteProveedor', ['error' => Errors::ERROR_ADMIN_NEWUSER_EXISTS]);
                }
            }
            
            if($role=='proveedor'){
                
                $createProveedorModel = new createProveedorModel();
                if(!$createProveedorModel->exists($fullname)){
                    $createProveedorModel->setFullname($fullname);
                    $createProveedorModel->setFullapellido($fullapellido);
                    $createProveedorModel->setDni($dni);
                    $createProveedorModel->setEmail($email);
                    $createProveedorModel->setRole($role);
                    $createProveedorModel->setEstado($estado);
                    $createProveedorModel->save();
                    error_log('Admin::newUsuarios() => new proveedor creado');
                    $this->redirect('createClienteProveedor', ['success' => Success::SUCCESS_ADMIN_NEWUSER]);
                }else{
                    $this->redirect('createClienteProveedor', ['error' => Errors::ERROR_ADMIN_NEWUSER_EXISTS]);
                }
            }
            
        }
    }
    
    function getClienteDB(){
        $res = [];
        $CreateClienteProveedorModel = new CreateClienteProveedorModel();
        $usuarios = $CreateClienteProveedorModel->getAll();

        foreach ($usuarios as $usuario) {
            $usersarray = [];
            $usersarray['usuario'] = $usuario;
            // $categoryArray['total'] = $total;
            // $categoryArray['count'] = $numberOfExpenses;
            // $categoryArray['category'] = $category;

             array_push($res, $usersarray);
         }
        //$res = array_values(array_unique($res));

        return $res;
    }
}

?>