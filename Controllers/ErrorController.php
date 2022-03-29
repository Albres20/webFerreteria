<?php
    class ErrorController extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }

        public function Error($url){
            $this->view->Render($this, "Error", $url,null,null);
        }
    }
?>