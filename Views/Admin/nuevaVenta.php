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
                                <li class="breadcrumb-item active">Nueva Venta</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Nueva Venta</h4>
                    </div>
                </div>
                <div id="main-container">
                    <?php $this->showMessages(); ?>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Agregar Productos</h4>
                            <!--- boton de busqueda en 3 columnas-->

                            <form id="addproductoventa" action="nuevaVenta/addproducto" class="row" method="post" autocomplete="off">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <input type="search" class="form-control" name="buscarProducto" placeholder="Buscar producto" id="buscarProducto">
                                        <input type="hidden" id="id" name="id">
                                        <!-- <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="btnBuscarProducto">Agregar</button>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <input class="form-control" type="number" name="cantidad" id="cantidadproducto" placeholder="Cantidad" onkeyup="calcularPrecio(event)" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <input class="form-control" type="number" name="precio" id="precioproducto" placeholder="Precio" disabled min=1>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <button class="btn btn-outline-secondary" type="submit" id="btnaddProducto">Agregar</button>
                                    </div>
                                </div>
                            </form>

                            <!--- end boton de busqueda en 3 columnas-->
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-centered mb-0">
                                    <thead class="table-dark" style="text-align: center;">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio U.</th>
                                            <th>Cantidad</th>
                                            <th>Impuesto 18%</th>
                                            <th>Subtotal</th>
                                            <th>Total</th>
                                            <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalleProductos">
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->

                            <div class="mb-4 mt-3" style="text-align: right;">
                                <div class="row mb-2">
                                    <div class="col-md-9"><strong>Subtotal</strong></div>
                                    <div class="col-md-3" id="subtotal">S/0</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-9"><strong>Impuesto (18%)</strong></div>
                                    <div class="col-md-3" id="impuesto">S/0</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4 class="font-weight-bold">Importe total</h4>
                                    </div>
                                    <div class="col-md-3 totalPagar" id="total">S/0</div>
                                </div>

                            </div>
                            <!-- action buttons-->
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="historialVentas" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                        <i class="mdi mdi-arrow-left"></i> Regresar </a>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                    <a role="button" class="btn btn-danger" onclick="guardarVenta();" id=""> Guardar <i class="mdi mdi-content-save"></i></a>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body" style="font-size: 12.5px;">
                            <div class="position-relative mb-3">
                                <label class="d-block p-1 bg-dark" for="titleproveedor">
                                    <h4 class="header-title m-2 text-light text-center">Facturación</h4>
                                </label>
                            </div>
                            <div class="position-relative mb-3">
                                <div class="row">
                                    <!---->
                                    <div class="col-md-6 d-grid">
                                        <label class="btn btn-secondary" for="option-1">
                                            <input type="radio" name="cp_tipodocum" id="option-1" autocomplete="off" value="RUC"> Boleta
                                        </label>
                                    </div>
                                    <div class="col-md-6 d-grid">
                                        <label class="btn btn-secondary" for="option-2">
                                            <input type="radio" name="cp_tipodocum" id="option-2" autocomplete="off" value="DNI"> Factura
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative mb-2">
                                <h6 class="d-inline-block"><strong>Total</strong></h6>
                                <h6 class="d-inline-block float-right totalPagar">S/0</h6>
                            </div>

                            <div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <button class="btn btn-sm btn-outline-success input-prepend-custom">Pagado</button>
                                        <select class="form-select" name="" id="">
                                            <option value="34">Cta. Corriente</option>
                                            <option value="1">Efectivo</option>
                                            <option value="48">Yape</option>
                                            <option value="2">Visa</option>
                                            <option value="4">Depósito</option>
                                            <option value="41">Crédito</option>
                                            <option value="87">Transferencia</option>
                                            <option value="131">Plin</option>
                                            <option value="127">Transferencia BBVA</option>
                                            <option value="89">Transferencia BCP</option>
                                            <option value="232">Pago efectivo</option>
                                            <option value="355">BCP-Yape</option>
                                            <option value="128">Transferencia Interbank</option>
                                            <option value="145">Transferencia Scotiabank</option>
                                            <option value="203">Transferencia Caja Piura</option>
                                        </select>
                                        <input type="text" class="form-control form-control-sm date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body" style="font-size: 12.5px;">
                            <div class="position-relative mb-3">
                                <label class="d-block p-1 bg-dark" for="titleproveedor">
                                    <h4 class="header-title m-2 text-light text-center">Cliente</h4>
                                </label>
                            </div>
                            <div class="position-relative mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="consultaCliente" name="consultaCliente" placeholder="Buscar por nombre, RUC o DNI" autocomplete="off">
                                    <button class="btn btn-outline-secondary mdi mdi-account-search" type="button" id="btnBuscarCliente" style="font-size: 18px;" disabled></button>
                                </div>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#modalnewCliente" id="btnNuevoCliente" value="btnNuevoCliente" class="float-right mt-2">Nuevo cliente</a>
                            </div>
                            <div class="position-relative mb-3" id="tablaDatoCliente">
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <?php include 'footer.php'; ?>
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
    <!-- Typehead -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor/handlebars.min.js"></script>
    <script type="text/javascript" src="<?php echo URL . RQ ?>assets/js/vendor/typeahead.js"></script>

    <!-- third party js -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/vendor/dataTables.checkboxes.min.js"></script>
    <!-- demo app -->
    <script src="<?php echo URL . RQ ?>assets/js/pages/demo.new-venta.js"></script>
    <!-- sweetalert2 js -->
    <script src="<?php echo URL . RQ ?>js/sweetalert2/sweetalert2.all.js"></script>

    <!-- <script>
        $(document).ready(function() {
            console.log("ready!");
            var url = '<?php echo URL . RQ ?>php/buscarclienteajax.php';
            $('#consultaCliente').typeahead({
                source: function (busqueda, resultado) {
                    $.ajax({
                        url: url,
                        data: 'busqueda=' + busqueda,
                        dataType: "json",
                        type: "POST",
                        success: function (data) {
                            resultado($.map(data, function (item) {
                                return item;
                            }));
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
            });
        });
    </script> -->

</body>

</html>