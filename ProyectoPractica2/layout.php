<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function IncluirHead($title) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . htmlspecialchars($title) .'</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
            }
            .content {
                flex: 1;
            }
            .header {
                background-color: #2c6e49;
                color: white;
                padding: 15px;
                text-align: center;
            }
            .navbar {
                background-color: #1b5e20;
            }
            .nav-link {
                color: #ffffff !important;
            }
            .footer {
                background-color: #1b5e20;
                color: white;
                text-align: center;
                padding: 10px;
                position: relative;
                bottom: 0;
                width: 100%;
            }
        </style>
    </head>
    <body>
    ';
}

function MostrarMenu() {
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="/ProyectoPractica2/View/Login/home.php"style="font-weight: bold; font-size: 2.5rem;"> ____________________Sistema de Gestión_________________    </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menú
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/ProyectoPractica2/View/Login/home.php">Inicio</a>
                            <a class="dropdown-item" href="/ProyectoPractica2/View/registroVendedor.php">Registro de Vendedores</a>
                            <a class="dropdown-item" href="/ProyectoPractica2/View/registroVehiculos.php">Registro de Vehículos</a>
                        </div>
                    </li>
                </ul>
                <div class="btn-group ml-3">
                    <button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bienvenido, Invitado
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/ProyectoPractica2/View/Login/iniciarSesion.php">Iniciar Sesión</a>
                        <a class="dropdown-item" href="/ProyectoPractica2/View/Login/registrarse.php">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    ';
}

function MostrarHeader() {
    echo '
    <header class="header bg-dark text-white py-3">
        <div class="container text-center">
            <h2 class="mb-1">Sistema de Gestión de Vendedores y Vehículos</h2>
            <p class="mb-0">Administra de manera eficiente vendedores y vehículos en una sola plataforma.</p>
        </div>
    </header>
    ';
}


function MostrarEncabezado($titulo = "Sistema de Gestión de Vendedores y Vehículos", $descripcion = "Administra de manera eficiente vendedores y vehículos en una sola plataforma.") {
    echo '
    <div class="header bg-dark text-white py-3">
        <div class="container text-center">
            <h2>' . htmlspecialchars($titulo) . '</h2>
            <p>' . htmlspecialchars($descripcion) . '</p>
        </div>
    </div>
    ';
}

function IncluirFooter() {
    echo '
    <footer class="footer mt-auto">
        <p>&copy; 2024 Sistema de Gestión de Vendedores y Vehículos</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
    ';
}
?>
