<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/layout.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/Config/db.php';

IncluirHead('Registro de Ejercicios');
MostrarMenu();
MostrarHeader();

$mensaje = isset($_GET['mensaje']) ? htmlspecialchars($_GET['mensaje']) : '';
?>

<div class="container mt-4">
    <h2 class="text-center">Registro de Ejercicios</h2>
    <p class="text-center">Complete el siguiente formulario para registrar un nuevo ejercicio.</p>
    
    <?php if (!empty($mensaje)) : ?>
        <div class="alert alert-info text-center">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/Caso1/Controller/ejerciciosController.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre de la Persona:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="monto">Monto:</label>
                            <input type="number" step="0.01" class="form-control" id="monto" name="monto" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="tipoEjercicio">Tipo de Ejercicio:</label>
                            <select class="form-control" id="tipoEjercicio" name="tipoEjercicio" required>
                                <option value="">Seleccione el tipo de ejercicio</option>
                                <option value="1">Ejercicios de resistencia (aeróbicos)</option>
                                <option value="2">Ejercicios de fortalecimiento</option>
                                <option value="3">Ejercicios de equilibrio</option>
                                <option value="4">Ejercicios de flexibilidad</option>
                            </select>
                        </div>
                        <input type="hidden" name="fecha" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <button type="submit" class="btn btn-success mt-4 w-100">Registrar Ejercicio</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php IncluirFooter(); ?>
