<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../Controller/RegistroController.php';

    $nombreCompleto = $_POST['nombre_completo'];
    $correoElectronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $contrasena = $_POST['contrasena'];

    $registro = new RegistroController();
    $mensaje = $registro->registrarCliente($nombreCompleto, $correoElectronico, $telefono, $direccion, $contrasena);
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Smell Elegance - Registrarse</title>
    <link rel="stylesheet" href="css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="css/demo.css" />
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">Smell Elegance</h4>
                        <p class="mb-4">Regístrate para ser parte de esta comunidad</p>

                        <!-- Mostrar mensaje de error si existe -->
                        <?php if (isset($mensaje)) { echo "<p>$mensaje</p>"; } ?>

                        <form id="formAuthentication" class="mb-3" action="" method="POST">
                            <div class="mb-3">
                                <label for="nombre_completo" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required placeholder="Ingresa tu nombre completo" autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required placeholder="Ingresa tu correo electrónico" />
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu número de teléfono" />
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <textarea class="form-control" id="direccion" name="direccion" rows="3" placeholder="Ingresa tu dirección"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required placeholder="Ingresa una contraseña" />
                            </div>
                            <button type="submit" class="btn btn-primary d-grid w-100">Registrar</button>
                        </form>

                        <p class="text-center">
                            <span>¿Ya tienes una cuenta?</span>
                            <a href="login.php"><span>Inicia sesión aquí</span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
