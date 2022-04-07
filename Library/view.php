<?php

class View{

    function __construct(){
    }

    function render($nombre, $data = []){
        $this->d = $data;
        
        $this->handleMessages();
        

        require 'views/' . $nombre . '.php';
    }
    
    private function handleMessages(){
        if(isset($_GET['success']) && isset($_GET['error'])){
            // no se muestra nada porque no puede haber un error y success al mismo tiempo
        }else if(isset($_GET['success'])){
            
            $this->handleSuccess();
        }else if(isset($_GET['error'])){
            $this->handleError();
        }
    }

    private function handleError(){
        if(isset($_GET['error'])){
            $hash = $_GET['error'];
            $errors = new Errors();

            if($errors->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $errors->get($hash));
                $this->d['error'] = $errors->get($hash);
            }else{
                $this->d['error'] = NULL;
            }
        }
    }


    private function handleSuccess(){
        if(isset($_GET['success'])){
            $hash = $_GET['success'];
            $success = new Success();

            if($success->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $success->existsKey($hash));
                $this->d['success'] = $success->get($hash);
            }else{
                $this->d['success'] = NULL;
            }
        }
    }

    public function showMessages(){
        $this->showError();
        $this->showSuccess();
    }

    public function showError(){
        if(array_key_exists('error', $this->d)){
            echo '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error - </strong> '.$this->d['error'].'
            </div>';
        }
    }

    public function showSuccess(){
        if(array_key_exists('success', $this->d)){
            echo '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success - </strong> '.$this->d['success'].'
            </div>';
        }
    }
}

?>