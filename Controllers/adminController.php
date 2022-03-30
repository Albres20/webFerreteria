<?php
    class adminController extends Controllers{
        public function __construct(){
            parent::__construct();
        }
        public function adminUsuarios(){
            $this->view->Render($this, "adminUsuarios", null);
        }
    
    }
?>