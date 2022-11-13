<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Hyt-Trading</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Hyt-Trading" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo URL . RQ ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo URL . RQ ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URL . RQ ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="<?php echo URL . RQ ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    <link href="<?php echo URL . RQ ?>css/error.css" rel="stylesheet">
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div id="particles-js"></div>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header text-center bg-dark">
                            <a href="#">
                                <span><img src="<?php echo URL . RQ ?>image/logoht.png" alt="logo" height="80"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Restablecer la contraseña</h4>
                                <p class="text-muted mb-4">Ingrese su dirección de correo electrónico y le enviaremos un correo electrónico con instrucciones para restablecer su contraseña.</p>
                            </div>

                            <form class="needs-validation" action="recoverpw/recuperar" method="POST" novalidate>
                                <div class="position-relative mb-3">
                                    <label for="useremail" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="useremail" name="email" placeholder="Introduce tu correo electrónico" autocomplete="off" required>
                                    <div class="invalid-tooltip">
                                        Proporcione un correo válido.
                                    </div>
                                </div>
                                <div class="mb-0 text-center">
                                    <button class="btn btn-dark" type="submit">Restablecer la contraseña</button>
                                </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Regresar a <a href="login" class="text-muted ms-1"><b>Iniciar Sesión</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        <script>
            document.write(new Date().getFullYear())
        </script> © Hyt - Trading
    </footer>

    <!-- bundle -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/app.min.js"></script>
    <!-- particles.js -->
    <script src="<?php echo URL . RQ ?>js/login/particles.min.js"></script>
    <script src="<?php echo URL . RQ ?>js/login/app.js"></script>

</body>

</html>