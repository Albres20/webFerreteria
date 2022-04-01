<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo URL.RQ?>image/logoht.png">
    
    <title>Hyt-Trading</title>
    <!-- cabecera -->
    <link rel="stylesheet" href="<?php echo URL.RQ?>css/cabecera.css">
    <!--=====================================
    PLUGINS DE JAVASCRIPT
    ======================================-->
    <!-- jQuery 3 -->
    <script src="<?php echo URL.RQ?>js/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo URL.RQ?>js/bootstrap/bootstrap.min.js"></script>
    <!-- SweetAlert 2 -->
    <script src="<?php echo URL.RQ?>js/sweetalert2/sweetalert2.all.js"></script>
    
</head>
<body>

    <header>

            <section class="contenedor">
                <div class="nombreTitulo">
                    TRADING E.I.R.L.
                </div>
                <div class="logo">
                    <img src="https://hyt-trading.com/wp-content/uploads/2021/03/hyt-logo-inicio.png" >
                </div>
            </section>
            <section class="franjaInferior">
                
            </section>
    </header>
    <section class="contenedorCuerpo">
        <section class="contenedorLogin">
            <div class="logoLogin">
                <img src="https://hyt-trading.com/wp-content/uploads/2021/03/hyt-logo-inicio.png" width="300px">
            </div>
            <?php $this->showMessages();?>
            <form action="<?php echo constant('URL'); ?>PrincipalController/authenticate" method="POST" id="Session" name="Session" class="form">
                <div><?php (isset($this->errorMessage))?  $this->errorMessage : '' ?></div>
                <div class="user">
                    <input name="username" id="username" type="text" placeholder="Usuario" autocomplete="off">
                </div>
                <div class="pass">
                    <input name="password" id="password" type="password" placeholder="Contraseña">
                </div>
                <div class="btn">
                    <button id="btnLogin" type="submit">Iniciar Sesión</button>
                </div>
                
            </form>
        </section>
    </section>
    <footer>
        <div class="contenedor">
            <div class="contactos">
                <div class="contenedorLocalizacion">
                    <div class="localizacion">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="letraLocalizacion">Av. Jamaica Mza.M Lote 3 <br>Urb. San Agustín 2da Etapa, Comas.</div> 
                </div>
                <div class="contenedorTelefono">    
                    <div class="telefono">
                        <i class="fa-solid fa-mobile-screen"></i>
                    </div>
                    <div class="numeroTelefono"><br>987330113</div> 
                </div>
                <div class="contenedorMensaje">
                    <div class="mensaje">
                        <i class="fa-solid fa-envelope"></i>
                    </div> 
                    <div class="mensajeCorreo">ventas@hyt-trading.com</div>
                </div>   
            </div>
            <div class="redes">
                 
                    
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/47fb3045a9.js" crossorigin="anonymous"></script>
</body>
</html>