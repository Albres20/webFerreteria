<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL.RQ?>css/cabecera.css">
    <link rel="stylesheet" href="<?php echo URL.RQ?>css/bootstrap.min.css">
    
</head>
<body>

    <header>

            <section class="contenedor">
                <div class="nombreTitulo">
                    TRADING E.I.R.L.
                </div>
                <div class="logo">
                    <img src="https://hyt-trading.com/wp-content/uploads/2021/03/hyt-logo-inicio.png" >
                </div>
            </section>
            <section class="franjaInferior">
                
            </section>
    </header>
    
    <section class="vh-100 gradient-custom contenedorLogin">
    <div class="contenedorCuerpo">
        
        
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <div class="pb-5">
                    <form id="iniciosesionlg" method="POST" action="">
                        <div class="logoLogin">
                            <img src="https://hyt-trading.com/wp-content/uploads/2021/03/hyt-logo-inicio.png">
                        </div>
                        <div class="form-outline form-white mb-4">
                            <input type="email" id="typeEmailX" class="form-control form-control-lg" />
                            <label class="form-label" for="typeEmailX">Usuario</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                            <label class="form-label" for="typePasswordX">Contraseña</label>
                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Olvidaste tu contraseña?</a></p>

                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar Sesión</button>
                        </form>
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">prueba</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <footer>
        <div class="contenedor">
            <div class="contactos">
                <div class="contenedorLocalizacion">
                    <div class="localizacion">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="letraLocalizacion">Av. Jamaica Mza.M Lote 3 <br>Urb. San Agustín 2da Etapa, Comas.</div> 
                </div>
                <div class="contenedorTelefono">    
                    <div class="telefono">
                        <i class="fa-solid fa-mobile-screen"></i>
                    </div>
                    <div class="numeroTelefono"><br>987330113</div> 
                </div>
                <div class="contenedorMensaje">
                    <div class="mensaje">
                        <i class="fa-solid fa-envelope"></i>
                    </div> 
                    <div class="mensajeCorreo">ventas@hyt-trading.com</div>
                </div>   
            </div>
            <div class="redes">
                
                <div class="redesContenedor">
                     <a href="" class="facebook"><i class="fa-brands fa-facebook-square"></i></a>
                     <a href="" class="instagram"><i class="fa-brands fa-instagram-square"></i></a>
                     <a href="" class="youtube"><i class="fa-brands fa-youtube-square"></i></a>
                     <a href="" class="correo"><i class="fa-solid fa-envelope"></i></a>
                 </div>    
        </div>
            
        </div>
        
    </footer>
    <script src="https://kit.fontawesome.com/47fb3045a9.js" crossorigin="anonymous"></script>
</body>
</html>