<?php

class Errors{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    
    //const ERROR_ADMIN_NEWCATEGORY_EXISTS = "El nombre de la categoría ya existe, intenta otra";
    const ERROR_ADMIN_NEWUSER_EXISTS        = "1f8f0ae8963b16403c3ec9ebb851f156";
    const ERROR_ADMIN_UPDATEUSER            = "521a88b3fd90100f1d352020e1464693";
    const ERROR_EXPENSES_DELETE                 = "8f48a0845b4f8704cb7e8b00d4981233";
    const ERROR_EXPENSES_NEWEXPENSE             = "8f48a0845b4f8704cb7e8b00d4981233";
    const ERROR_EXPENSES_NEWEXPENSE_EMPTY       = "a5bcd7089d83f45e17e989fbc86003ed";
    const ERROR_USERS_UPDATEUSER                = "a540ab32c9299917d15fca7d4c5e83b8";
    const ERROR_USER_UPDATEBUDGET_EMPTY         = "807f75bf7acec5aa86993423b6841407";
    const ERROR_USER_UPDATENAME_EMPTY           = "0f0735f8603324a7bca482debdf088fa";
    const ERROR_USER_UPDATENAME                 = "98217b0c263b136bf14925994ca7a0aa";
    const ERROR_USER_UPDATEPASSWORD             = "365009a3644ef5d3cf7a229a09b4d690";
    const ERROR_USER_UPDATEPASSWORD_EMPTY       = "0f0735f8603324a7bca482debdf088fa";
    const ERROR_USER_UPDATEPASSWORD_ISNOTTHESAME = "27731b37e286a3c6429a1b8e44ef3ff6";
    const ERROR_USER_UPDATEPHOTO                 = "dfb4dc6544b0dae81ea132de667b2a5d";
    const ERROR_USER_UPDATEPHOTO_SIZE            = "3a6c3be360cbbff4866e67b9c8341afa";
    const ERROR_USER_UPDATEPHOTO_FORMAT          = "53f3554f0533aa9f20fbf46bd5328430";
    const ERROR_LOGIN_AUTHENTICATE               = "11c37cfab311fbe28652f4947a9523c4";
    const ERROR_LOGIN_AUTHENTICATE_EMPTY         = "2194ac064912be67fc164539dc435a42";
    const ERROR_LOGIN_AUTHENTICATE_DATA          = "bcbe63ed8464684af6945ad8a89f76f8";
    const ERROR_SIGNUP_NEWUSER                   = "1fdce6bbf47d6b26a9cd809ea1910222";
    const ERROR_SIGNUP_NEWUSER_EMPTY             = "a5bcd7089d83f45e17e989fbc86003ed";
    const ERROR_SIGNUP_NEWUSER_EXISTS            = "a74accfd26e06d012266810952678cf3";

    const ERROR_NEWPRODUCT_EMPTY                 = "e5fa27bcb1688ddf4c7f4850be7b524f";
    const ERROR_PRODUCT_UPDATEPHOTO              = "c5dc37de94913f1c8834099b9124fb66";
    const ERROR_PRODUCT_SIZEPHOTO                = "177fe6532a554bf5322c0462db2d8d67";
    const ERROR_SIGNUP_NEWPRODUCT_EXISTS         = "b2a3c9a3e0e891e27689c40a15f263be";
    const ERROR_SIGNUP_NEWPRODUCT                = "c049877d530419271c1578fe7553d215";
    const ERROR_PRODUCTS_UPDATEPRODUCT           = "e30704298d0a720dab3a209b9fd15bde";
    const ERROR_PRODUCTS_UPDATEDATOS            = "d8b486411f53620e4e155a5d30ef63f9";

    const ERROR_CATEGORIAS_UPDATECATEGORIA      = "1314834cef311fd06b1b6e21930e9575";
    const ERROR_ADMIN_DELETECATEGORIA          = "a977262f1a22dc88bb0db1ba693ccf18";
    const ERROR_ADMIN_NEWCATEGORY_EXISTS         = "680fa880f3d1afea9c53c84305eb9af3";
    const ERROR_ADMIN_DELETEPRODUCT              = "f854143580e95938a09a470d8cf06797";

    const ERROR_CLIENTENUM_NEWUSER_EXISTS       = "723050dd6dd920c25ee22714011e3204";
    const ERROR_CLIENTENOM_NEWUSER_EXISTS      = "8b89a8f6c838503a06cb31285358db07";
    const ERROR_SIGNUP_NEWCLIENTE_FAILED       = "4b652e6611c638275e33cb1e6e3fd53e";

    const ERROR_ADMIN_DELETEUSER               = "ef29f2baaee1461dc27bfc9aeec25290";

    const ERROR_EMPRESA_UPDATEPHOTO_FORMAT    = "53f3554f0533aa9f20fbf46bd5328430";
    const ERROR_EMPRESA_UPDATEPHOTO       = "dfb4dc6544b0dae81ea132de667b2a5d";
    const ERROR_EMPRESA_UPDATENAME        = "98217b0c263b136bf14925994ca7a0aa";
    const ERROR_EMPRESA_UPDATEDIRECCION  = "fbf456a4c3eca1362a4282fc3e5430e3";


    private $errorsList = [];

