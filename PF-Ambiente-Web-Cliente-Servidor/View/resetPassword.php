<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../Controller/ResetPasswordController.php';

    $email = $_POST['email'];
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    $resetPassword = new ResetPasswordController();
    $mensaje = $resetPassword->changePassword($email, $currentPassword, $newPassword, $confirmPassword);
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="css/theme-default.css" class="template-customizer-theme-css" />
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">Cambiar Contraseña</h4>
                        <p class="mb-4">Ingresa la contraseña actual y la nueva contraseña.</p>

                        
                        <?php if (isset($mensaje)) { echo "<p>$mensaje</p>"; } ?>

                        <form id="formChangePassword" class="mb-3" action="" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Ingresa tu correo electrónico"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="current-password" class="form-label">Contraseña actual</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="current-password"
                                    name="current-password"
                                    placeholder="Ingresa tu contraseña actual"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="new-password" class="form-label">Nueva contraseña</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="new-password"
                                    name="new-password"
                                    placeholder="Ingresa tu nueva contraseña"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirmar nueva contraseña</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="confirm-password"
                                    name="confirm-password"
                                    placeholder="Confirma tu nueva contraseña"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Cambiar Contraseña</button>
                            </div>
                        </form>

                        <div class="mb-3">
                            <a href="login.php" class="btn btn-secondary d-grid w-100">Volver a Iniciar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
