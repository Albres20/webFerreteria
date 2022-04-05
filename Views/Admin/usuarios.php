<?php
    $user = $this->d['user'];
    $usuarios = $this->d['usuarios'];

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Admin - Hyt-Trading</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Hyt-Trading" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo URL.RQ?>assets/images/favicon.ico">

        <!-- third party css -->
        <link href="<?php echo URL.RQ?>assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL.RQ?>assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->
        <link href="<?php echo URL.RQ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL.RQ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="<?php echo URL.RQ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'header.php';?>
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
                                            <li class="breadcrumb-item active">Usuarios</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Usuarios</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Products</a>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                                    <button type="button" class="btn btn-light mb-2">Export</button>
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
                                                        <th class="all">ID</th>
                                                        <th>Usuario</th>
                                                        <th>Nombre Completo</th>
                                                        <th>Correo</th>
                                                        <th>Acceso</th>
                                                        <th>Estado</th>
                                                        <th style="width: 85px;">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo URL.RQ?>assets/images/products/product-1.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="apps-ecommerce-products-details.html" class="text-body">Amazing Modern Chair</a>
                                                                <br>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            Aeron Chairs
                                                        </td>
                                                        <td>
                                                            09/12/2018
                                                        </td>
                                                        <td>
                                                            $148.66
                                                        </td>
                    
                                                        <td>
                                                            254
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                    
                                                        <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck3">
                                                                <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo URL.RQ?>assets/images/products/product-4.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="apps-ecommerce-products-details.html" class="text-body">Biblio Plastic Armchair</a>
                                                                <br>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star-half"></span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            Wooden Chairs
                                                        </td>
                                                        <td>
                                                            09/08/2018
                                                        </td>
                                                        <td>
                                                            $8.99
                                                        </td>
                    
                                                        <td>
                                                            1,874
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                                                        <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck4">
                                                                <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo URL.RQ?>assets/images/products/product-3.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="apps-ecommerce-products-details.html" class="text-body">Branded Wooden Chair</a>
                                                                <br>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star-outline"></span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            Dining Chairs
                                                        </td>
                                                        <td>
                                                            09/05/2018
                                                        </td>
                                                        <td>
                                                            $68.32
                                                        </td>
                    
                                                        <td>
                                                            2,541
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                    
                                                        <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck5">
                                                                <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo URL.RQ?>assets/images/products/product-4.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="apps-ecommerce-products-details.html" class="text-body">Designer Awesome Chair</a>
                                                                <br>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star-half"></span>
                                                                <span class="text-warning mdi mdi-star-outline"></span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            Baby Chairs
                                                        </td>
                                                        <td>
                                                            08/23/2018
                                                        </td>
                                                        <td>
                                                            $112.00
                                                        </td>
                    
                                                        <td>
                                                            3,540
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                    
                                                        <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck6">
                                                                <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo URL.RQ?>assets/images/products/product-5.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="apps-ecommerce-products-details.html" class="text-body">Cardan Armchair</a>
                                                                <br>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            Plastic Armchair
                                                        </td>
                                                        <td>
                                                            08/02/2018
                                                        </td>
                                                        <td>
                                                            $59.69
                                                        </td>
                    
                                                        <td>
                                                            26
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                    
                                                        <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck12">
                                                                <label class="form-check-label" for="customCheck12">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo URL.RQ?>assets/images/products/product-5.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="apps-ecommerce-products-details.html" class="text-body">Farthingale Chair</a>
                                                                <br>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star-half"></span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            Plastic Armchair
                                                        </td>
                                                        <td>
                                                            04/09/2018
                                                        </td>
                                                        <td>
                                                            $78.66
                                                        </td>
                    
                                                        <td>
                                                            524
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-danger">Deactive</span>
                                                        </td>
                    
                                                        <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck13">
                                                                <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo URL.RQ?>assets/images/products/product-6.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                            <p class="m-0 d-inline-block align-middle font-16">
                                                                <a href="apps-ecommerce-products-details.html" class="text-body">Unpowered aircraft</a>
                                                                <br>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star"></span>
                                                                <span class="text-warning mdi mdi-star-half"></span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            Wing Chairs
                                                        </td>
                                                        <td>
                                                            03/24/2018
                                                        </td>
                                                        <td>
                                                            $49
                                                        </td>
                    
                                                        <td>
                                                            204
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-danger">Deactive</span>
                                                        </td>
                    
                                                        <td class="table-action">
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
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
                                <script>document.write(new Date().getFullYear())</script> © Hyt - Trading
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
        <script src="<?php echo URL.RQ?>assets/js/vendor.min.js"></script>
        <script src="<?php echo URL.RQ?>assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="<?php echo URL.RQ?>assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="<?php echo URL.RQ?>assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="<?php echo URL.RQ?>assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="<?php echo URL.RQ?>assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="<?php echo URL.RQ?>assets/js/vendor/dataTables.checkboxes.min.js"></script>

        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?php echo URL.RQ?>assets/js/pages/demo.products.js"></script>
        <!-- end demo js-->

    </body>
</html>
