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
        //error_log("Gestion de productos::getCategoriasDB() " . json_encode($res));
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
            //error_log("productos::Productos() :: productosModel -> " . $productosModel->getprd_codigo() . " - " . $productosModel->getprd_nombre() . " - " . $productosModel->getdpr_marca() . " - " . $productosModel->getdpr_prec_compra() . " - " . $productosModel->getdpr_prec_prod() . " - " . $productosModel->getdpr_stock() . " - " . $productosModel->getprd_imagen() . " - " . $productosModel->getcat_id());
            $codigoAnterior = $productosModel->getprd_codigo();
            error_log("productos::Productos() :: codigo anterior -> " . $codigoAnterior . " - codigo nuevo -> " . $codigo);
            
            $productosModel->setprd_codigo($codigo);
            $productosModel->setprd_nombre($nombre);
            $productosModel->setdpr_marca($marca);
            $productosModel->setdpr_prec_compra($precio_compra);
            $productosModel->setdpr_prec_prod($precio_venta);
            $productosModel->setdpr_stock($stock);
            $productosModel->setprd_imagen($ruta);
            $productosModel->setcat_id($categoria);
            $productosModel->setdpr_fec_ult_modificacion(Date('Y-m-d H:i:s'));

            if($productosModel->exists($codigo) && $codigoAnterior != $codigo){
                $this->redirect('productos', ['error' => Errors::ERROR_PRODUCT_EXISTS]);
                
            }else if ($productosModel->update1($codigoAnterior)){
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

    //nueva categoria json
    function newCategoria(){
        error_log("productos::newCategoria()");
        $data = [];

        if($this->existPOST(['categorias_nombre', 'categorias_color'])){
            $categorias_nombre = $this->getPost('categorias_nombre');
            $categorias_color = $this->getPost('categorias_color');

            $categoriasModel = new CategoriasModel();

            if(!$categoriasModel->exists($categorias_nombre)){
                $categoriasModel->setcat_nombre($categorias_nombre);
                $categoriasModel->setcat_color($categorias_color);
                $categoriasModel->save();
                error_log('Admin::newCategorias() => new categoria creada');
                $data['success'] = true;
            }else{
                $data['success'] = false;
            }
            echo json_encode($data);
        }
    }
}
