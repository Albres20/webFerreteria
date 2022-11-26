<?php
class Productos extends SessionController
{

    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Gestion de productos ::constructor() ");
    }

    function render()
    {
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
            $expenses = $joinExpensesCategoriesModel->getAll($this->user->getprd_codigo());
    
            foreach ($expenses as $expense) {
                array_push($res, $expense->getNameCategory());
            }
            $res = array_values(array_unique($res));
    
            return $res;
        }*/
    private function getCategoriasDB()
    {
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

    private function getProductosDB()
    {
        $res = [];

        $joinproductoscategoriasModel = new Productosmodel();
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

    function newProductos()
    {
        error_log('Admin::newProductos()');
        if ($this->existPOST([
            'productos_codigo', 'productos_nombre', 'productos_marca', 'productos_preccompra',
            'productos_precventa', 'productos_cantidad', 'productos_idcategorias'
        ])) {

            $codigo = $this->getPost('productos_codigo');
            //json_encode($codigo);
            $nombre = $this->getPost('productos_nombre');
            $marca = $this->getPost('productos_marca');
            $precio_compra = $this->getPost('productos_preccompra');
            $precio_venta = $this->getPost('productos_precventa');
            $stock = $this->getPost('productos_cantidad');
            //$imagen = $this->getPost('productos_imagen');
            $categoria = $this->getPost('productos_idcategorias');

            $ruta = "";

            //$this->updatePhoto();
            $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
            $productosModel = new ProductosModel();
            //error_log("Admin::newProductos() :: productosModel -> ". $_FILES['productos_imagen']['name']);

            if (isset($_FILES["productos_imagen"]["tmp_name"]) && in_array($_FILES["productos_imagen"]["type"], $permitidos)) {

                $photo = $_FILES['productos_imagen'];

                $target_dir = RQ . "image/imgproductos/";
                $extarr = explode('.', $photo["name"]);
                $filename = $extarr[sizeof($extarr) - 2];
                $ext = $extarr[sizeof($extarr) - 1];
                $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
                $target_file = $target_dir . $hash;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                $check = getimagesize($photo["tmp_name"]);
                if ($check !== false) {
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

                        //$this->model->updatePhoto($hash, $this->user->getprd_codigo());
                        $ruta = $hash;

                        $this->redirect('productos', ['success' => Success::SUCCESS_PRODUCT_UPDATEPHOTO]);
                    } else {
                        $this->redirect('productos', ['error' => Errors::ERROR_PRODUCT_UPDATEPHOTO]);
                    }
                }
            }

            $productosModel->setprd_codigo($codigo);
            $productosModel->setprd_nombre($nombre);
            $productosModel->setdpr_marca($marca);
            $productosModel->setdpr_prec_compra($precio_compra);
            $productosModel->setdpr_prec_prod($precio_venta);
            $productosModel->setdpr_stock($stock);
            $productosModel->setprd_imagen($ruta);
            $productosModel->setcat_id($categoria);
            $productosModel->setprd_fec_creacion(date("Y-m-d H:i:s"));
            $productosModel->setdpr_fec_ult_modificacion(date("Y-m-d H:i:s"));

            error_log('Admin::newProductos() supuestos en la db por set -> ' . $productosModel->getprd_codigo() . ' - ' . $productosModel->getprd_nombre() . ' - ' . $productosModel->getdpr_marca() . ' - ' . $productosModel->getdpr_prec_compra() . ' - ' . $productosModel->getdpr_prec_prod() . ' - ' . $productosModel->getdpr_stock() . ' - ' . $productosModel->getprd_imagen() . ' - ' . $productosModel->getcat_id());

            if ($productosModel->exists($codigo)) {
                //$this->errorAtSignup('Error al registrar el producto. Escribe un nombre o codigo diferente');
                error_log('codigo del post que existe en la db -> ' . $codigo);
                $this->redirect('productos', ['error' => Errors::ERROR_SIGNUP_NEWPRODUCT_EXISTS]);
                //return;
            } else if ($productosModel->save()) {
                //$this->view->render('login/index');success
                $this->redirect('productos', ['success' => Success::SUCCESS_SIGNUP_NEWPRODUCT]);
            } else {
                // $this->errorAtSignup('Error al registrar el producto. Inténtalo más tarde');
                //return;
                error_log('codigo del post que no existe -> ' . $codigo);
                $this->redirect('productos', ['error' => Errors::ERROR_SIGNUP_NEWPRODUCT]);
            }
        } else {
            // error, cargar vista con errores
            //$this->errorAtSignup('Ingresa nombre de usuario y password');
            //error_log('no existe post de productos -> '.$this->getPost('codigo'). ' - '.$this->getPost('productos_iamgen'));
            $this->redirect('productos', ['error' => Errors::ERROR_SIGNUP_NEWPRODUCT_EXISTS]);
        }
    }

    function updatePhoto()
    {
        if (isset($_FILES['inputImage'])) {


            $photo = $_FILES['inputImage'];

            $target_dir = URL . RQ . "image/imgproductos/";
            $extarr = explode('.', $photo["name"]);
            $filename = $extarr[sizeof($extarr) - 2];
            $ext = $extarr[sizeof($extarr) - 1];
            $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
            $target_file = $target_dir . $hash;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($photo["tmp_name"]);
            if ($check !== false) {
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

                    //$this->model->updatePhoto($hash, $this->user->getprd_codigo());

                    $this->redirect('productos', ['success' => Success::SUCCESS_PRODUCT_UPDATEPHOTO]);
                } else {
                    $this->redirect('productos', ['error' => Errors::ERROR_PRODUCT_UPDATEPHOTO]);
                }
            }
        }
    }

    //update producto
    function updateProductos($params)
    {
        if ($params === NULL) $this->redirect('productos', ['error' => Errors::ERROR_PRODUCTS_UPDATEPRODUCT]);
        $id = $params[0];
        error_log("productos::updateProductos() id = " . $id);

        if ($this->existPOST([
            'productos_codigo', 'productos_nombre', 'productos_marca', 'productos_preccompra',
            'productos_precventa', 'productos_cantidad', 'productos_idcategorias'])) {
            $codigo = $this->getPost('productos_codigo');
            //json_encode($codigo);
            $nombre = $this->getPost('productos_nombre');
            $marca = $this->getPost('productos_marca');
            $precio_compra = $this->getPost('productos_preccompra');
            $precio_venta = $this->getPost('productos_precventa');
            $stock = $this->getPost('productos_cantidad');
            //$imagen = $this->getPost('productos_imagen'); solo actualizare los datos
            $categoria = $this->getPost('productos_idcategorias');

            $ruta = "";

            //$this->updatePhoto();
            $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
            $productosModel = new ProductosModel();
            //error_log("Admin::newProductos() :: productosModel -> ". $_FILES['productos_imagen']['name']);

            if (isset($_FILES["productos_imagen"]["tmp_name"]) && in_array($_FILES["productos_imagen"]["type"], $permitidos)) {

                $photo = $_FILES['productos_imagen'];

                $target_dir = RQ . "image/imgproductos/";
                $extarr = explode('.', $photo["name"]);
                $filename = $extarr[sizeof($extarr) - 2];
                $ext = $extarr[sizeof($extarr) - 1];
                $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
                $target_file = $target_dir . $hash;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                $check = getimagesize($photo["tmp_name"]);
                if ($check !== false) {
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

                        //$this->model->updatePhoto($hash, $this->user->getprd_codigo());
                        $ruta = $hash;

                        $this->redirect('productos', ['success' => Success::SUCCESS_PRODUCT_UPDATEPHOTO]);
                    } else {
                        $this->redirect('productos', ['error' => Errors::ERROR_PRODUCT_UPDATEPHOTO]);
                    }
                }
            }

            $productosModel->get($id);
            //error_log("productos::Productos() :: productosModel -> " . $productosModel->getprd_codigo() . " - " . $productosModel->getprd_codigo() . " - " . $productosModel->getNombre() . " - " . $productosModel->getMarca() . " - " . $productosModel->getPrecioCompra() . " - " . $productosModel->getPrecioVenta() . " - " . $productosModel->getStock() . " - " . $productosModel->getImagen() . " - " . $productosModel->getprd_codigoCategoria());
            $productosModel->setprd_codigo($codigo);
            $productosModel->setprd_nombre($nombre);
            $productosModel->setdpr_marca($marca);
            $productosModel->setdpr_prec_compra($precio_compra);
            $productosModel->setdpr_prec_prod($precio_venta);
            //$productosModel->setGanancia(0);
            $productosModel->setdpr_stock($stock);
            $productosModel->setprd_imagen($ruta);
            $productosModel->setcat_id($categoria);

            //error_log("productos::updateProductos() :: productosModel -> " . $productosModel->getprd_codigo() . " - " . $productosModel->getprd_codigo() . " - " . $productosModel->getNombre() . " - " . $productosModel->getMarca() . " - " . $productosModel->getPrecioCompra() . " - " . $productosModel->getPrecioVenta() . " - " . $productosModel->getStock() . " - " . $productosModel->getImagen() . " - " . $productosModel->getprd_codigoCategoria());

            if ($productosModel->update()){
                error_log('Admin::updateProductos() => producto actualizado: ' . $productosModel->getprd_codigo());
                $this->redirect('productos', ['success' => Success::SUCCESS_PRODUCT_UPDATE]);
            } else {
                // Error al actualizar el producto. Inténtalo más tarde
                $this->redirect('productos', ['error' => Errors::ERROR_PRODUCTS_UPDATEPRODUCT]);
            }
        } else {
            //'No se puede actualizar los datos del producto'
            $this->redirect('productos', ['error' => Errors::ERROR_PRODUCTS_UPDATEDATOS]);
            return;
        }
    }

    function delete($params)
    {
        error_log("productos::delete()");

        if ($params === NULL) $this->redirect('productos', ['error' => Errors::ERROR_ADMIN_DELETEPRODUCT]);
        $id = $params[0];
        error_log("productos::delete() id = " . $id);
        $productosModel = new ProductosModel();
        //$res = $userModel->delete($id);

        if ($productosModel->exists($id)) {
            $productosModel->delete($id);
            $this->redirect('productos', ['success' => Success::SUCCESS_ADMIN_DELETEPRODUCT]);
            //$this->redirect('usuarios', ['success' => Success::SUCCESS_EXPENSES_DELETE]);
        } else {
            $this->redirect('productos', ['error' => Errors::ERROR_ADMIN_DELETEPRODUCT]);
            //$this->redirect('usuarios', ['error' => Errors::ERROR_ADMIN_NEWCATEGORY_EXISTS]);
        }
    }
}
