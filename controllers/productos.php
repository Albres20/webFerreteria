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
                'productos' => $this->getProductosDB()
            ]);
        /*$this->view->render('admin/usuarios', [
                "usuarios" => $usuarios
            ]);*/
        //$this->view->render('admin/usuarios');
        }

        private function getProductosDB(){
            $res = [];

            $productoModel = new ProductosModel();
            $productos = $productoModel->getAll();

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
            /*if($this->existPOST(['username', 'password', 'fullname', 'email', 'role', 'estado'])){
                $username = $this->getPost('username');
                $password = $this->getPost('password');
                $fullname = $this->getPost('fullname');
                $email = $this->getPost('email');
                $role = $this->getPost('role');
                $estado = $this->getPost('estado');
    
                $userModel = new UserModel();
    
                if(!$userModel->exists($username)){
                    $userModel->setUsername($username);
                    $userModel->setPassword($password);
                    $userModel->setFullname($fullname);
                    $userModel->setEmail($email);
                    $userModel->setRole($role);
                    $userModel->setEstado($estado);
                    $userModel->save();
                    error_log('Admin::newUsuarios() => new usuario creado');
                    $this->redirect('usuarios', ['success' => Success::SUCCESS_ADMIN_NEWUSER]);
                }else{
                    $this->redirect('usuarios', ['error' => Errors::ERROR_ADMIN_NEWUSER_EXISTS]);
                }
            }*/
        }
    }
?>