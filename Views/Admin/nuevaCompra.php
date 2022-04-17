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
                                <li class="breadcrumb-item active">Nueva Compra</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Nueva Compra</h4>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Buscar producto" id="buscarProducto">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="btnBuscarProducto">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/images/products/product-1.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="64">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Amazing Modern Chair</a>
                                                    <br>
                                                    <small class="me-2"><b>Size:</b> Large </small>
                                                    <small><b>Color:</b> Light Green
                                                    </small>
                                                </p>
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="5" class="form-control" placeholder="Qty" style="width: 90px;">
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="5" class="form-control" placeholder="Qty" style="width: 90px;">
                                            </td>
                                            <td>
                                                $148.66
                                            </td>
                                            <td>
                                                $148.66
                                            </td>
                                            <td>
                                                $743.30
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/products/product-2.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="64">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Biblio Plastic Armchair</a>
                                                    <br>
                                                    <small class="me-2"><b>Size:</b> Small </small>
                                                    <small><b>Color:</b> Brown </small>
                                                </p>
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="2" class="form-control" placeholder="Qty" style="width: 90px;">
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="2" class="form-control" placeholder="Qty" style="width: 90px;">
                                            </td>
                                            <td>
                                                $198.00
                                            </td>
                                            <td>
                                                $198.00
                                            </td>
                                            <td>
                                                $198.00
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/products/product-3.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="64">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Designer Awesome Chair</a>
                                                    <br>
                                                    <small class="me-2"><b>Size:</b> Medium </small>
                                                    <small><b>Color:</b> Green </small>
                                                </p>
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="10" class="form-control" placeholder="Qty" style="width: 90px;">
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="10" class="form-control" placeholder="Qty" style="width: 90px;">
                                            </td>
                                            <td>
                                                $49.99
                                            </td>
                                            <td>
                                                $49.99
                                            </td>
                                            <td>
                                                $499.90
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/images/products/product-5.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="64">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Unpowered aircraft</a>
                                                    <br>
                                                    <small class="me-2"><b>Size:</b> Large </small>
                                                    <small><b>Color:</b> Orange </small>
                                                </p>
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="1" class="form-control" placeholder="Qty" style="width: 90px;">
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="1" class="form-control" placeholder="Qty" style="width: 90px;">
                                            </td>
                                            <td>
                                                $129.99
                                            </td>
                                            <td>
                                                $129.99
                                            </td>
                                            <td>
                                                $129.99
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->

                            <div class="mb-4 mt-3" style="text-align: right;">
                                <div class="row mb-2">
                                    <div class="col-md-9"><strong>Subtotal</strong></div>
                                    <div class="col-md-3">$499.90</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-9"><strong>Impuesto (18%)</strong></div>
                                    <div class="col-md-3">$49.99</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-9"><strong>Descuento</strong></div>
                                    <div class="col-md-3"><input class="form-control form-control-sm text-right discount-input" type="number"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9"><h4 class="font-weight-bold">Importe total</h4></div>
                                    <div class="col-md-3">$549.89</div>
                                </div>

                            </div>
                            <!-- action buttons-->
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="apps-ecommerce-products.html" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                        <i class="mdi mdi-arrow-left"></i> Regresar </a>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="#" class="btn btn-danger">
                                            <i class="mdi mdi-content-save"></i> Guardar </a>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="position-relative mb-3">
                                <label class="d-block p-1 bg-dark" for="titleproveedor">
                                    <h4 class="header-title m-2 text-light text-center">Facturación</h4>
                                </label>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Description</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Grand Total :</td>
                                            <td>$1641</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Charge :</td>
                                            <td>$23</td>
                                        </tr>
                                        <tr>
                                            <td>Estimated Tax : </td>
                                            <td>$19.22</td>
                                        </tr>
                                        <tr>
                                            <th>Total :</th>
                                            <th>$1683.22</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body" style="font-size: 12.5px;">
                            <div class="position-relative mb-3">
                                <label class="d-block p-1 bg-dark" for="titleproveedor">
                                    <h4 class="header-title m-2 text-light text-center">Proveedor</h4>
                                </label>
                            </div>
                            <div class="position-relative mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar producto" id="buscarProducto">
                                    <button class="btn btn-outline-secondary mdi mdi-account-search" type="button" id="btnBuscarProducto" style="font-size: 18px;"></button>
                                </div>
                                <a href="javascript:void(0);" class="float-right" style="float: right; display:none; ">Nuevo proveedor</a>
                            </div>

                            <div class="position-relative mb-3">
                                <div class="form-group row required mt-3 mb-2">
                                    <div class="col-sm-4"><strong class="mdi mdi-account"> Nombre</strong></div>
                                    <div class="col-sm-8">HIPERMERCADOS TOTTUS S.A</div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-sm-4"><strong class="mdi mdi-card-account-details"> RUC</strong></div>
                                    <div class="col-sm-8">20508565934</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4"><strong class="mdi mdi-map-marker"> Dirección</strong></div>
                                    <div class="col-sm-8">AV. ANGAMOS ESTE NRO. 1805 INT. P10 - LIMA LIMA SURQUILLO</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="javascript:void(0);" class="float-right" style="float: right; /*display:none;*/ ">Editar proveedor</a>
                            </div>

                        </div>
                    </div>
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

    <!-- <script src=" php js/tablausuarios.js"></script> -->
    <script type="text/javascript">
        (function() {
            function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                    }

                    /*reader.onload = function(e) {
                        $('#imagePreview').html("src='" + e.target.result + "'");
                    }*/

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#inputImage').change(function(el) {
                if (LimitAttach(this, 1))
                    filePreview(this);
            });
        })();
    </script>

    <script type="text/javascript">
        function LimitAttach(tField, iType) {
            file = tField.value;

            var fileSize = $('#inputImage')[0].files[0].size;
            var siezekiloByte = parseInt(fileSize / 1024);
            if (siezekiloByte > $('#inputImage').attr('size')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El tamaño del archivo no debe superar los ' + $('#inputImage').attr('size') + ' Kb',
                });
                return false;
                setTimeout("location.reload()", 2000);
            }

            if (iType == 1) {
                extArray = new Array(".jpeg", ".jpe", ".gif", ".jpg", ".png");
            }
            allowSubmit = false;
            if (!file) return false;
            while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
            ext = file.slice(file.indexOf(".")).toLowerCase();
            for (var i = 0; i < extArray.length; i++) {
                if (extArray[i] == ext) {
                    allowSubmit = true;
                    break;
                }
            }
            if (allowSubmit) {
                return true
            } else {
                tField.value = "";
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Solo se permiten archivos con extensiones: ' + extArray.join(', '),
                });
                //MENSAJE = "Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\n";
                //$("#mensaje").html(MENSAJE);
                //$("#warning-alert-modal").modal('show');
                //alert("Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\n Reiniciando Formulario");
                return false;
                setTimeout("location.reload()", 2000);
            }
        }
    </script>

</body>

</html>