<?php

function LayoutGeneral($pageTitle = 'Dashboard - ', $content = '')
{
    echo '
    <!DOCTYPE html>
    <html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>' . $pageTitle . '</title>
        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

        <!-- Icons -->
        <link rel="stylesheet" href="vendor/fonts/boxicons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="vendor/libs/apex-charts/apex-charts.css" />

        <!-- Page CSS -->
        <script src="vendor/js/helpers.js"></script>
        <script src="js/config.js"></script>
    </head>

    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                    <div class="app-brand demo">
                        <a href="home.php" class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <!-- Logo -->
                            </span>
                            <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
                        </a>
                    </div>

                    <div class="menu-inner-shadow"></div>
                    <ul class="menu-inner py-1">
                        <!-- Principal -->
                        <li class="menu-item">
                            <a href="home.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div>Principal</div>
                            </a>
                        </li>

                        <!-- Gestiones -->
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-layout"></i>
                                <div data-i18n="Layouts">Gestiones</div>
                            </a>

                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="gestionProducto.php" class="menu-link">
                                        <div data-i18n="Without menu">Productos</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="gestionPedidos.php" class="menu-link">
                                        <div data-i18n="Without navbar">Pedidos</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="gestionEntrega.php" class="menu-link">
                                        <div data-i18n="Container">Entregas</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="gestionFacturas.php" class="menu-link">
                                        <div data-i18n="Fluid">Pagos</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="gestionUsuarios.php" class="menu-link">
                                        <div data-i18n="Fluid">Usuarios</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="gestionClientes.php" class="menu-link">
                                        <div data-i18n="Blank">Clientes</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </aside>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center">
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <input type="text" class="form-control border-0 shadow-none" placeholder="Buscar productos..." aria-label="Search..." />
                                </div>
                            </div>
                            <!-- /Search -->

                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <!-- User dropdown -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                            <img src="img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span class="fw-semibold d-block">Admin</span>
                                                        <small class="text-muted">Administrador</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i class="bx bx-power-off me-2"></i> Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            ' . $content . '
                        </div>
                        <!-- / Content -->
                    </div>
                    <!-- / Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <!-- Core JS -->
        <script src="vendor/libs/jquery/jquery.js"></script>
        <script src="vendor/libs/popper/popper.js"></script>
        <script src="vendor/js/bootstrap.js"></script>
        <script src="vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/libs/apex-charts/apexcharts.js"></script>

        <script src="js/main.js"></script>
        
        <!-- Script para activar el dropdown -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var dropdownToggles = document.querySelectorAll(".menu-toggle");
                dropdownToggles.forEach(function(toggle) {
                    toggle.addEventListener("click", function() {
                        var submenu = this.nextElementSibling;
                        if (submenu && submenu.classList.contains("menu-sub")) {
                            submenu.classList.toggle("d-block");
                        }
                    });
                });
            });
        </script>
    </body>
    </html>';
}

function LayoutUsuario($pageTitle = 'Dashboard - Perfumería', $content = '')
{
    echo '
    <!DOCTYPE html>
    <html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>' . $pageTitle . '</title>
        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

        <!-- Icons -->
        <link rel="stylesheet" href="vendor/fonts/boxicons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="vendor/libs/apex-charts/apex-charts.css" />

        <!-- Page CSS -->
        <script src="vendor/js/helpers.js"></script>
        <script src="js/config.js"></script>
    </head>

    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                    <div class="app-brand demo">
                        <a href="homeUsuario.php" class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <!-- Logo -->
                            </span>
                            <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
                        </a>
                    </div>

                    <div class="menu-inner-shadow"></div>
                    <ul class="menu-inner py-1">
                        <!-- Principal -->
                        <li class="menu-item">
                            <a href="homeUsuario.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div>Principal</div>
                            </a>
                        </li>

                        <!-- Productos -->
                        <li class="menu-item">
                            <a href="productos.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-store-alt"></i>
                                <div>Productos</div>
                            </a>
                        </li>

                        <!-- Carrito de Compras -->
                        <li class="menu-item">
                            <a href="carrito.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-cart"></i>
                                <div>Carrito de Compras</div>
                            </a>
                        </li>

                        <!-- Información de la Empresa -->
                        <li class="menu-item">
                            <a href="sobreNosotros.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-info-circle"></i>
                                <div>Información de la Empresa</div>
                            </a>
                        </li>

                        <!-- Promociones -->
                        <li class="menu-item">
                            <a href="promociones.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-gift"></i>
                                <div>Promociones</div>
                            </a>
                        </li>

                        <!-- Lista de Deseos -->
                        <li class="menu-item">
                            <a href="listaDeseos.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-heart"></i>
                                <div>Lista de Deseos</div>
                            </a>
                        </li>

                        <!-- Configuración de Perfil -->
                        <li class="menu-item">
                            <a href="perfil.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user"></i>
                                <div>Configuración de Perfil</div>
                            </a>
                        </li>
                    </ul>
                </aside>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center">
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <input type="text" class="form-control border-0 shadow-none" placeholder="Buscar productos..." aria-label="Search..." />
                                </div>
                            </div>
                            <!-- /Search -->

                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <!-- User dropdown -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i> Mi Perfil</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bx bx-power-off me-2"></i> Cerrar Sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            ' . $content . '
                        </div>
                        <!-- / Content -->
                    </div>
                    <!-- / Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <!-- Core JS -->
        <script src="vendor/libs/jquery/jquery.js"></script>
        <script src="vendor/libs/popper/popper.js"></script>
        <script src="vendor/js/bootstrap.js"></script>
        <script src="vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/libs/apex-charts/apexcharts.js"></script>

        <script src="js/main.js"></script>
    </body>
    </html>';
}


?>
