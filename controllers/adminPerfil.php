<?php
    class AdminPerfil extends SessionController{

        private $user;
    
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log("Gestion de perfil ::constructor() ");
        }
    
        function render(){
            error_log("Gestion de perfil::RENDER() ");

            $this->view->render('admin/perfil', [
                'user' => $this->user,
            ]);
        /*$this->view->render('admin/usuarios', [
                "usuarios" => $usuarios
            ]);*/
        //$this->view->render('admin/usuarios');
        }
    }