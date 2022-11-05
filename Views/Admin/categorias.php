<?php
$user = $this->d['user'];
$categorias = $this->d['categorias'];
$stats = $this->d['stats'];

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


    <!-- estilo imagen prducto css -->
    <!-- <link href="<?php echo URL . RQ ?>css/productos/main.css" rel="stylesheet" type="text/css"> -->

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
                                <li class="breadcrumb-item active">Categorias</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Categorias</h4>
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
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalAgregarCategoria" class="btn btn-danger mb-2" value="btnNuevo"><i class="mdi mdi-plus-circle me-2"></i> Nueva Categoria</button>
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
                                <table class="table table-striped table-centered w-100 dt-responsive nowrap" id="categories-datatable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th data-sort="id" class="all">ID</th>
                                            <th data-sort="nombre">Nombre</th>
                                            <th data-sort="color">Color</th>
                                            <th data-sort="">Cant. de productos</th>
                                            <th style="width: 85px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="databody">
                                        <?php foreach ($categorias as $categoria) { ?>
                                            <tr id="fila-<?php echo $categoria['categoria']->getcategorias_id() ?>">
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <?php echo '<td>' . $categoria['categoria']->getcategorias_id() . '</td>' ?>
                                                <?php echo '<td>' . $categoria['categoria']->getcategorias_nombre() . '</td>' ?>
                                                <?php echo '<td><div class="progress progress-sm" data-color="'. $categoria['categoria']->getcategorias_color().'" style="background-color:' . $categoria['categoria']->getcategorias_color() . '">
                                                                    <div class="progress-bar progress-lg" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>' ?>
                                                <?php echo '<td>' . $categoria['categoria']->getcategorias_id() . '</td>' ?>

                                                <td class="table-action">
                                                    <button class='action-icon' title='Actualizar categoria' onclick="editarCategoria('<?php echo $categoria['categoria']->getcategorias_id() ?>');" id="<?php echo $categoria['categoria']->getcategorias_id() ?>" style='border-width: 0px; background-color: transparent;'> <i class='mdi mdi-square-edit-outline'></i></button>
                                                    <a role="button" class='action-icon' title='Eliminar categoria' onclick="eliminarCategoria('<?php echo $categoria['categoria']->getcategorias_id() ?>');" id="<?php echo $categoria['categoria']->getcategorias_id() ?>"> <i class='mdi mdi-delete'></i></a>
                                                </td>
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
    MODAL AGREGAR CATEGORIA
    ======================================-->
    <!-- Standard modal -->
    <div id="modalAgregarCategoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formnewcatg" name="formnewcatg" class="needs-validation" method="POST" novalidate>

                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="primary-header-modalLabel">Nueva Categoria</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip02">Nombre</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="categorias_nombre" placeholder="Nombre" required>
                            <div class="invalid-tooltip">
                                Proporcione un nombre válido.
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <label for="example-color" class="form-label">Color</label>
                            <input class="form-control" id="example-color" type="color" name="categorias_color" value="#FF00FF" required>
                            <div class="invalid-tooltip">
                                Proporcione un color válido.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Guardar</button>
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
    <!-- demo app -->
    <script src="<?php echo URL . RQ ?>assets/js/pages/demo.categorias.js"></script>
    <!-- end demo js-->

    <!-- sweetalert2 js -->
    <script src="<?php echo URL . RQ ?>js/sweetalert2/sweetalert2.all.js"></script>

</body>

</html>