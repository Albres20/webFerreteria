<?php
    class CajeroController extends Controllers{
        public function __construct() {
            parent::__construct();
        }

        public function Cotizaciones(){
            $this->view->Render($this,"cotizaciones",null,null,null);
        }
        public function Ventas(){
            $this->view->Render($this,"ventas",null,null,null);
        }
    }
?>