<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/layout.php';

IncluirHead('Registro de Vehículos');
MostrarMenu();
MostrarHeader();
?>

<div class="container mt-4">
    <h2 class="text-center">Registro de Vehículos</h2>
    <p class="text-center">Complete el siguiente formulario para registrar un nuevo vehículo.</p>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/ProyectoPractica2/Controller/vehiculoController.php" method="POST">
                        <div class="form-group">
                            <label for="marca">Marca:</label>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="modelo">Modelo:</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="color">Color:</label>
                            <input type="text" class="form-control" id="color" name="color">
                        </div>
                        <div class="form-group mt-3">
                            <label for="precio">Precio:</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="IdVendedor">ID Vendedor:</label>
                            <input type="text" class="form-control" id="IdVendedor" name="IdVendedor" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 w-100">Registrar Vehículo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php IncluirFooter(); ?>