<?php
    class IndexController extends Controllers{
        public function __construct() {
            
            parent::__construct(); 
        }
        public function Index(){

            $this->role->setRoles();
            $this->view->Render($this, "index",null,null,null);
        }
    }
?>