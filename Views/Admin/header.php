            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- LOGO -->
                <a href="<?php echo URL ?>admin" class="logo text-center logo-light">
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
                            <a href="<?php echo URL ?>admin" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Inicio </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarHYTcompras" aria-expanded="false" aria-controls="sidebarHYTcompras" class="side-nav-link">
                                <i class="uil-wallet"></i>
                                <span> Compras </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarHYTcompras">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Nueva compra</a>
                                    </li>
                                    <li>
                                        <a href="#">Historial de compras</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarHYTventas" aria-expanded="false" aria-controls="sidebarHYTventas" class="side-nav-link">
                                <i class="uil-shopping-cart-alt"></i>
                                <span> Ventas </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarHYTventas">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Nueva venta</a>
                                    </li>
                                    <li>
                                        <a href="#">Historial de ventas</a>
                                    </li>
                                    <li>
                                        <a href="#">Seguimiento de venta</a>
                                    </li>
                                    <li>
                                        <a href="#">Facturación</a>
                                    </li>
                                    <li>
                                        <a href="#">Cotizaciones <span class="badge rounded-pill badge-success-lighten font-10 float-end">New</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="productos" class="side-nav-link">
                                <i class="uil-tag-alt"></i>
                                <span> Productos </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-user-square"></i>
                                <span> Clientes / Proveedores </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-chart"></i>
                                <span> Reportes </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="usuarios" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span> Usuarios </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-user"></i>
                                <span> Perfil </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-bright"></i>
                                <span> Configuración </span>
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
                                        <img src="<?php echo URL . RQ ?>assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
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
                                    <a href="#" class="dropdown-item notify-item">
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