<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../Controller/ForgotPasswordController.php';

    $email = $_POST['email-username'];
    $phone = $_POST['phone'];

    $forgotPassword = new ForgotPasswordController();
    $mensaje = $forgotPassword->resetPasswordByPhone($email, $phone);
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Recuperación de contraseña</title>
    <link rel="stylesheet" href="css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="css/theme-default.css" class="template-customizer-theme-css" />
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">Recuperar Contraseña</h4>
                        <p class="mb-4">Ingresa tu correo electrónico y teléfono para recuperar tu cuenta.</p>

                        
                        <?php if (isset($mensaje)) { echo "<p>$mensaje</p>"; } ?>

                        <form id="formAuthentication" class="mb-3" action="" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email-username"
                                    placeholder="Ingresa tu correo electrónico"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="phone"
                                    name="phone"
                                    placeholder="Ingresa tu número de teléfono"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Recuperar Contraseña</button>
                            </div>
                        </form>

                        <?php
                        // mostrar botón para cambiar contraseña solo si la recuperación fue exitosa
                        if (isset($mensaje) && strpos($mensaje, "Tu contraseña ha sido cambiada") !== false) {
                            echo '<div class="mb-3"><a href="resetPassword.php" class="btn btn-secondary d-grid w-100">Cambiar Contraseña</a></div>';
                        }
                        ?>

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
