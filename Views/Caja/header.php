       <!-- ========== Left Sidebar Start ========== -->
       <div class="leftside-menu">

           <!-- LOGO -->
           <a href="<?php echo $user->getRole(); ?>" class="logo text-center logo-light">
               <span class="logo-lg">
                   <img src="<?php echo URL . RQ ?>image/logoht.png" alt="" height="80">
               </span>
               <span class="logo-sm">
                   <img src="<?php echo URL . RQ ?>image/logoht.png" alt="" height="30">
               </span>
           </a>

           <!-- LOGO -->

           <div class="h-100" id="leftside-menu-container" data-simplebar="">

               <!--- Sidemenu -->
               <ul class="side-nav">

                   <li class="side-nav-item">
                       <a href="<?php echo $user->getRole(); ?>" class="side-nav-link">
                           <i class="uil-home-alt"></i>
                           <span> Inicio </span>
                       </a>
                   </li>

                   <li class="side-nav-item">
                       <a href="nuevaVenta" class="side-nav-link">
                           <i class="uil-shopping-cart-alt"></i>
                           <span> Nueva venta </span>
                       </a>
                   </li>

                   <li class="side-nav-item">
                       <a href="historialVentas" class="side-nav-link">
                           <i class="uil-shopping-trolley"></i>
                           <span> Historial de ventas </span>
                       </a>
                   </li>

                   <li class="side-nav-item">
                       <a href="historialCotizaciones" class="side-nav-link">
                           <i class="uil-notes"></i>
                           <span> Cotizaciones </span>
                       </a>
                   </li>

                   <li class="side-nav-item">
                       <a href="clienteProveedor" class="side-nav-link">
                           <i class="uil-user-square"></i>
                           <span> Clientes / Proveedores </span>
                       </a>
                   </li>

                   <li class="side-nav-item">
                       <a href="./perfil" class="side-nav-link">
                           <i class="uil-user"></i>
                           <span> Perfil </span>
                       </a>
                   </li>

               </ul>
               <!-- End Sidebar -->

               <div class="clearfix"></div>

           </div>
           <!-- Sidebar -left -->

       </div>
       <!-- Left Sidebar End -->

       <!-- ============================================================== -->
       <!-- Start Page Content here -->
       <!-- ============================================================== -->

       <div class="content-page">
           <div class="content">
               <!-- Topbar Start -->
               <div class="navbar-custom">

                   <ul class="list-unstyled topbar-menu float-end mb-0">
                       <li class="dropdown notification-list">
                           <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                               <span class="account-user-avatar">
                                   <?php if ($user->getPhoto() != "") {
                                        echo '<img src="' . URL . RQ . 'image/usuarios/' . $user->getPhoto() . '" alt="user-image" class="rounded-circle">';
                                    } else {
                                        echo '<img src="' . URL . RQ . 'image/usuarios/default-user-image.png" alt="user-image" class="rounded-circle">';
                                    }
                                    ?>
                               </span>
                               <span>
                                   <span class="account-user-name"><?php echo $user->getFullname(); ?></span>
                                   <span class="account-position"><?php echo $user->getRole(); ?></span>
                               </span>
                           </a>
                           <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                               <!-- item-->
                               <div class=" dropdown-header noti-title">
                                   <h6 class="text-overflow m-0">Bienvenido !</h6>
                               </div>

                               <!-- item-->
                               <a href="perfil" class="dropdown-item notify-item">
                                   <i class="mdi mdi-account-circle me-1"></i>
                                   <span>Mi cuenta</span>
                               </a>

                               <!-- item-->
                               <a href="<?php echo URL ?>logout" class="dropdown-item notify-item">
                                   <i class="mdi mdi-logout me-1"></i>
                                   <span>Cerrar sesión </span>
                               </a>
                           </div>
                       </li>

                   </ul>
                   <button class="button-menu-mobile open-left">
                       <i class="mdi mdi-menu"></i>
                   </button>
               </div>