    public function __construct()
    {
        $this->errorsList = [
            Errors::ERROR_ADMIN_NEWUSER_EXISTS      => 'El nombre de usuario ya existe, intenta de nuevo',
            Errors::ERROR_ADMIN_UPDATEUSER          => 'No se pudo actualizar el usuario',
            Errors::ERROR_EXPENSES_DELETE           => 'Hubo un problema el eliminar el gasto, inténtalo de nuevo',
            Errors::ERROR_EXPENSES_NEWEXPENSE       => 'Hubo un problema al crear el gasto, inténtalo de nuevo',
            Errors::ERROR_EXPENSES_NEWEXPENSE_EMPTY => 'Los campos no pueden estar vacíos',
            Errors::ERROR_USERS_UPDATEUSER         => 'No se puede actualizar el usuario',
            Errors::ERROR_USER_UPDATEBUDGET_EMPTY   => 'El presupuesto no puede estar vacio o ser negativo',
            Errors::ERROR_USER_UPDATENAME_EMPTY     => 'El nombre no puede estar vacio o ser negativo',
            Errors::ERROR_USER_UPDATENAME           => 'No se puede actualizar los datos personales',
            Errors::ERROR_USER_UPDATEPASSWORD       => 'No se puede actualizar la contraseña',
            Errors::ERROR_USER_UPDATEPASSWORD_EMPTY => 'El nombre no puede estar vacio o ser negativo',
            Errors::ERROR_USER_UPDATEPASSWORD_ISNOTTHESAME => 'Los passwords no son los mismos',
            Errors::ERROR_USER_UPDATEPHOTO          => 'Hubo un error al actualizar la foto',
            Errors::ERROR_USER_UPDATEPHOTO_SIZE     => 'La foto no puede ser mayor a 2MB',
            Errors::ERROR_USER_UPDATEPHOTO_FORMAT   => 'El archivo no es una imagen',
            Errors::ERROR_LOGIN_AUTHENTICATE        => 'Hubo un problema al autenticarse',
            Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY  => 'Los parámetros para autenticar no pueden estar vacíos',
            Errors::ERROR_LOGIN_AUTHENTICATE_DATA   => 'Nombre de usuario y/o password incorrectos',
            Errors::ERROR_SIGNUP_NEWUSER            => 'Hubo un error al intentar registrarte. Intenta de nuevo',
            Errors::ERROR_SIGNUP_NEWUSER_EMPTY      => 'Los campos no pueden estar vacíos',
            Errors::ERROR_SIGNUP_NEWUSER_EXISTS     => 'El nombre de usuario ya existe, selecciona otro',
            
            Errors::ERROR_NEWPRODUCT_EMPTY           => 'Algunos de los campos no pueden estar vacíos',
            Errors::ERROR_PRODUCT_UPDATEPHOTO       => 'Hubo un error al actualizar la foto',
            Errors::ERROR_PRODUCT_SIZEPHOTO         => 'La foto debe ser menor a 2MB',
            Errors::ERROR_SIGNUP_NEWPRODUCT_EXISTS  => 'El nombre de producto ya existe, selecciona otro',
            Errors::ERROR_SIGNUP_NEWPRODUCT        => 'Hubo un error al intentar registrar. Intenta de nuevo',
            Errors::ERROR_PRODUCTS_UPDATEPRODUCT   => 'Hubo un error al intentar actualizar el producto. Intenta de nuevo',
            Errors::ERROR_ADMIN_DELETEPRODUCT      => 'Hubo un error al intentar eliminar el producto. Intenta de nuevo',
            Errors::ERROR_PRODUCTS_UPDATEDATOS    => 'Hubo un error al intentar actualizar los datos. Intenta de nuevo',

            Errors::ERROR_CATEGORIAS_UPDATECATEGORIA => 'Hubo un error al intentar actualizar la categoria. Intenta de nuevo',
            Errors::ERROR_ADMIN_NEWCATEGORY_EXISTS  => 'La categoría ya existe, selecciona otra',
            Errors::ERROR_ADMIN_DELETECATEGORIA    => 'Hubo un error al intentar eliminar la categoria. Intenta de nuevo',

            Errors::ERROR_CLIENTENUM_NEWUSER_EXISTS => 'El número de documento ya existe, selecciona otro',
            Errors::ERROR_CLIENTENOM_NEWUSER_EXISTS => 'El nombre de cliente / proveedor ya existe, selecciona otro',
            Errors::ERROR_SIGNUP_NEWCLIENTE_FAILED => 'Hubo un error al intentar registrar. Intenta de nuevo',

            Errors::ERROR_ADMIN_DELETEUSER         => 'Hubo un error al intentar eliminar el usuario',

            Errors::ERROR_EMPRESA_UPDATEPHOTO_FORMAT => 'El archivo no es una imagen',
            Errors::ERROR_EMPRESA_UPDATEPHOTO       => 'Hubo un error al actualizar la foto',
            Errors::ERROR_EMPRESA_UPDATENAME        => 'Hubo un error al actualizar el nombre o razon social',
            Errors::ERROR_EMPRESA_UPDATEDIRECCION  => 'Hubo un error al actualizar la dirección',
        ];
    }

    function get($hash){
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}
?>