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
        <title>' . htmlspecialchars($title) . '</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            }
            .content {
                flex: 1;
            }
            .header {
                background-color: #4a5568; /* Slate Gray */
                color: #ffffff;
                padding: 20px;
                text-align: center;
                border-bottom: 3px solid #2d3748; /* Darker Slate */
            }
            .navbar {
                background-color: #2d3748; /* Darker Slate */
            }
            .navbar-brand {
                font-weight: bold;
                font-size: 2rem;
                color: #a0aec0 !important; /* Lighter Slate for brand */
            }
            .navbar-brand:hover {
                color: #ffffff !important;
            }
            .nav-link {
                color: #edf2f7 !important; /* Very light gray */
                transition: color 0.3s ease;
            }
            .nav-link:hover {
                color: #a0aec0 !important; /* Lighter Slate */
            }
            .footer {
                background-color: #2d3748; /* Darker Slate */
                color: #e2e8f0; /* Light Gray */
                text-align: center;
                padding: 15px;
                position: relative;
                bottom: 0;
                width: 100%;
                border-top: 3px solid #4a5568; /* Slate Gray */
            }
            .btn-outline-light {
                border-color: #e2e8f0; /* Light Gray */
                color: #e2e8f0;
            }
            .btn-outline-light:hover {
                background-color: #e2e8f0;
                color: #2d3748; /* Darker Slate */
            }
        </style>
    </head>
    <body>
    ';
}

function MostrarMenu() {
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/Caso1/View/home.php">Sistema de Gestión de Ejercicios</a>
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
                            <a class="dropdown-item" href="/Caso1/View/home.php">Inicio</a>
                            <a class="dropdown-item" href="/Caso1/View/registroEjercicio.php">Registro de Ejercicios</a>
                            <a class="dropdown-item" href="/Caso1/View/consultaEjercicio.php">Consulta de Registro </a>
                            
                        </div>
                    </li>
                </ul>
                <div class="btn-group ml-3">
                    <button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bienvenido, Invitado
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/Caso1/View/Login/iniciarSesion.php">Iniciar Sesión</a>
                        <a class="dropdown-item" href="/Caso1/View/Login/registrarse.php">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    ';
}

function MostrarHeader() {
    echo '
    <header class="header">
        <div class="container text-center">
            <h2 class="mb-1">Sistema de Gestión de Ejercicios</h2>
            <p class="mb-0">Administra ejercicios y tipos de ejercicios de manera eficiente en una sola plataforma.</p>
        </div>
    </header>
    ';
}

function MostrarEncabezado($titulo = "Sistema de Gestión de Ejercicios", $descripcion = "Administra ejercicios y tipos de ejercicios de manera eficiente en una sola plataforma.") {
    echo '
    <div class="header">
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
        <p>&copy; 2024 Sistema de Gestión de Ejercicios</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
    ';
}

?>
