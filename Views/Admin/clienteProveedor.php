<?php
$user = $this->d['user'];
$clientes = $this->d['clientes'];

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
                                <li class="breadcrumb-item"><a href="<?php echo $user->getrol_nombre(); ?>">Inicio</a></li>
                                <li class="breadcrumb-item active"> Clientes / Proveedores </li>
                            </ol>
                        </div>
                        <h4 class="page-title"> Clientes y/o Proveedores </h4>
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
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalCliente" class="btn btn-danger mb-2" value="btnNuevocl"><i class="mdi mdi-plus-circle me-2"></i> Nuevo cliente / proveedor </button>
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
                                    <table class="table table-striped table-centered w-100 dt-responsive nowrap" id="clienteproveedor-datatable">
                                        <thead class="table-dark">
                                            <tr>
                                                <th class="all" style="width: 20px;">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th data-sort="id" class="all">ID</th>
                                                <th data-sort="Nombre">Nombre / Razón social</th>
                                                <th data-sort="Documento">Documento</th>
                                                <th data-sort="Tipo">Tipo</th>
                                                <th data-sort="Dirección">Dirección</th>
                                                <th data-sort="Teléfono">Teléfono</th>
                                                <th style="width: 85px;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="databody">
                                            <?php
                                            if ($clientes === NULL) {
                                                //showError('Datos no disponibles por el momento.');
                                            }
                                            foreach ($clientes as $cliente) { ?>
                                                <tr id="fila-<?php echo $cliente['cliente']->getcpr_id() ?>">
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <?php echo '<td>' . $cliente['cliente']->getcpr_id() . '</td>' ?>
                                                    <?php echo '<td>' . $cliente['cliente']->getcpr_nombre() . '</td>' ?>
                                                    <?php echo '<td>' . $cliente['cliente']->getcpr_tipodocum() . ' - ' . $cliente['cliente']->getcpr_numdoc() . '</td>' ?>
                                                    <?php echo '<td>' . $cliente['cliente']->getcpr_tipo() . '</td>' ?>
                                                    <?php echo '<td> <i class="uil uil-map-marker-alt"></i>' . $cliente['cliente']->getcpr_direccion() . '</td>' ?>
                                                    <?php echo '<td> <i class="uil uil-phone"></i> ' . $cliente['cliente']->getcpr_telefono() . '</td>' ?>
                                                    <td class="table-action">
                                                        <button class='action-icon' title='Actualizar cliente / proveedor' onclick="editarCliente('<?php echo $cliente['cliente']->getcpr_id() ?>');" id="<?php echo $cliente['cliente']->getcpr_id() ?>" style='border-width: 0px; background-color: transparent;'> <i class='mdi mdi-square-edit-outline'></i></button>
                                                        <a role="button" class='action-icon' title='Eliminar cliente / proveedor' onclick="eliminarCliente('<?php echo $cliente['cliente']->getcpr_id() ?>');" id="<?php echo $cliente['cliente']->getcpr_id() ?>"> <i class='mdi mdi-delete'></i></a>
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
        <?php include 'footer.php'; ?>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    <!--=====================================
    MODAL CLIENTE / PROVEEDOR
    ======================================-->
    <!-- Standard modal -->
    <div id="modalCliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formnewclienteprov" class="needs-validation" method="POST" novalidate>

                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="primary-header-modalLabel"></h4>
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
                                        <input type="radio" name="cp_tipodocum" id="option-1" autocomplete="off" value="RUC" checked> RUC
                                    </label>
                                </div>
                                <div class="col-md-3 d-grid">
                                    <label class="btn btn-secondary" for="option-2">
                                        <input type="radio" name="cp_tipodocum" id="option-2" autocomplete="off" value="DNI"> DNI
                                    </label>
                                </div>
                                <div class="col-md-6 d-grid">
                                    <label class="btn btn-secondary" for="option-3">
                                        <input type="radio" name="cp_tipodocum" id="option-3" autocomplete="off" value="SIN DOCUMENTO"> SIN DOCUMENTO
                                    </label>
                                </div>
                                <!---->
                                <!---->
                                <!---->
                            </div>
                        </div>
                        <!-------- DIV RUC ------------->
                        <div id="mostrardivRUC" class="position-relative mb-3">
                            <!-- style="display:none;" -->
                            <div class="position-relative mb-3">
                                <label for="cp_numdocumRUC" class="form-label">Nº de Documento</label>
                                <div class="input-group">
                                    <input type="text" id="cp_numdocumRUC" name="cp_numdocum" placeholder="Nº de Documento RUC" flow="" class="form-control" required maxlength="11">
                                    <button type="button" id="buscarRUC" class="btn btn-sm btn-outline-danger"> SUNAT <i class="uil uil-search"></i>
                                    </button>
                                    <div class="invalid-tooltip">
                                        Proporcione un Nº de documento válido.
                                    </div>
                                </div>
                                <span class="text-danger" style="display:none;" id="spanerrorRUC"><strong>Ocurrió un error buscando información sobre este RUC</strong></span>
                                <span class="text-danger" style="display:none;" id="span11RUC"><strong>El RUC debe tener 11 dígitos</strong></span>
                                <!---->
                            </div>
                        </div>
                        <!---------- DIV DNI -------------->
                        <div id="mostrardivDNI" class="position-relative mb-3" style="display:none;">
                            <!-- style="display:none;" -->
                            <div class="position-relative mb-3">
                                <label for="cp_numdocumDNI" class="form-label">Nº de Documento</label>
                                <div class="input-group">
                                    <input type="text" id="cp_numdocumDNI" placeholder="Nº de Documento DNI" name="cp_numdocum" class="form-control" required disabled>
                                    <button type="button" id="buscarDNI" class="btn btn-sm btn-outline-danger"> BUSCAR <i class="uil uil-search"></i>
                                    </button>

                                    <!---->
                                    <div class="invalid-tooltip">
                                        Proporcione un Nº de documento válido.
                                    </div>
                                </div>
                                <span class="text-danger" style="display:none;" id="spanerrorDNI"><strong>Ocurrió un error buscando información sobre este DNI</strong></span>
                                <span class="text-danger" style="display:none;" id="span11DNI"><strong>El DNI debe tener 8 dígitos</strong></span>
                                <!---->
                            </div>
                        </div>
                        <!---------- DIV SIN DOCUMENTO -------------->
                        <!-- <div id="mostrardivSINDOC" class="position-relative mb-3" style="display:none;"> -->
                        <!-- style="display:none;" -->

                        <div class="position-relative mb-3">
                            <label class="form-label" for="cp_nombrelegal">Nombre legal *</label>
                            <input type="text" class="form-control" id="cp_nombrelegal" name="cp_nombrelegal" placeholder="Nombre legal / Razón social" required>
                            <div class="invalid-tooltip">
                                Proporcione su Nombre legal / Razón social.
                            </div>
                        </div>

                        <div class="position-relative mb-3">
                            <label for="cp_direccion" class="form-label">Dirección</label>
                            <input type="text" id="cp_direccion" placeholder="Dirección" name="cp_direccion" class="form-control">
                            <div class="invalid-tooltip">
                                Proporcione una dirección válida.
                            </div>
                        </div>

                        <div class="position-relative mb-3">
                            <label for="cp_tipo" class="form-label">Tipo</label>
                            <select id="cp_tipo" class="form-select" name="cp_tipo">
                                <option value="CLIENTE">
                                    Cliente
                                </option>
                                <option value="PROVEEDOR">
                                    Proveedor
                                </option>
                                <option value="CLIENTE/PROVEEDOR">
                                    Cliente / Proveedor
                                </option>
                            </select>
                            <div class="invalid-tooltip">
                                Proporcione un tipo.
                            </div>
                        </div>
                        <!-- </div> -->

                        <!--boton ver más-->
                        <div class="mb-3 d-flex flex-row-reverse">
                            <button type="button" class="btn btn-collapse-toggle" data-toggle="collapse" data-bs-target="#clientAdvancedInputs" title="Añadir más datos" style="padding: 0px;">
                                <medium>Ver más</medium><i class="uil uil-angle-down"></i>
                            </button>
                        </div>
                        <div id="clientAdvancedInputs" class="collapse in position-relative mb-3">
                            <!-- style="display:none;" -->
                            <div class="position-relative mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" id="cp_telefono" class="form-control" name="cp_telefono" data-toggle="input-mask" data-mask-format="000-0000">
                                <span class="font-13 text-muted">Ej. "xxx-xxxx"</span>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="inputEmail" class="form-label">Correo electrónico</label>
                                <input type="email" id="inputEmail" name="cp_correo" placeholder="Correo electrónico" class="form-control">
                                <div class="invalid-tooltip">
                                    Proporcione un formato adecuado.
                                </div>
                                <!---->
                            </div>
                            <div class="position-relative mb-3">
                                <label for="inputAdditionalData" class="form-label">Datos adicionales</label>
                                <textarea type="text" id="inputAdditionalData" name="cp_datosadicionales" placeholder="Datos adicionales" class="form-control"></textarea>
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
    <script src="<?php echo URL . RQ ?>assets/js/pages/demo.clienteprov.js"></script>

    <!-- end demo js-->

    <!-- script del form por tipo de documento -->
    <script>
        $(document).ready(function() {
            //$("#mostrardivtarjeta").hide();

            $("input[type='radio']").change(function() {

                //Ocultas todo
                $("#mostrardivRUC").hide();
                $("#mostrardivDNI").hide();
                $('input[type="text"]').val('');

                //obtenes el valor de los tres sets de Radios
                var opc = $("input[id='option-1']:checked").val();
                var opc2 = $("input[id='option-2']:checked").val();
                var opc3 = $("input[id='option-3']:checked").val();

                if (opc == "RUC") {
                    $("#mostrardivRUC").show();
                    //RUC HABILITADO
                    $("#cp_numdocumRUC").prop('disabled', false);
                    //DNI DESABILITADO
                    $("#cp_numdocumDNI").prop('disabled', true);

                }
                if (opc2 == "DNI") {
                    $("#mostrardivDNI").show();
                    //DNI HABILITADO
                    $("#cp_numdocumDNI").prop('disabled', false);
                    //RUC DESABILITADO
                    $("#cp_numdocumRUC").prop('disabled', true);
                }
                if (opc3 == "SIN DOCUMENTO") {
                    //RUC DESABILITADO
                    $("#cp_numdocumRUC").prop('disabled', true);
                    //DNI DESABILITADO
                    $("#cp_numdocumDNI").prop('disabled', true);
                }

            });
        });
    </script>
    <!--- script del form por tipo de documento -->

    <!-- script del form de añadir más campos-->
    <script>
        $('.btn-collapse-toggle').on('click', function() {
            var ico = $(this).find('i');
            var target = $(this).attr('data-bs-target');

            if (ico.hasClass('uil-angle-up')) {
                ico.removeClass('uil-angle-up');
                ico.addClass('uil-angle-down');
            } else {
                ico.removeClass('uil-angle-down');
                ico.addClass('uil-angle-up');
            }

            // here comes the effect
            $(target).collapse('toggle');
        });
    </script>
    <!-- end script del form de añadir más campos-->

    <!-- script de obtener datos por RUC-->
    <script>
        $(function() {
            $('#buscarRUC').on('click', function() {
                //todos los span no visibles
                $('#spanerrorRUC').hide();
                $('#span11RUC').hide();

                ruc = $('#cp_numdocumRUC').val();
                var url = '<?php echo URL . RQ ?>php/consulta_sunat.php';
                console.log(ruc);
                //$('.ajaxgif').removeClass('hide');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: 'cp_numdocum=' + ruc,
                    dataType: 'json',
                    success: function(r) {
                        //$('.ajaxgif').addClass('hide');
                        if (ruc.length < 11) {
                            $('#span11RUC').show(); //ruc menor de 11 dígitos
                            console.log('ruc menor de 11 dígitos');
                        } else if (r.numeroDocumento == ruc) {
                            console.log('ruc correcto');
                            $('#cp_nombrelegal').val(r.nombre);
                            $('#cp_direccion').val(r.direccion);
                            $('#inputAdditionalData').val(r.estado);
                        } else {
                            $('#spanerrorRUC').show(); //ruc no encontrado
                        }
                    }
                });
                return false;
            });
        });
    </script>
    <!-- end script de obtener datos por RUC-->

    <!-- script de obtener datos por DNI-->
    <script>
        $(function() {
            $('#buscarDNI').on('click', function() {
                //todos los span no visibles
                $('#spanerrorDNI').hide();
                $('#span11DNI').hide();

                dni = $('#cp_numdocumDNI').val();
                var url = '<?php echo URL . RQ ?>php/consulta_sunat1.php';
                //console.log(dni);
                //$('.ajaxgif').removeClass('hide');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: 'cp_numdocum=' + dni,
                    dataType: 'json',
                    success: function(r) {
                        //$('.ajaxgif').addClass('hide');
                        if (dni.length < 8) {
                            $('#span11DNI').show(); //dni menor de 8 dígitos
                        } else if (r.numeroDocumento == dni) {
                            $('#cp_nombrelegal').val(r.nombre);
                            $('#inputAdditionalData').val(r.estado);
                        } else {
                            $('#spanerrorDNI').show(); //dni no encontrado
                        }
                    }
                });
                return false;
            });
        });
    </script>
    <!-- end script de obtener datos por DNI-->

</body>

</html>