<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo URL.RQ?>image/logoht.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URL.RQ?>css/bootstrap/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo URL.RQ?>/css/admin/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Admin - Hyt-Trading</title>
</head>

<body>
        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Hyt-Trading</h4>
            </div>
            <div class="menu">
                <a href="<?php echo constant('URL'); ?>admin" class="d-block text-light p-3 border-0"><i class="icon ion-md-home lead mr-2"></i>
                    Inicio</a>

                <!-- navbar -->
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link d-block text-light p-3 border-0 dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-md-briefcase lead mr-2"></i>Compras</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#"><i class="icon ion-md-add-circle lead mr-2"></i>Nueva compra</a>
                          <a class="dropdown-item" href="#"><i class="icon ion-md-list-box lead mr-2"></i>Historial de compras</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link d-block text-light p-3 border-0 dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-md-cart lead mr-2"></i>Ventas</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#"><i class="icon ion-md-add-circle lead mr-2"></i>Nueva venta</a>
                          <a class="dropdown-item" href="#"><i class="icon ion-md-list-box lead mr-2"></i>Historial de ventas</a>
                          <a class="dropdown-item" href="#"><i class="icon ion-md-clipboard lead mr-2"></i>Seguimiento de venta</a>
                          <a class="dropdown-item" href="#"><i class="icon ion-md-document lead mr-2"></i>Facturación</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"><i class="icon ion-md-card lead mr-2"></i>Cotizaciones</a>
                        </div>
                    </li>
                </ul>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-cube lead mr-2"></i>
                    Productos</a>
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-contacts lead mr-2"></i>
                    Clientes / Proveedores</a>
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>
                    Reportes</a>
                <a href="<?php echo constant('URL'); ?>usuarios" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Usuarios</a>
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-person lead mr-2"></i>
                    Perfil</a>
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-settings lead mr-2"></i>
                    Configuración</a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="<?php echo URL.RQ?>image/user-1.png" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                    Diego Velázquez
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#"><i class="icon ion-md-person lead mr-2"></i>Mi perfil</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo constant('URL'); ?>logout"><i class="icon ion-md-log-out lead mr-2"></i>Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Fin Navbar -->
</body>

</html>