<?php
require_once 'Controllers/ErrorController.php';

class Principal{

    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        //var_dump($url);
        /*
            controlador->[0]
            metodo->[1]
            parameter->[2]
        */
        $url = explode('/', $url);

        // cuando se ingresa sin definir controlador
        if(empty($url[0])){
            $archivoController = 'Controllers/PrincipalController.php';
            require_once $archivoController;
            $controller = new PrincipalController();
            $controller->loadModel('Principal');
            $controller->render();
            return false;
        }
        $archivoController = 'Controllers/' . $url[0] . '.php';

        if(file_exists($archivoController)){
            require_once $archivoController;

            // inicializar controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            // si hay un método que se requiere cargar
            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        //el método tiene parámetros
                        //sacamos e # de parametros
                        $nparam = sizeof($url) - 2;
                        //crear un arreglo con los parametros
                        $params = [];
                        //iterar
                        for($i = 0; $i < $nparam; $i++){
                            array_push($params, $url[$i + 2]);
                        }
                        //pasarlos al metodo   
                        $controller->{$url[1]}($params);
                    }else{
                        $controller->{$url[1]}();    
                    }
                }else{
                    $controller = new ErrorController(); // si no existe el metodo
                }
            }else{
                $controller->render(); // si no hay metodo, renderizar vista por defecto
            }
        }else{
            $controller = new ErrorController(); // si no existe el controlador
        }
    }
}

?>