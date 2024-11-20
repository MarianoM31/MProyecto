<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/Controller/loginController.php';
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - Sistema de Gestión</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/styles.min.css" />
</head>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="home.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../images/logo-light.svg" alt="Sistema de Gestión">
                                </a>

                                <p class="text-center">Iniciar sesión</p>

                                <?php
                                    if(isset($_POST["txtMensaje"])) {
                                        echo '<div class="alert alert-info text-center">' . $_POST["txtMensaje"] . '</div>';
                                    }
                                ?>

                                <form action="" method="POST">

                                    <div class="mb-3">
                                        <label class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="txtContrasenna" name="txtContrasenna" required>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a class="text-primary fw-bold" href="recuperarAcceso.php">Recuperar acceso</a>
                                    </div>

                                    <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4" value="Procesar"
                                        id="btnIniciarSesion" name="btnIniciarSesion">

                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">No tienes una cuenta?</p>
                                        <a class="text-primary fw-bold ms-2" href="registrarse.php">Registrarse</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
