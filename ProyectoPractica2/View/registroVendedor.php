<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/layout.php'; 

IncluirHead('Registro de Vendedores');
echo '<div class="content">'; 
MostrarMenu();
MostrarHeader();
?>


<div class="container mt-4">
    <h2 class="text-center">Registro de Vendedores</h2>
    <p class="text-center">Por favor, complete el siguiente formulario para registrar un nuevo vendedor.</p>
</div>


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/ProyectoPractica2/Controller/vendedorController.php" method="POST"> <!-- Asegúrate de que el action sea correcto -->
                        <div class="form-group">
                            <label for="cedula">Cédula:</label>
                            <input type="text" class="form-control" id="cedula" name="cedula" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="correo">Correo:</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 w-100">Registrar Vendedor</button>
                    </form>

                    <?php
                    //  mensaje de error o éxito si está presente en la URL
                    if (isset($_GET['mensaje'])) {
                        echo '<div class="alert alert-info mt-3">' . htmlspecialchars($_GET['mensaje']) . '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
echo '</div>'; // Cierre de la sección de contenido
IncluirFooter();
?>
