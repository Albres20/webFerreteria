<?php
$user = $this->d['user'];
//$createClienteProveedor = $this->d['usuarios'];

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
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Cliente / Proveedor</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cliente / Proveedor</h4>
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
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalAgregarCliente" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Nuevo cliente / proveedor</button>
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
                                    <table class="table table-centered w-100 dt-responsive nowrap" id="clienteproveedor-datatable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="all" style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>

                                                <th data-sort="id" class="all">ID</th>
                                                <th data-sort="username">Nombre / Razón social</th>
                                                <th data-sort="fullname">Documento</th>
                                                <th data-sort="email">Tipo</th>
                                                <th data-sort="role">Dirección </th>
                                                <th data-sort="tipo">Teléfono </th>
                                                <th style="width: 85px;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="databody">
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
    MODAL AGREGAR CLIENTE / PROVEEDOR
    ======================================-->
    <!-- Standard modal -->
    <div id="modalAgregarCliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formnewclienteprov" name="formnewclienteprov" action="clienteProveedor/newClienteProveedor" class="needs-validation" method="POST" novalidate>

                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="standard-modalLabel">Nuevo Cliente / Proveedor</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <!---->
                        <!---->
                        <!---->
                        <div class="position-relative mb-3">
                            <label for="inputDocumentType" class="form-label">Tipo de documento</label>
                            <div class="row">
                                <!---->
                                <div class="col-md-3 d-grid">
                                    <label class="btn btn-secondary active" for="option-1">
                                        <input type="radio" name="select" id="option-1" autocomplete="off" value="RUC" checked> RUC
                                    </label>
                                </div>
                                <div class="col-md-3 d-grid">
                                    <label class="btn btn-secondary" for="option-2">
                                        <input type="radio" name="select" id="option-2" autocomplete="off" value="DNI"> DNI
                                    </label>
                                </div>
                                <div class="col-md-6 d-grid">
                                    <label class="btn btn-secondary" for="option-3">
                                        <input type="radio" name="select" id="option-3" autocomplete="off" value="SIN DOCUMENTO"> SIN DOCUMENTO
                                    </label>
                                </div>
                                <!---->
                                <!---->
                                <!---->
                            </div>
                        </div>

                        <div id="mostrardivRUC" class="position-relative mb-3">
                            <!-- style="display:none;" -->

                            <div class="position-relative mb-3">
                                <label for="inputDocumentNumber" class="form-label">Nº de Documento</label>
                                <div class="input-group">
                                    <input type="text" id="inputDocumentNumber" placeholder="Nº de Documento" flow="" class="form-control" required>
                                    <button type="button" class="btn btn-sm btn-outline-danger sunat-button"> SUNAT <i class="uil uil-search"></i>
                                    </button>

                                    <!---->
                                    <div class="invalid-tooltip">
                                        Proporcione un Nº de documento válido.
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative mb-3">
                                <label class="form-label" for="validationTooltip01">Nombre legal *</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="fullname" placeholder="Nombre legal / Razón social" required>
                                <div class="invalid-tooltip">
                                    Proporcione su Nombre legal / Razón social.
                                </div>
                            </div>

                            <div class="position-relative mb-3">
                                <label for="inputAddress" class="form-label">Dirección</label>
                                <input type="text" id="inputAddress" placeholder="Dirección" flow="" class="form-control" required>
                                <div class="invalid-tooltip">
                                    Proporcione una dirección válida.
                                </div>
                            </div>

                            <div class="position-relative mb-3">
                                <label for="inputTipo" class="form-label">Tipo</label>
                                <select id="inputTipo" class="form-select">
                                    <option value="CLIENTE">
                                        Cliente
                                    </option>
                                    <option value="PROVEEDOR">
                                        Proveedor
                                    </option>
                                    <option value="CLIENTE/PROVEEDOR">
                                        Cliente/Proveedor
                                    </option>
                                </select>
                                <div class="invalid-tooltip">
                                    Proporcione un tipo.
                                </div>
                            </div>
                        </div>

                        <!---->
                        <div class="mb-3 text-right">
                            <button type="button" class="btn btn-link collapsed" aria-expanded="false" aria-controls="clientAdvancedInputs" style="padding: 0px;"><small>Ver más</small></button>
                        </div>
                        <div id="clientAdvancedInputs" class="position-relative mb-3">
                            <!-- style="display:none;" -->
                            <div class="position-relative mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000-0000">
                                <span class="font-13 text-muted">Ej. "xxx-xxxx"</span>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="inputEmail" class="form-label">Correo electrónico</label>
                                <input type="email" id="inputEmail" placeholder="Correo electrónico" flow="" class="form-control">
                                <!---->
                            </div>
                            <div class="position-relative mb-3">
                                <label for="inputAdditionalData" class="form-label">Datos adicionales</label>
                                <textarea type="text" id="inputAdditionalData" placeholder="Datos adicionales" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Guardar</button>
                        </div>
                    </div>
                    <?php
                    //$newusuarios = newUsuarios();
                    //$crearUsuario = new Usuarios();
                    //$crearUsuario->newUsuarios();

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

    <!-- demo app -->
    <script src="<?php echo URL . RQ ?>assets/js/pages/demo.clientes.js"></script>

    <!-- end demo js-->
    <!-- <script src="<? //php echo URL . RQ 
                        ?>js/tablausuarios.js"></script> -->

</body>

</html>