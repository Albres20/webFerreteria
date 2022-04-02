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
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Hyt-Trading</h4>
            </div>
            <div class="menu">
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Tablero</a>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Usuarios</a>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>
                    Estadísticas</a>
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-person lead mr-2"></i>
                    Perfil</a>
                <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>
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
                <form class="form-inline position-relative d-inline-block my-2">
                  <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                  <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
                </form>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="<?php echo URL.RQ?>image/user-1.png" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                    Diego Velázquez
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Mi perfil</a>
                      <a class="dropdown-item" href="#">Suscripciones</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo constant('URL'); ?>logout">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">

              <section class="bg-light py-3">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-9 col-md-8">
                            <h1 class="font-weight-bold mb-0">Bienvenido Diego</h1>
                            <p class="lead text-muted">Revisa la última información</p>
                          </div>
                          <div class="col-lg-3 col-md-4 d-flex">
                            <button class="btn btn-primary w-100 align-self-center">Descargar reporte</button>
                          </div>
                      </div>
                  </div>
              </section>

              <section class="bg-mix py-3">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Ingresos mensuales</h6>
                                        <h3 class="font-weight-bold">$50000</h3>
                                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 50.50%</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Productos activos</h6>
                                        <h3 class="font-weight-bold">100</h3>
                                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 25.50%</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">No. de usuarios</h6>
                                        <h3 class="font-weight-bold">2500</h3>
                                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 75.50%</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Usuarios nuevos</h6>
                                        <h3 class="font-weight-bold">500</h3>
                                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 15.50%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </section>

              <section>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 my-3">
                              <div class="card rounded-0">
                                  <div class="card-header bg-light">
                                    <h6 class="font-weight-bold mb-0">Número de usuarios de paga</h6>
                                  </div>
                                  <div class="card-body">
                                    <canvas id="myChart" width="300" height="150"></canvas>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 my-3">
                            <div class="card rounded-0">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold mb-0">Ventas recientes</h6>
                                </div>
                                <div class="card-body pt-2">
                                    <div class="d-flex border-bottom py-2">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                          <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                                          <small class="d-block text-muted">Curso diseño web</small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-bottom py-2">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                          <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                                          <small class="d-block text-muted">Curso diseño web</small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-bottom py-2">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                          <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                                          <small class="d-block text-muted">Curso diseño web</small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-bottom py-2">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                          <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                                          <small class="d-block text-muted">Curso diseño web</small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-bottom py-2 mb-3">
                                        <div class="d-flex mr-3">
                                          <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                        </div>
                                        <div class="align-self-center">
                                          <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                                          <small class="d-block text-muted">Curso diseño web</small>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100">Ver todas</button>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </section>

        </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo URL.RQ?>js/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="<?php echo URL.RQ?>js/bootstrap/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, { 
                type: 'bar',
                data: {
                    labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
                    datasets: [{
                        label: 'Nuevos usuarios',
                        data: [50, 100, 150, 200],
                        backgroundColor: [
                            '#12C9E5',  
                            '#12C9E5',
                            '#12C9E5',
                            '#111B54'
                        ],
                        maxBarThickness: 30,
                        maxBarLength: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>
</body>

</html>