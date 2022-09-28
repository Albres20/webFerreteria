<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <title>Hyt-Trading</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Hyt-Trading" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo URL . RQ ?>assets/images/favicon.ico">
    
    <title>Hyt-Trading</title>
    <!-- App css -->
    <link href="<?php echo URL . RQ ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL . RQ ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="<?php echo URL . RQ ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
    <!-- cabecera -->
    <link href="<?php echo URL.RQ?>css/cabecera.css" rel="stylesheet">
    
</head>
<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- ID Particles.js -->
    <div id="particles-js"></div>
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4 text-white  shadow detalleImagen d-none d-sm-block  d-sm-none d-md-block">
                <div class="row justify-content-center align-items-center">
                    <img src="https://hyt-trading.com/wp-content/uploads/2021/03/hyt-logo-inicio.png" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4 bg-dark text-white rounded p-4 shadow">
                <div class="row justify-content-center mb-4">
                    <h3>TRADING E.I.R.L.</h3>
                    <form action="<?php echo constant('URL'); ?>login/authenticate" method="POST" id="Session" name="Session" class="form">
                        <div><?php (isset($this->errorMessage))?  $this->errorMessage : '' ?></div>
                        <div class="mb-4">
                            <label for="username" class="form-label">Usuario:</label>
                            <input name="username" class="form-control" id="username" type="text" autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Contraseña:</label>
                            <div class="input-group input-group-merge">
                                <input name="password" class="form-control" id="password" type="password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label for="remember" class="form-check-label">Recordar</label>
                        </div>
                        <button id="btnLogin" type="submit" class="btn btn-warning w-100">Iniciar Sesión</button>
                    </form>
                    <p class="mt-4 text-center"><a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--=====================================
    PLUGINS DE JAVASCRIPT
    ======================================-->
    <!-- bundle -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/app.min.js"></script>
    <!-- particles.js -->
    <script src="<?php echo URL.RQ?>js/login/particles.min.js"></script>
    <script src="<?php echo URL.RQ?>js/login/app.js"></script>

</body>
</html>