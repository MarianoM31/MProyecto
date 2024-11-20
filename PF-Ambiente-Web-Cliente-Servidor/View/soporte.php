
<!DOCTYPE html>
<html lang="es"
lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Smell Elegance - Soporte</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="css/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="css/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="css/page-auth.css" />
    <!-- Helpers -->
    <script src="js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="js/config.js"></script>
  </head>

    <!-- Contenido Principal -->
    <div class="container mt-4">
        <h2>Centro de Soporte</h2>
        <p>Si tienes algún problema o duda, por favor llena el siguiente formulario y nuestro equipo de soporte te ayudará lo antes posible.</p>

        <!-- Formulario de Soporte -->
        <div class="card mb-4">
            <div class="card-header">Enviar Solicitud de Soporte</div>
            <div class="card-body">
                <form action="procesar_soporte.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="asunto" class="form-label">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Descripción del problema</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label">Adjuntar archivo (opcional)</label>
                        <input class="form-control" type="file" id="archivo" name="archivo">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </form>
            </div>
        </div>

        <!-- Preguntas Frecuentes -->
        <div class="card">
            <div class="card-header">Preguntas Frecuentes (FAQ)</div>
            <div class="card-body">
                <h5>¿Cómo puedo cambiar mi contraseña?</h5>
                <p>Puedes cambiar tu contraseña desde la sección de ajustes en tu cuenta.</p>
                <h5>¿Cómo puedo rastrear mi pedido?</h5>
                <p>Una vez que tu pedido sea enviado, recibirás un correo con el número de rastreo.</p>
                <h5>¿Qué métodos de pago aceptan?</h5>
                <p>Aceptamos pagos con tarjeta de crédito o débito.</p>
            </div>
        </div>

        <!-- Botón para volver a la página principal -->
        <div class="text-center mt-4">
            <a href="home.php" class="btn btn-primary">Volver a la Página Principal</a>
        </div>
        
    </div>

    <!-- Bootstrap JS si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
