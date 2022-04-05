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
      <!-- Navbar -->
      
        <?php include 'header.php'; ?>
      
        <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">

              <section class="bg-light py-3">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-9 col-md-8">
                            <h2 class="font-weight-bold mb-0">Listado de usuarios</h2>
                            <p class="lead text-muted">Revisa la última información</p>
                          </div>
                          <div class="col-lg-3 col-md-4 d-flex">
                            <button class="btn btn-primary w-100 align-self-center"><i class="icon ion-md-person-add lead mr-2"></i>Nuevo usuario</button>
                          </div>
                      </div>
                  </div>
              </section>

              <section>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-12 my-3">
                              <div class="card rounded-0">
                                <div class="table-responsive">        
                                    <table id="#" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <caption>Usuarios</caption>
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Nombre Completo</th>
                                                <th scope="col">Correo</th>                            
                                                <th scope="col">Rol</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                              
                                        </tbody>        
                                    </table>                    
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