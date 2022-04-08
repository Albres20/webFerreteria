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
            if($this->existPOST(['codigo', 'nombre', 'marca', 'buying_price', 'profit', 'selling_price', 'stock', 'inputImage', 'categoria'])){
                
                $codigo = $this->getPOST('codigo');
                $nombre = $this->getPOST('nombre');
                $marca = $this->getPOST('marca');
                $precio_compra = $this->getPOST('buying_price');
                $ganancia = $this->getPOST('profit');
                $precio_venta = $this->getPOST('selling_price');
                $stock = $this->getPOST('stock');
                $imagen = $this->getPOST('inputImage');
                $categoria = $this->getPOST('categoria');

                //validate data sin imagen requerida
                if($codigo == '' || empty($codigo) || $nombre == '' || empty($nombre) || 
                   $marca == '' || empty($marca) || $precio_compra == '' || empty($precio_compra) || $ganancia == '' || empty($ganancia) ||
                   $precio_venta == '' || empty($precio_venta) || $stock == '' || empty($stock) || 
                   $categoria == '' || empty($categoria)){
                    // error al validar datos
                    //$this->errorAtSignup('Campos vacios');
                    $this->redirect('productos', ['error' => Errors::ERROR_NEWPRODUCT_EMPTY]);
                }

                $ruta = URL.RQ."/image/imgproductos/default-product.png";

                $this->updatePhoto();

                $productosModel = new ProductosModel();
                $productosModel->setCodigo($codigo);
                $productosModel->setNombre($nombre);
                $productosModel->setMarca($marca);
                $productosModel->setPrecioCompra($precio_compra);
                $productosModel->setPrecioVenta($precio_venta);
                $productosModel->setStock($stock);
                $productosModel->setImagen($imagen);
                $productosModel->setidCategoria($categoria);

                /*$user = new UserModel();
                $user->setUsername($username);
                $user->setPassword($password);
                $user->setRole("user");*/
                
                if($productosModel->exists($codigo)){
                    //$this->errorAtSignup('Error al registrar el producto. Escribe un nombre o codigo diferente');
                    error_log('codigo del post'. $codigo);
                    $this->redirect('productos', ['error' => Errors::ERROR_SIGNUP_NEWPRODUCT_EXISTS]);
                    //return;
                }else if($productosModel->save()){
                    //$this->view->render('login/index');
                    $this->redirect('productos', ['success' => Success::SUCCESS_SIGNUP_NEWPRODUCT]);
                }else{
                    // $this->errorAtSignup('Error al registrar el usuario. Inténtalo más tarde');
                    //return; 
                    $this->redirect('productos', ['error' => Errors::ERROR_SIGNUP_NEWPRODUCT]);
                }
            }else{
                // error, cargar vista con errores
                //$this->errorAtSignup('Ingresa nombre de usuario y password');
                $this->redirect('productos', ['error' => Errors::ERROR_SIGNUP_NEWPRODUCT_EXISTS]);
            }
        }

        function updatePhoto(){
            if(isset($_FILES['imagen'])){

            
                $photo = $_FILES['imagen'];
    
                $target_dir = "public/img/photos/";
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