<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/layout.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/Controller/TiposController.php';


IncluirHead('Tipos de Ejercicios');
MostrarMenu();
MostrarHeader();


$tiposDeEjercicio = ObtenerTiposDeEjercicio();
?>

<div class="container mt-4">
    <h2 class="text-center">Tipos de Ejercicios Registrados</h2>
    <p class="text-center">Aquí puedes ver todos los tipos de ejercicios disponibles.</p>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID Tipo de Ejercicio</th>
                                    <th>Descripción del Tipo de Ejercicio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($tiposDeEjercicio)) : ?>
                                    <?php foreach ($tiposDeEjercicio as $tipo) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($tipo['TipoEjercicio']); ?></td>
                                            <td><?php echo htmlspecialchars($tipo['DescripcionTipoEjercicio']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="2" class="text-center">No hay tipos de ejercicios disponibles.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php IncluirFooter(); ?>
