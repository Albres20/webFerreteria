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
                $userModel->setusr_codigo('005');
                $userModel->setusr_nombre($username);
                $userModel->setusr_password($password);
                $userModel->setusr_fullname($fullname);
                $userModel->setusr_email($email);
                $userModel->setrol_id($role);
                $userModel->setusr_estado($estado);
                $userModel->setusr_agregado(date('Y-m-d H:i:s'));
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
    /////////////////////////////////////////////
    //ACTUALIZAR USUARIO
    /////////////////////////////////////////////

    function updateUsuario($params){
        if($params === NULL) $this->redirect('usuarios', ['error' => Errors::ERROR_USERS_UPDATEUSER]);
        $id = $params[0];
        error_log("usuarios::updateUsuario() codigo = " . $id);
        error_log('usuarios::updateUsuario()');
        if($this->existPOST(['username', 'fullname', 'email', 'role', 'estado'])){
            $username = $this->getPost('username');
            $fullname = $this->getPost('fullname');
            $email = $this->getPost('email');
            $role = $this->getPost('role');
            $estado = $this->getPost('estado');

            $userModel = new UserModel();
            //$userModel->setId($id); // no es necesario
            $userModel->get($id);
            $userModel->setusr_nombre($username);
            $userModel->setusr_fullname($fullname);
            $userModel->setusr_email($email);
            $userModel->setrol_id($role);
            $userModel->setusr_estado($estado);

            if($userModel->update()){
                error_log('Admin::updateUsuario() => usuario actualizado: ' . $userModel->getusr_codigo());
                $this->redirect('usuarios', ['success' => Success::SUCCESS_ADMIN_UPDATEUSER]);
            }else{
                //error
                $this->redirect('usuarios', ['error' => Errors::ERROR_ADMIN_UPDATEUSER]);
            }
        }else{
            //'No se puede actualizar los datos del usuario'
            $this->redirect('usuarios', ['error' => Errors::ERROR_ADMIN_UPDATEUSER]);
            return;
        }
    }

    function delete($params){
        error_log("usuarios::delete()");
        
        if($params === NULL) $this->redirect('usuarios', ['error' => Errors::ERROR_ADMIN_DELETEUSER]);
        $id = $params[0];
        error_log("usuarios::delete() codigo = " . $id);
        $userModel = new UserModel();
        //$res = $userModel->delete($id);

        if($userModel->existsID($id)){
            $userModel->delete($id);
            $this->redirect('usuarios', ['success' => Success::SUCCESS_ADMIN_DELETEUSER]);
            //$this->redirect('usuarios', ['success' => Success::SUCCESS_EXPENSES_DELETE]);
        }else{
            $this->redirect('usuarios', ['error' => Errors::ERROR_ADMIN_DELETEUSER]);
            //$this->redirect('usuarios', ['error' => Errors::ERROR_ADMIN_NEWCATEGORY_EXISTS]);
        }
    }
}

?>