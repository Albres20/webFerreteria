<?php
$user = $this->d['user'];
$usuarios = $this->d['usuarios'];
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
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'header.php'; ?>
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="admin">Inicio</a></li>
                                <li class="breadcrumb-item active">Usuarios</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Usuarios</h4>
                    </div>
                </div>
                <div id="main-container">
                    <?php $this->showMessages(); ?>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalCRUD" class="btn btn-danger mb-2" value="btnNuevo"><i class="mdi mdi-plus-circle me-2"></i> Nuevo usuario</button>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end">
                                        <!-- <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button> -->
                                        <button type="button" class="btn btn-light mb-2 me-1">Importar</button>
                                        <button type="button" class="btn btn-light mb-2">Exportar</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-centered w-100 dt-responsive nowrap" id="users-datatable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th data-sort="id" class="all">ID</th>
                                            <th data-sort="username">Usuario</th>
                                            <th data-sort="fullname">Nombre Completo</th>
                                            <th data-sort="email">Correo</th>
                                            <th data-sort="role">Acceso</th>
                                            <th data-sort="estado">Estado</th>
                                            <th style="width: 85px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="databody">
                                        <?php
                                        if ($usuarios === NULL) {
                                            //showError('Datos no disponibles por el momento.');
                                        }
                                        foreach ($usuarios as $usuario) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <?php echo '<td>' . $usuario['usuario']->getId() . '</td>' ?>
                                                <td class="table-user">
                                                    <?php if ($usuario['usuario']->getPhoto() != "") {
                                                        echo '<img src="' . URL . RQ . 'image/usuarios/' . $usuario['usuario']->getPhoto() . '" alt="user-img" title="user-img" class="me-2 rounded-circle">'. $usuario['usuario']->getUsername().'';
                                                    } else {
                                                        echo '<img src="' . URL . RQ . 'image/usuarios/default-user-image.png" alt="user-img" title="user-img" class="me-2 rounded-circle">'. $usuario['usuario']->getUsername().'';
                                                    }
                                                    ?>
                                                </td>
                                                <?php echo '<td>' . $usuario['usuario']->getFullname() . '</td>' ?>
                                                <?php echo '<td>' . $usuario['usuario']->getEmail() . '</td>' ?>
                                                <?php echo '<td>' . $usuario['usuario']->getRole() . '</td>' ?>

                                                <?php if ($usuario['usuario']->getEstado() == 1) { ?>
                                                    <?php echo '<td><span class="badge bg-success">Activo</span>' ?>
                                                <?php } else { ?>
                                                    <?php echo '<td><span class="badge bg-danger">Inactivo</span></td>' ?>
                                                <?php } ?>

                                                <td class="table-action"></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Hyt - Trading
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



    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    <!--=====================================
    MODAL USUARIO
    ======================================-->
    <!-- Standard modal -->
    <div id="modalCRUD" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formuser" class="needs-validation" method="POST" novalidate>

                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="primary-header-modalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltipUsername">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                <input type="text" class="form-control" id="validationTooltipUsername" name="username" placeholder="Usuario" aria-describedby="validationTooltipUsernamePrepend" required>
                                <div class="invalid-tooltip">
                                    Proporcine un nombre de usuario único y válido.
                                </div>
                            </div>
                        </div>
                        <div class="position-relative mb-3 passw">
                            <label class="form-label" for="validationTooltip01">Mostrar/Ocultar contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="validationTooltip01" name="password" placeholder="Contraseña" required>
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                <div class="invalid-tooltip">
                                    Propocione una contraseña valida.
                                </div>
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip02">Nombre Completo</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="fullname" placeholder="Nombre Completo" required>
                            <div class="invalid-tooltip">
                                Proporcione su nombre completo.
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip03">Correo</label>
                            <input type="text" class="form-control" id="validationTooltip03" name="email" placeholder="Correo" required>
                            <div class="invalid-tooltip">
                                Proporcione un correo válido.
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip04">Acceso</label>
                            <select class="form-select" id="validationTooltip04" name="role" required>
                                <option value="">Seleccione una opción</option>
                                <option class="fw-bold" value="admin">Administrador</option>
                                <option class="fw-bold" value="logistica">Logistica</option>
                                <option class="fw-bold" value="caja">Cajero</option>
                            </select>
                            <div class="invalid-tooltip">
                                Proporcione un acceso de usuario válido.
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip05">Estado</label>
                            <select class="form-select" id="validationTooltip05" name="estado" required>
                                <option value="">Seleccione una opción</option>
                                <option class="text-success fw-bold" value="1">Activo</option>
                                <option class="text-danger fw-bold"value="0">Inactivo</option>
                            </select>
                            <div class="invalid-tooltip">
                                Proporcione un estado de usuario válido.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btnGuardar">Guardar</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    </div>
    <!-- END wrapper -->


    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/vendor/dataTables.checkboxes.min.js"></script>

    <!-- sweetalert2 -->
    <script src="<?php echo URL . RQ ?>js/sweetalert2/sweetalert2.all.js"></script>

    <!-- demo app -->
    <script src="<?php echo URL . RQ ?>assets/js/pages/demo.users.js"></script>
    <!-- end demo js-->
    <!-- <script src="<? //php echo URL . RQ 
                        ?>js/tablausuarios.js"></script> -->
</body>

</html>