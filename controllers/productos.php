<?php
    class Productos extends SessionController{

        private $user;
    
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log("Gestion de productos ::constructor() ");
        }
    
        function render(){
            error_log("Gestion de productos::RENDER() ");
    
            $this->view->render('admin/productos', [
                'user' => $this->user,
                'productos' => $this->getProductosDB(),
                'categorias' => $this->getCategoriasDB()
            ]);
        /*$this->view->render('admin/usuarios', [
                "usuarios" => $usuarios
            ]);*/
        //$this->view->render('admin/usuarios');
        }
        
        /* function getCategoryList(){
            $res = [];
            $joinExpensesCategoriesModel = new JoinExpensesCategoriesModel();
            $expenses = $joinExpensesCategoriesModel->getAll($this->user->getId());
    
            foreach ($expenses as $expense) {
                array_push($res, $expense->getNameCategory());
            }
            $res = array_values(array_unique($res));
    
            return $res;
        }*/
        private function getCategoriasDB(){
            $res = [];

            $categoriasModel = new CategoriasModel();
            $categorias = $categoriasModel->getAll();

            foreach ($categorias as $categoria) {
                $categoriaarray = [];
                $categoriaarray['categoria'] = $categoria;
                // $categoryArray['total'] = $total;
                // $categoryArray['count'] = $numberOfExpenses;
                // $categoryArray['category'] = $category;
    
                 array_push($res, $categoriaarray);
             }
            //$res = array_values(array_unique($res));
    
            return $res;
        }

        private function getProductosDB(){
            $res = [];

            $joinproductoscategoriasModel = new JoinProductosCategoriasModel();
            $productos = $joinproductoscategoriasModel->getAll();

            foreach ($productos as $producto) {
                $productosarray = [];
                $productosarray['producto'] = $producto;
                // $categoryArray['total'] = $total;
                // $categoryArray['count'] = $numberOfExpenses;
                // $categoryArray['category'] = $category;
    
                 array_push($res, $productosarray);
             }
            //$res = array_values(array_unique($res));
    
            return $res;
        }

        function newProductos(){
            error_log('Admin::newProductos()');
            if($this->existPOST(['productos_codigo','productos_nombre', 'productos_marca', 'productos_preccompra', 'productos_ganancia', 
            'productos_precventa', 'productos_cantidad', 'productos_idcategorias'])){
                
                $codigo = $this->getPost('productos_codigo');
                //json_encode($codigo);
                $nombre = $this->getPost('productos_nombre');
                $marca = $this->getPost('productos_marca');
                $precio_compra = $this->getPost('productos_preccompra');
                $ganancia = $this->getPost('productos_ganancia');
                $precio_venta = $this->getPost('productos_precventa');
                $stock = $this->getPost('productos_cantidad');
                //$imagen = $this->getPost('productos_imagen');
                $categoria = $this->getPost('productos_idcategorias');

                $ruta ="";

                //$this->updatePhoto();
                $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                $productosModel = new ProductosModel();
                //error_log("Admin::newProductos() :: productosModel -> ". $_FILES['productos_imagen']['name']);

                if(isset($_FILES["productos_imagen"]["tmp_name"]) && in_array($_FILES["productos_imagen"]["type"], $permitidos)){

                    $photo = $_FILES['productos_imagen'];
    
                    $target_dir = RQ."image/imgproductos/";
                    $extarr = explode('.', $photo["name"]);
                    $filename = $extarr[sizeof($extarr)-2];
                    $ext = $extarr[sizeof($extarr)-1];
                    $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
                    $target_file = $target_dir . $hash;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                    $check = getimagesize($photo["tmp_name"]);
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        //echo "File is not an image.";
                        $uploadOk = 0;
                    }
        
                    if ($uploadOk == 0) {
                        //echo "Sorry, your file was not uploaded.";
                        $this->redirect('productos', ['error' => Errors::ERROR_USER_UPDATEPHOTO_FORMAT]);
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($photo["tmp_name"], $target_file)) {
    
                            //$this->model->updatePhoto($hash, $this->user->getId());
                            $ruta = $hash;
    
                            $this->redirect('productos', ['success' => Success::SUCCESS_PRODUCT_UPDATEPHOTO]);
                        } else {
                            $this->redirect('productos', ['error' => Errors::ERROR_PRODUCT_UPDATEPHOTO]);
                        }
                    }
                }

                $productosModel->setCodigo($codigo);
                $productosModel->setNombre($nombre);
                $productosModel->setMarca($marca);
                $productosModel->setPrecioCompra($precio_compra);
                $productosModel->setPrecioVenta($precio_venta);
                $productosModel->setGanancia($ganancia);
                $productosModel->setStock($stock);
                $productosModel->setImagen($ruta);
                $productosModel->setidCategoria($categoria);
                error_log('Admin::newProductos() supuestos en la db por set -> '.$productosModel->getCodigo().' - '.$productosModel->getNombre().' - '.$productosModel->getMarca().' - '.$productosModel->getPrecioCompra().' - '.$productosModel->getPrecioVenta().' - '.$productosModel->getGanancia().' - '.$productosModel->getStock().' - '.$productosModel->getImagen().' - '.$productosModel->getidCategoria());
                
                if($productosModel->exists($codigo)){
                    //$this->errorAtSignup('Error al registrar el producto. Escribe un nombre o codigo diferente');
                    error_log('codigo del post que existe en la db -> '. $codigo);
                    $this->redirect('productos', ['error' => Errors::ERROR_SIGNUP_NEWPRODUCT_EXISTS]);
                    //return;
                }else if($productosModel->save()){
                    //$this->view->render('login/index');success
                    $this->redirect('productos', ['success' => Success::SUCCESS_SIGNUP_NEWPRODUCT]);
                }else{
                    // $this->errorAtSignup('Error al registrar el producto. Int??ntalo m??s tarde');
                    //return;
                    error_log('codigo del post que no existe -> '. $codigo); 
                    $this->redirect('productos', ['error' => Errors::ERROR_SIGNUP_NEWPRODUCT]);
                }
            }else{
                // error, cargar vista con errores
                //$this->errorAtSignup('Ingresa nombre de usuario y password');
                //error_log('no existe post de productos -> '.$this->getPost('codigo'). ' - '.$this->getPost('productos_iamgen'));
                $this->redirect('productos', ['error' => Errors::ERROR_SIGNUP_NEWPRODUCT_EXISTS]);
            }
        }

        function updatePhoto(){
            if(isset($_FILES['inputImage'])){

            
                $photo = $_FILES['inputImage'];
    
                $target_dir = URL.RQ."image/imgproductos/";
                $extarr = explode('.', $photo["name"]);
                $filename = $extarr[sizeof($extarr)-2];
                $ext = $extarr[sizeof($extarr)-1];
                $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
                $target_file = $target_dir . $hash;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
                $check = getimagesize($photo["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                }
    
                if ($uploadOk == 0) {
                    //echo "Sorry, your file was not uploaded.";
                    $this->redirect('productos', ['error' => Errors::ERROR_USER_UPDATEPHOTO_FORMAT]);
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($photo["tmp_name"], $target_file)) {

                        //$this->model->updatePhoto($hash, $this->user->getId());

                        $this->redirect('productos', ['success' => Success::SUCCESS_PRODUCT_UPDATEPHOTO]);
                    } else {
                        $this->redirect('productos', ['error' => Errors::ERROR_PRODUCT_UPDATEPHOTO]);
                    }
                }
            }
            
        }
    }
?>