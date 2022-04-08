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
                                            <th data-sort="nombre">Marca</th>
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
                                                <?php echo '<td>' . $producto['producto']->getMarca() . '</td>' ?>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formnewproduct" name="formnewuser" action="productos/newProductos" class="needs-validation" method="POST" novalidate>

                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="standard-modalLabel">Nuevo Producto</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-7">
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltip02">Código</label>
                                    <input type="text" class="form-control" id="validationTooltip02" name="fullname" placeholder="Código" required>
                                    <div class="invalid-tooltip">
                                        Proporcione un código válido.
                                    </div>
                                </div>
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltip03">Nombre</label>
                                    <input type="text" class="form-control" id="validationTooltip03" name="email" placeholder="Nombre" required>
                                    <div class="invalid-tooltip">
                                        Proporcione un nombre válido.
                                    </div>
                                </div>
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltip03">Marca</label>
                                    <input type="text" class="form-control" id="validationTooltip03" name="email" placeholder="Marca" required>
                                    <div class="invalid-tooltip">
                                        Proporcione una marca válida.
                                    </div>
                                </div>
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltip04">Categoria</label>
                                    <select class="form-select" id="validationTooltip04" name="role" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="admin">Administrador</option>
                                        <option value="logistica">Logistica</option>
                                        <option value="caja">Cajero</option>
                                    </select>
                                    <a data-v-e66c59b4 href="javascript:void(0)" class="ml-1 float-right">Registrar nueva categoría</a>
                                    <div class="invalid-tooltip">
                                        Proporcione un categoria válida.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationTooltip89">Precio de compra</label>
                                            <input class="form-control" data-toggle="touchspin" id="validationTooltip89" type="text" data-step="0.1" data-decimals="2" data-bts-prefix="S/" pattern="\d+(\.\d{2})?" title="precio con 2 decimales" onkeyup="precio_venta();" required>
                                            <div class="invalid-tooltip">
                                                Proporcione un precio de compra válido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationTooltip89">Ganancia</label>
                                            <input class="form-control" data-toggle="touchspin" id="validationTooltip89" type="text" data-step="0.1" data-decimals="2" data-bts-prefix="S/" pattern="\d+(\.\d{2})?" title="precio con 2 decimales" onkeyup="precio_venta();" required>
                                            <div class="invalid-tooltip">
                                                Proporcione una ganancia válida.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative mb-3 col-lg-9">
                                    <label class="form-label" for="validationTooltip88">Precio de venta</label>
                                    <input class="form-control" data-toggle="touchspin" id="validationTooltip88" type="text" data-step="0.1" data-decimals="2" data-bts-prefix="S/" pattern="\d+(\.\d{2})?" title="precio con 2 decimales" required>
                                    <div class="invalid-tooltip">
                                        Proporcione un precio de venta válido.
                                    </div>
                                </div>
                                <div class="position-relative mb-3 col-lg-9">
                                    <label class="form-label" for="validationTooltip87">Stock inicial</label>
                                    <input class="form-control" data-toggle="touchspin" id="validationTooltip87" type="text" pattern="\d{1,11}" title="cantidad del producto" maxlength="11" required>
                                    <div class="invalid-tooltip">
                                        Proporcione un stock válido.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="col position-relative mb-3">
                                    <!-- File Upload -->
                                    <label class="form-label" for="validationTooltip05">Imagen</label>
                                    <div class="custom-file">
                                        <label data-v-e66c59b4 class="cursor-pointer d-block" for="inputImage">Seleccionar Archivo
                                            <img id="imagePreview" data-v-e66c59b4 src="<?php echo URL . RQ ?>image/imgproductos/default-product.png" alt="default" width="100%" class="rounded">
                                        </label>
                                        <div data-v-e66c59b4>
                                            <input data-v-e66c59b4 type="file" id="inputImage" name="inputImage" class="input-file-custom form-control-file" accept="image/*">

                                            <label data-v-e66c59b4="" for="inputImage" class="btn btn-outline-secondary btn-sm w-100"><svg data-v-e66c59b4="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-image">
                                                    <path data-v-e66c59b4="" fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" class=""></path>
                                                </svg> <span data-v-e66c59b4="" class="ml-1">Subir imagen</span>
                                            </label>
                                        </div>
                                        <div class="invalid-tooltip">
                                            Proporcione una imagen válida.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Guardar</button>
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

    <div id="warning-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-warning h1 text-warning"></i>
                        <h4 class="mt-2">Extensión incorrecta</h4>
                        <p class="mt-3" id="mensaje"></p>
                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Continuar</button>
                    </div>
                </div>
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
    <script src="<?php echo URL . RQ ?>assets/js/vendor/dropzone.min.js"></script>
    <!-- init js -->
    <script src="<?php echo URL . RQ ?>assets/js/ui/component.fileupload.js"></script>

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
                MENSAJE = "Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\n";
                $("#mensaje").html(MENSAJE);
                $("#warning-alert-modal").modal('show');
                //alert("Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\n Reiniciando Formulario");
                return false;
                setTimeout("location.reload()", 2000);
            }
        }
    </script>
    <script type="text/javascript">
        function precio_venta() {
            //var profit = $("#profit").val(); //ganancia
            var buying_price = $("#buying_price").val();

            var parametros = {
                "profit": profit,
                "buying_price": buying_price
            };
            $.ajax({
                dataType: "json",
                type: "POST",
                url: './ajax/precio.php',
                data: parametros,
                success: function(data) {
                    //$("#datos").html(data).fadeIn('slow');
                    $.each(data, function(index, element) {
                        var precio = element.precio;
                        $("#selling_price").val(precio);
                    });


                }
            })
        }
    </script>
</body>

</html>