<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/layout.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/Model/ejercicio.php';


IncluirHead('Consulta de Ejercicios');
MostrarMenu();
MostrarHeader();


$ejercicios = ConsultarEjerciciosModel();
?>

<div class="container mt-4">
    <h2 class="text-center">Consulta de Ejercicios Registrados</h2>
    <p class="text-center">Aquí puedes ver todos los ejercicios registrados hasta el momento.</p>

    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Descripción del Tipo de Ejercicio</th>
                    <th>Nombre de la Persona</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($ejercicios) > 0): ?>
                    <?php foreach ($ejercicios as $ejercicio): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($ejercicio['Fecha']); ?></td>
                            <td><?php echo htmlspecialchars(number_format($ejercicio['Monto'], 2)); ?></td>
                            <td><?php echo htmlspecialchars($ejercicio['DescripcionTipoEjercicio']); ?></td>
                            <td><?php echo htmlspecialchars($ejercicio['Nombre']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay ejercicios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php IncluirFooter(); ?>
