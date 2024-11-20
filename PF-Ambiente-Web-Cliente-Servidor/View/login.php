<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../Controller/LoginController.php';

    $emailUsername = $_POST['email-username'];
    $password = $_POST['password'];

    $login = new LoginController();
    $mensaje = $login->login($emailUsername, $password);
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Smell Elegance - Login</title>
    <link rel="stylesheet" href="css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="css/theme-default.css" class="template-customizer-theme-css" />
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">Bienvenido a Smell Elegance</h4>
                        <p class="mb-4">Inicia sesión en tu cuenta y comienza la aventura</p>

                        <?php if (isset($mensaje)) { echo "<p>$mensaje</p>"; } ?>

                        <form id="formAuthentication" class="mb-3" action="" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="email-username"
                                    placeholder="correo electrónico o usuario"
                                    autofocus
                                    required
                                />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <a href="forgotPassword.php">
                                        <small>¿Olvidaste tu contraseña?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="********"
                                        required
                                    />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Inicia Sesión</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Nuevo en la plataforma?</span>
                            <a href="register.php"><span>Crea una cuenta</span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
