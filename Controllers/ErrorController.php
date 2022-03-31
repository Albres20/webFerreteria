<?php
    class ErrorController extends Controllers{
        function __construct(){
            parent::__construct();
            $this->view->render('Error/error');
        }
    }
?>