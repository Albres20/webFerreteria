<?php
$user = $this->d['user'];
//$usuarios = $this->d['usuarios'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Logistica - Hyt-Trading</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Hyt-Trading" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo URL . RQ ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo URL . RQ ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL . RQ ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="<?php echo URL . RQ ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include 'header.php'; ?>

        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Inicio</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Venta Semanal">Venta Semanal</h5>
                                    <h3 class="my-2 py-1">9,184</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 3.27%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="campaign-sent-chart" data-colors="#727cf5"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Venta diaria">Venta diaria</h5>
                                    <h3 class="my-2 py-1">3,254</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 5.38%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="new-leads-chart" data-colors="#0acf97"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Cantidad ventas">Cantidad ventas</h5>
                                    <h3 class="my-2 py-1">861</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="deals-chart" data-colors="#727cf5"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Ganancia">Ganancia</h5>
                                    <h3 class="my-2 py-1">S/.253k</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 11.7%</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <div id="booked-revenue-chart" data-colors="#0acf97"></div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="btn btn-sm btn-link float-end">Exportar
                                <i class="mdi mdi-download ms-1"></i>
                            </a>
                            <h4 class="header-title mt-2 mb-3">Top ventas de productos</h4>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">CINTA MÉTRICA PROFESSIONAL 8 MTS</h5>
                                                <span class="text-muted font-13">07 April 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$79.49</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">82</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$6,518.18</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">JUEGO EXTRACTOR DE TORNILLOS STANLEY</h5>
                                                <span class="text-muted font-13">25 March 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$128.50</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">37</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$4,754.50</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">Half Sleeve Shirt</h5>
                                                <span class="text-muted font-13">17 March 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$39.99</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">64</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$2,559.36</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">Lightweight Jacket</h5>
                                                <span class="text-muted font-13">12 March 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$20.00</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">184</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$3,680.00</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">Marco Shoes</h5>
                                                <span class="text-muted font-13">05 March 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$28.49</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">69</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$1,965.81</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>
                            <h4 class="header-title">Ventas Totales</h4>

                            <div id="average-sales" class="apex-charts mb-4 mt-4" data-colors="#727cf5,#0acf97,#fa5c7c,#ffbc00"></div>


                            <div class="chart-widget-list">
                                <p>
                                    <i class="mdi mdi-square text-primary"></i> Herramientas
                                    <span class="float-end">S/.300.56</span>
                                </p>
                                <p>
                                    <i class="mdi mdi-square text-danger"></i> Limpieza
                                    <span class="float-end">S/.135.18</span>
                                </p>
                                <p>
                                    <i class="mdi mdi-square text-success"></i> Construcción
                                    <span class="float-end">S/.48.96</span>
                                </p>
                                <p class="mb-0">
                                    <i class="mdi mdi-square text-warning"></i> Jardineria
                                    <span class="float-end">S/.154.02</span>
                                </p>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <!-- end col-->
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
                        <a href="javascript: void(0);">Acerca de</a>
                        <a href="javascript: void(0);">Soporte</a>
                        <a href="javascript: void(0);">Contáctenos</a>
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

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor/Chart.bundle.min.js"></script>
    <!-- third party js ends -->

    <!-- Apex js -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor/apexcharts.min.js"></script>
    <!-- demo app -->
    <script src="<?php echo URL . RQ ?>assets/js/pages/demo.dashboard-crm.js"></script>
    <!-- end demo js-->
    <!-- demo app -->
    <script src="<?php echo URL . RQ ?>assets/js/pages/demo.dashboard.js"></script>

</body>

</html>