<?php
    class IndexController extends Controllers{
        public function __construct() {
            
            parent::__construct(); 
        }
        public function Index(){

            $this->view->Render($this, "index");
        }
    }
?>