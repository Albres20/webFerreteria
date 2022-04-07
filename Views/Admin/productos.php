<?php
$user = $this->d['user'];
$productos = $this->d['productos'];

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
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Productos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Productos</h4>
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
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalAgregarProducto" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Nuevo</button>
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
                                <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th data-sort="codigo" class="all">Codigo</th>
                                            <th data-sort="imagen">Imagen</th>
                                            <th data-sort="nombre">Nombre</th>
                                            <th data-sort="precio_venta">Prec. Venta</th>
                                            <th data-sort="cantidad">Stock</th>
                                            <th data-sort="categoria">Categoria</th>
                                            <th style="width: 85px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="databody">
                                        <?php
                                        if ($productos === NULL) {
                                            //showError('Datos no disponibles por el momento.');
                                        }
                                        foreach ($productos as $producto) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <?php echo '<td>' . $producto['producto']->getCodigo() . '</td>' ?>
                                                <?php echo '<td>' . $producto['producto']->getImagen() . '</td>' ?>
                                                <?php echo '<td>' . $producto['producto']->getNombre() . '</td>' ?>
                                                <?php echo '<td>' . $producto['producto']->getPrecioVenta() . '</td>' ?>
                                                <?php echo '<td>' . $producto['producto']->getStock() . '</td>' ?>
                                                <?php echo '<td>' . $producto['producto']->getIdCategoria() . '</td>' ?>

                                                <td class="table-action">
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="http://localhost/webFerreteria/usuarios/delete/<?php echo $producto['producto']->getId(); ?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    <!--=====================================
    MODAL AGREGAR USUARIO
    ======================================-->
    <!-- Standard modal -->
    <div id="modalAgregarProducto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formnewproduct" name="formnewuser" action="productos/newProductos" class="needs-validation" method="POST" novalidate>

                    <div class="modal-header">
                        <h4 class="modal-title" id="standard-modalLabel">Nuevo Producto</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip02">Código</label>
                            <input type="text" class="form-control" id="validationTooltip02" name="fullname" placeholder="Nombre Completo" required>
                            <div class="invalid-tooltip">
                                Proporcione un código válido.
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip03">Nombre</label>
                            <input type="text" class="form-control" id="validationTooltip03" name="email" placeholder="Correo" required>
                            <div class="invalid-tooltip">
                                Proporcione un nombre válido.
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip03">Marca</label>
                            <input type="text" class="form-control" id="validationTooltip03" name="email" placeholder="Correo" required>
                            <div class="invalid-tooltip">
                                Proporcione una marca válida.
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip04">Acceso</label>
                            <select class="form-select" id="validationTooltip04" name="role" required>
                                <option value="">Seleccione una opción</option>
                                <option value="admin">Administrador</option>
                                <option value="logistica">Logistica</option>
                                <option value="caja">Cajero</option>
                            </select>
                            <div class="invalid-tooltip">
                                Proporcione un acceso de usuario válido.
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <label class="form-label" for="validationTooltip05">Estado</label>
                            <select class="form-select" id="validationTooltip05" name="estado" required>
                                <option value="">Seleccione una opción</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            <div class="invalid-tooltip">
                                Proporcione un estado de usuario válido.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    <?php
                    //$newusuarios = newUsuarios();
                    $nuevoproducto = new Productos();
                    $nuevoproducto->newProductos();

                    ?>
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

    <!-- third party js ends -->
    <!-- plugin js -->
    <script src="assets/js/vendor/dropzone.min.js"></script>
    <!-- init js -->
    <script src="assets/js/ui/component.fileupload.js"></script>

    <!-- demo app -->
    <script src="<?php echo URL . RQ ?>assets/js/pages/demo.products.js"></script>
    <!-- end demo js-->
    <!-- <script src="<? //php echo URL . RQ 
                        ?>js/tablausuarios.js"></script> -->
</body>

</html>