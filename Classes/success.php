<?php

class Success{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    
    const SUCCESS_ADMIN_NEWUSER     = "f52228665c4f14c8695b194f670b0ef1";
    const SUCCESS_ADMIN_UPDATEUSER = "5792fc4c2ecad7183008c0c0a3ca66ee";
    const SUCCESS_ADMIN_DELETEUSER = "be76225b21ae9972f5ea1bbc805eb348";
    const SUCCESS_EXPENSES_DELETE       = "fcd919285d5759328b143801573ec47d";
    const SUCCESS_EXPENSES_NEWEXPENSE   = "fbbd0f23184e820e1df466abe6102955";
    const SUCCESS_USER_UPDATEDATOS     = "2ee085ac8828407f4908e4d134195e5c";
    const SUCCESS_USER_UPDATENAME       = "6fb34a5e4118fb823636ca24a1d21669";
    const SUCCESS_USER_UPDATEPASSWORD       = "6fb34a5e4118fb823636ca24a1d21669";
    const SUCCESS_USER_UPDATEPHOTO       = "edabc9e4581fee3f0056fff4685ee9a8";
    const SUCCESS_SIGNUP_NEWUSER       = "8281e04ed52ccfc13820d0f6acb0985a";

    const SUCCESS_ADMIN_DELETEPRODUCT = "016b5539c195ca7d60057809b89368b1";
    const SUCCESS_PRODUCT_UPDATEPHOTO = "8fc5692cfd8a119c5c102207cbfdcde8";
    const SUCCESS_PRODUCT_UPDATE = "83987dfafbf6f4d452130c6a6aebffe8";
    const SUCCESS_SIGNUP_NEWPRODUCT = "058511c88c073a0adf1fb3d67529c0c9";
    const SUCCESS_ADMIN_NEWCATEGORY = "7085d129f6bae935bc430885bbf2a25e";
    const SUCCESS_ADMIN_UPDATECATEGORY = "20fa9453ba6b7524a6665d40e5c05f66";
    const SUCCESS_ADMIN_DELETECATEGORIA = "195cf6568b96216d77e77caaf3870898";
    
    const SUCCESS_CLIENTE_NEWUSER = "2be8ec3653049b96e4faaf9b058050af";
    const SUCCESS_ADMIN_CLIENTEDELETE = "d9c260e3d763cc1639a7129ff84bf613";

    const SUCCESS_EMPRESA_UPDATEPHOTO = "4d23b94932c9e77056c6f10868f5d5b1";
    const SUCCESS_EMPRESA_UPDATEDATOS = "d8e79eb94050d26047d6f8cf56ad243b";
    const SUCCESS_EMPRESA_UPDATEDIRECCION = "3b9ddb95c9d9a2aa9538b6f0d6c2bea6";

    const SUCCESS_EMAIL_SEND = "74772f9091024b1c5aa4a52f0faa907b";
    
    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            Success::SUCCESS_ADMIN_NEWUSER => "Nuevo usuario creado correctamente",
            Success::SUCCESS_ADMIN_UPDATEUSER => "Usuario actualizado correctamente",
            Success::SUCCESS_ADMIN_DELETEUSER => "Usuario eliminado correctamente",
            Success::SUCCESS_EXPENSES_DELETE => "Gasto eliminado correctamente",
            Success::SUCCESS_EXPENSES_NEWEXPENSE => "Nuevo gasto registrado correctamente",
            Success::SUCCESS_USER_UPDATEDATOS => "Datos personales actualizados correctamente",
            Success::SUCCESS_USER_UPDATEPASSWORD => "Contraseña actualizado correctamente",
            Success::SUCCESS_USER_UPDATEPHOTO => "Imagen de usuario actualizada correctamente",
            Success::SUCCESS_SIGNUP_NEWUSER => "Usuario registrado correctamente",

            success::SUCCESS_ADMIN_DELETEPRODUCT => "Producto eliminado correctamente",
            Success::SUCCESS_PRODUCT_UPDATEPHOTO => "Imagen de producto actualizada correctamente",
            Success::SUCCESS_PRODUCT_UPDATE => "Producto actualizado correctamente",
            Success::SUCCESS_SIGNUP_NEWPRODUCT => "Producto registrado correctamente",
            Success::SUCCESS_ADMIN_NEWCATEGORY => "Categoria registrada correctamente",
            Success::SUCCESS_ADMIN_UPDATECATEGORY => "Categoria actualizada correctamente",
            Success::SUCCESS_ADMIN_DELETECATEGORIA => "Categoria eliminada correctamente",

            Success::SUCCESS_CLIENTE_NEWUSER => "Cliente / Proveedor registrado correctamente",
            Success::SUCCESS_ADMIN_CLIENTEDELETE => "Cliente / Proveedor eliminado correctamente",

            Success::SUCCESS_EMPRESA_UPDATEPHOTO => "Imagen de empresa actualizada correctamente",
            Success::SUCCESS_EMPRESA_UPDATEDATOS => "Datos de empresa actualizados correctamente",
            Success::SUCCESS_EMPRESA_UPDATEDIRECCION => "Dirección de empresa actualizada correctamente",

            Success::SUCCESS_EMAIL_SEND => "Correo enviado a su bandeja de entrada",
        ];
    }

    function get($hash){
        return $this->successList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }
}
?>