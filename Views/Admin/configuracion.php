<?php
$user = $this->d['user'];
$empresa = $this->d['empresa'];
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
    <!-- estilo imagen prducto css -->
    <link href="<?php echo URL . RQ ?>css/productos/main.css" rel="stylesheet" type="text/css">

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
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="admin">Inicio</a></li>
                                <li class="breadcrumb-item active">Mi Empresa</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Mi Empresa</h4>
                    </div>
                </div>
                <div id="main-container">
                    <?php $this->showMessages(); ?>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <?php if ($empresa->getEmpresaImagen() != "") {
                                echo '<img src="' . URL . RQ . 'image/empresa/' . $empresa->getEmpresaImagen() . '" class="img-fluid rounded" width="200" alt="profile-image">';
                            } else {
                                echo '<img src="' . URL . RQ . 'image/empresa/empresa-default.png" class="img-fluid rounded" width="200" alt="profile-image">';
                            }
                            ?>
                            <h4 class="mb-0 mt-2"><?php echo $empresa->getEmpresaNombre() ?></h4>

                            <div class="text-start mt-3">
                                <h4 class="font-13 text-uppercase">Detalle de la Empresa :</h4>

                                <p class="text-muted mb-2 font-13"><strong>Correo Electrónico :</strong><span class="ms-2"><?php echo $empresa->getEmpresaEmail() ?></span></p>
                                <p class="text-muted mb-1 font-13"><strong>Teléfono :</strong> <span class="ms-2"><?php echo $empresa->getEmpresaTelefono() ?></span></p>
                                <p class="text-muted mb-2 font-13"><strong>Dirección :</strong> <span class="ms-2"><?php echo $empresa->getEmpresaRegion().' / '.
                                $empresa->getEmpresaProvincia().' / '.$empresa->getEmpresaDistrito().' / '.$empresa->getEmpresaDireccion()?></span></p>

                            </div>

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                </div> <!-- end col-->

                <div class="col-xl-8 col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                <li class="nav-item">
                                    <a href="#settings" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                        Detalles
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#direccion" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                        Dirección
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="settings">
                                    <form id="formdatos" name="formdatosempresa" action="configuracion/updateDatosEmpresa" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-home-city me-1"></i> Perfil de la Empresa</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Razón social o nombre</label>
                                                    <input type="text" class="form-control" id="usuario" name="nombre" placeholder="Ingrese su razón social o nombre" autocomplete="off" value="<?php echo $empresa->getEmpresaNombre()?>" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcine un nombre válido.
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="validationTooltip02">Empresa sector</label>
                                                    <input type="text" class="form-control" id="validationTooltip02" name="sector" placeholder="Ingrese el sector" autocomplete="off" value="<?php echo $empresa->getEmpresaSector()?>" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcione un sector de la empresa válida.
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="validationTooltip03">Tipo de Empresa</label>
                                                    <input type="text" class="form-control" id="validationTooltip03" name="tipo" placeholder="Ingrese el tipo" autocomplete="off" value="<?php echo $empresa->getEmpresaTipo()?>" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcione el tipo de empresa válida.
                                                </div>

                                                <div class="mb-3">
                                                    <label for="empresaemail" class="form-label">Correo Electrónico</label>
                                                    <input type="email" class="form-control" id="empresaemail" name="email" placeholder="Ingrese el correo" value="<?php echo $empresa->getEmpresaEmail()?>" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcione un correo válido.
                                                </div>

                                                <div class="position-relative mb-3">
                                                    <label class="form-label">Teléfono</label>
                                                    <input type="text" class="form-control" name="telefono" data-toggle="input-mask" data-mask-format="000-0000" value="<?php echo $empresa->getEmpresaTelefono()?>">
                                                    <span class="font-13 text-muted">Ej. "xxx-xxxx"</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <!-- File Upload -->
                                                    <label class="form-label" for="validationTooltip05">Logo de la Empresa</label>
                                                    <div class="custom-file">
                                                        <label data-v-e66c59b4 class="cursor-pointer d-block" for="inputImage">Selecciona una imagen
                                                            <img id="imagePreview" data-v-e66c59b4 src="resource/image/empresa/empresa-default.png" class="rounded" alt="profile-image" width="155">
                                                        </label>
                                                        <div data-v-e66c59b4>
                                                            <input data-v-e66c59b4 type="file" id="inputImage" name="empresa_imagen" class="input-file-custom form-control-file" accept="image/*" size="2048">

                                                            <label data-v-e66c59b4="" for="inputImage" class="btn btn-outline-secondary btn-sm w-100"><svg data-v-e66c59b4="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-image">
                                                                    <path data-v-e66c59b4="" fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" class=""></path>
                                                                </svg> <span data-v-e66c59b4="" class="ml-1">Subir logo</span>
                                                            </label>
                                                        </div>
                                                        <div class="invalid-tooltip">
                                                            Proporcione una imagen válida.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Guardar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end timeline content-->

                                <div class="tab-pane" id="direccion">
                                    <form id="formpassword" action="configuracion/updateDireccion" class="needs-validation" method="POST" novalidate>
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-home-circle me-1"></i> Cambiar dirección</h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Región</label>
                                                    <input type="text" class="form-control" id="usuario" name="region" placeholder="Ingrese su región" autocomplete="off" value="<?php echo $empresa->getEmpresaRegion()?>" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcine una Región válida.
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Provincia</label>
                                                    <input type="text" class="form-control" id="usuario" name="provincia" placeholder="Ingrese su provincia" autocomplete="off" value="<?php echo $empresa->getEmpresaProvincia()?>" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcine una Provincia válida.
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Distrito</label>
                                                    <input type="text" class="form-control" id="usuario" name="distrito" placeholder="Ingrese su distrito" autocomplete="off" value="<?php echo $empresa->getEmpresaDistrito()?>" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcine un Distrito válido.
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="usuario" name="direccion" placeholder="Ingrese su dirección" autocomplete="off" value="<?php echo $empresa->getEmpresaDireccion()?>" required>
                                                </div>
                                                <div class="invalid-tooltip">
                                                    Proporcine una Dirección válida.
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Guardar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end settings content-->

                            </div> <!-- end tab-content -->
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Hyper - Coderthemes.com
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


    </div>
    <!-- END wrapper -->


    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="<?php echo URL . RQ ?>assets/js/vendor.min.js"></script>
    <script src="<?php echo URL . RQ ?>assets/js/app.min.js"></script>
    <!-- sweetalert2 js -->
    <script src="<?php echo URL . RQ ?>js/sweetalert2/sweetalert2.all.js"></script>
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
                extArray = new Array(".jpeg", ".jpe", ".jpg", ".png");
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