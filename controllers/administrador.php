<?php

class Administrador extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        /*$stats = $this->getStatistics();

        $this->view->render('admin/index', [
            "stats" => $stats
        ]);*/
        $this->view->render('admin/index', [
            'user' => $this->user
        ]);

        //$this->view->render('admin/index');
    }

}

?>