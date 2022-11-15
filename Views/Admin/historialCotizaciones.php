<?php
$user = $this->d['user'];

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
    <link href="<?php echo URL . RQ ?>css/productos/main.css" rel="stylesheet" type="text/css">

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
                                <li class="breadcrumb-item"><a href="<?php echo $user->getrol_nombre(); ?>">Inicio</a></li>
                                <li class="breadcrumb-item active">Historial de Cotizaciones</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Historial de Cotizaciones</h4>
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
                                <div class="col-sm-8">
                                    <a href="nuevaCotizacion" role="button" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Nueva Cotización</a>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span>Desde / Hasta: </span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm date" id="daterangetime" data-toggle="date-picker" data-time-picker="true" data-locale="{'format': 'DD/MM hh:mm A'}">
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th data-sort="" class="all">N° Venta</th>
                                            <th data-sort="">Cliente</th>
                                            <th data-sort="">Total</th>
                                            <th data-sort="">Fecha</th>
                                            <th data-sort="">Docs</th>
                                            <th data-sort="">Usuario</th>
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



    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


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
    <script src="<?php echo URL . RQ ?>assets/js/pages/demo.products.js"></script>
    <!-- end demo js-->

    <!-- sweetalert2 js -->
    <script src="<?php echo URL . RQ ?>js/sweetalert2/sweetalert2.all.js"></script>

</body>

</html>