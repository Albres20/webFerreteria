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
    
    private function getUsuariosDB(){
        $res = [];
        $userModel = new UserModel();
        $users = $userModel->getAll($this->user->getId());

        foreach ($users as $user) {
            array_push($res, $user->getId());
        }
        $res = array_values(array_unique($res));

        return $res;
    }
}

?>