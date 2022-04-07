<?php

class Usuarios extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de usuarios ::constructor() ");
    }

    function render(){
        error_log("Gestion de usuarios::RENDER() ");

        $this->view->render('admin/usuarios', [
            'user' => $this->user,
            'usuarios' => $this->getUsuariosDB()
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
        if($this->existPOST(['username', 'password', 'fullname', 'email', 'role', 'estado'])){
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            $fullname = $this->getPost('fullname');
            $email = $this->getPost('email');
            $role = $this->getPost('role');
            $estado = $this->getPost('estado');

            $userModel = new UserModel();

            if(!$userModel->exists($username)){
                $userModel->setUsername($username);
                $userModel->setPassword($password);
                $userModel->setFullname($fullname);
                $userModel->setEmail($email);
                $userModel->setRole($role);
                $userModel->setEstado($estado);
                $userModel->save();
                error_log('Admin::newUsuarios() => new usuario creado');
                $this->redirect('usuarios', ['success' => Success::SUCCESS_ADMIN_NEWUSER]);
            }else{
                $this->redirect('usuarios', ['error' => Errors::ERROR_ADMIN_NEWUSER_EXISTS]);
            }
        }
    }
    
    function getUsuariosDB(){
        $res = [];
        $userModel = new UserModel();
        $usuarios = $userModel->getAll();

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