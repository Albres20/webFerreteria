<?php
    class Categorias extends SessionController{

        private $user;
    
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            error_log("Gestion de categorias ::constructor() ");
        }
    
        function render(){
            error_log("Gestion de categorias::RENDER() ");

            $this->view->render('admin/categorias', [
                'user' => $this->user,
                'categorias' => $this->getCategoriasDB(),
                "stats" => $this->getStatistics()
            ]);
        /*$this->view->render('admin/usuarios', [
                "usuarios" => $usuarios
            ]);*/
        //$this->view->render('admin/usuarios');
        }

        function newCategorias(){
            error_log('Admin::newCategorias()');
            if($this->existPOST(['categorias_nombre', 'categorias_color'])){
                $categorias_nombre = $this->getPost('categorias_nombre');
                $categorias_color = $this->getPost('categorias_color');

                $categoriasModel = new CategoriasModel();

                if(!$categoriasModel->exists($categorias_nombre)){
                    $categoriasModel->setCategorias_nombre($categorias_nombre);
                    $categoriasModel->setCategorias_color($categorias_color);
                    $categoriasModel->save();
                    error_log('Admin::newCategorias() => new categoria creada');
                    $this->redirect('categorias', ['success' => Success::SUCCESS_ADMIN_NEWCATEGORY]);
                }else{
                    $this->redirect('categorias', ['error' => Errors::ERROR_ADMIN_NEWCATEGORY_EXISTS]);
                }
            }
        }

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
        private function getStatistics(){
            $res = [];
            $productosModel = new Productosmodel();
            $productos = $productosModel->getAll();

            //$res['mostused-category'] = $this->getCategoryForProduct($productos);
            foreach ($productos as $producto) {
                $categoriaarray = [];
                $categoriaarray['mostused-category'] = $producto;
                //$res['mostused-category'] = $producto->getcontarPorCategoria($producto->getIdCategoria());

                array_push($res, $categoriaarray);
            }
            return $res;
        }

        private function getCategoryForProduct($productos){
            $res = [];
            foreach ($productos as $producto) {
                $res[$producto->getcontarPorCategoria()];
            }
    
            return ($res);
        }
        /////////////////////////////////////////////
        //ACTUALIZAR CATEGORIA
        /////////////////////////////////////////////

        function updateCategoria($params){
            if($params === NULL) $this->redirect('categorias', ['error' => Errors::ERROR_CATEGORIAS_UPDATECATEGORIA]);
            $id = $params[0];
            error_log("categorias::updateCategoria() id = " . $id);
            error_log('categorias::updateCategoria()');
            if($this->existPOST(['categorias_nombre', 'categorias_color'])){
                $categorias_nombre = $this->getPost('categorias_nombre');
                $categorias_color = $this->getPost('categorias_color');
    
                $categoriasModel = new CategoriasModel();

                $categoriasModel->get($id);
                $categoriasModel->setCategorias_nombre($categorias_nombre);
                $categoriasModel->setCategorias_color($categorias_color);
    
                if($categoriasModel->update()){
                    error_log('Admin::updateCategoria() => categoria actualizado: ' . $categoriasModel->getId());
                    $this->redirect('categorias', ['success' => Success::SUCCESS_ADMIN_UPDATECATEGORIA]);
                }else{
                    //error
                    $this->redirect('categorias', ['error' => Errors::ERROR_ADMIN_UPDATECATEGORIA]);
                }
            }else{
                //'No se puede actualizar los datos de la categoria'
                $this->redirect('categorias', ['error' => Errors::ERROR_ADMIN_UPDATECATEGORIA]);
                return;
            }
        }

        function delete($params){
            error_log("categorias::delete()");
            
            if($params === NULL) $this->redirect('categorias', ['error' => Errors::ERROR_ADMIN_DELETECATEGORIA]);
            $id = $params[0];
            error_log("categorias::delete() id = " . $id);
            $categoriasModel = new CategoriasModel();
    
            if($categoriasModel->existsID($id)){
                $categoriasModel->delete($id);
                $this->redirect('categorias', ['success' => Success::SUCCESS_ADMIN_DELETECATEGORIA]);
            }else{
                $this->redirect('categorias', ['error' => Errors::ERROR_ADMIN_DELETECATEGORIA]);
            }
        }
    }