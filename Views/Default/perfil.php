<?php
$user = $this->d['user'];
//getModal();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Admin - Hyt-Trading</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Hyt-Trading" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo URL . RQ ?>assets/images/favicon.ico">

    <!-- third party css -->
    <link href="<?php echo URL . RQ ?>assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL . RQ ?>assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="<?php echo URL . RQ ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL . RQ ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="<?php echo URL . RQ ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <?php include_once 'header.php'; ?>
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Perfil</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Perfil</h4>
                    </div>
                </div>
                <div id="main-container">
                    <?php $this->showMessages(); ?>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card text-center">
                        <div class="card-body">
                        <?php if(   $user->getPhoto() != ""){
                            echo '<img src="'.URL . RQ .'image/usuarios/'. $user->getPhoto() . '" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">';
                            }else{
                            echo '<img src="'.URL . RQ .'image/usuarios/default-user-image.png" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">';
                        }
                        ?>
                            <h4 class="mb-0 mt-2"><?php echo $user->getFullname(); ?></h4>

                            <div class="text-start mt-3">
                                <h4 class="font-13 text-uppercase">Información Personal :</h4>

                                <p class="text-muted mb-1 font-13"><strong>Usuario :</strong> <span class="ms-2"><?php echo $user->getUsername(); ?></span></p>

                                <p class="text-muted mb-2 font-13"><strong>Nombre Completo :</strong> <span class="ms-2"><?php echo $user->getFullname(); ?></span></p>

                                <p class="text-muted mb-2 font-13"><strong>Correo Electrónico :</strong><span class="ms-2"><?php echo $user->getEmail(); ?></span></p>

                                <p class="text-muted mb-1 font-13"><strong>Acceso :</strong> <span class="ms-2"><?php echo $user->getRole(); ?></span></p>
                            </div>

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                </div> <!-- end col-->

                <div class="col-xl-8 col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                <li class="nav-item">
                                    <a href="#settings" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                        Datos Personales
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#password" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                        Contraseña
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane show active" id="settings">
                                    <form id="formdatos" name="formdatospersonales" action=<?php echo constant('URL'). 'perfil/updateDatosPersonales'?> class="needs-validation" method="POST" novalidate>
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Información Personal</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Nombres</label>
                                                    <input type="text" class="form-control" id="usuario" name="nombre" placeholder="Ingrese el nombre" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcine un nombre válido.
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationTooltip02">Apellidos</label>
                                                    <input type="text" class="form-control" id="validationTooltip02" name="apellido" placeholder="Ingrese el apellido"  required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcione su apellido válido.
                                                </div>
                                            </div><!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Correo Electrónico</label>
                                                    <input type="email" class="form-control" id="useremail" name="email" placeholder="Ingrese el correo" value="<?php echo $user->getEmail(); ?>" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcione un correo válido.
                                                </div>
                                            </div>
                                        </div> <!-- end row -->

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Guardar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end timeline content-->

                                <div class="tab-pane" id="password">
                                    <form id="formpassword" action=<?php echo constant('URL'). 'perfil/updatePassword'?> class="needs-validation" method="POST" novalidate>
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Cambiar contraseña</h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationTooltip01">Contraseña Actual</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="validationTooltip01" name="current_password" placeholder="Ingrese la contraseña actual" required>
                                                        <div class="input-group-text" data-password="false">
                                                            <span class="password-eye"></span>
                                                        </div>
                                                        <div class="invalid-tooltip">
                                                            Propocione una contraseña valida.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationTooltip012">Nueva Contraseña</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="validationTooltip012" name="new_password" placeholder="Ingrese la nueva contraseña" required>
                                                        <div class="input-group-text" data-password="false">
                                                            <span class="password-eye"></span>
                                                        </div>
                                                        <div class="invalid-tooltip">
                                                            Propocione una contraseña valida.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Guardar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end settings content-->

                            </div> <!-- end tab-content -->
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Hyper - Coderthemes.com
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-md-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="end-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar="">

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1">

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked="">
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>


                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1">
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked="">
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>


                <!-- Left Sidebar-->
                <h5 class="mt-4">Left Sidebar</h5>
                <hr class="mt-1">
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                    <label class="form-check-label" for="default-check">Default</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked="">
                    <label class="form-check-label" for="light-check">Light</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                    <label class="form-check-label" for="dark-check">Dark</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked="">
                    <label class="form-check-label" for="fixed-check">Fixed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                    <label class="form-check-label" for="condensed-check">Condensed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                    <label class="form-check-label" for="scrollable-check">Scrollable</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

                    <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                </div>
            </div> <!-- end padding-->

        </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/app.min.js"></script>

</body>

</html>