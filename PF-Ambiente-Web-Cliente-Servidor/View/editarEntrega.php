<?php
session_start();
include_once '../Controller/EntregaController.php';
include_once 'layout.php';

if (!isset($_SESSION['entrega_a_editar'])) {
    header('Location: gestionEntrega.php');
    exit();
}

$entrega = $_SESSION['entrega_a_editar'];
unset($_SESSION['entrega_a_editar']);

// Capturamos el contenido específico de la vista
ob_start();
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Editar Entrega</h4>
    
    <div class="card">
        <div class="card-body">
            <form action="../Controller/EntregaController.php" method="POST">
                <input type="hidden" name="txtID" value="<?php echo htmlspecialchars($entrega['ID_Entrega']); ?>">
                
                <div class="mb-3">
                    <label for="pedidoSelect" class="form-label">Pedido</label>
                    <select class="form-select" name="txtPedido" id="pedidoSelect" required>
                        <?php foreach ($pedidosDisponibles as $pedido): ?>
                            <option value="<?php echo htmlspecialchars($pedido['ID_Pedido']); ?>"
                                <?php echo ($pedido['ID_Pedido'] == $entrega['ID_Pedido']) ? 'selected' : ''; ?>>
                                Pedido #<?php echo htmlspecialchars($pedido['ID_Pedido']); ?> - 
                                Total: $<?php echo htmlspecialchars($pedido['Total_Pedido']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="fechaEntrega" class="form-label">Fecha de Entrega</label>
                    <input type="datetime-local" class="form-control" name="txtFechaEntrega" id="fechaEntrega" 
                           value="<?php echo date('Y-m-d\TH:i', strtotime($entrega['Fecha_Entrega'])); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="estadoSelect" class="form-label">Estado</label>
                    <select class="form-select" name="txtEstadoEntrega" id="estadoSelect" required>
                        <option value="pendiente" <?php echo ($entrega['Estado_Entrega'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="en camino" <?php echo ($entrega['Estado_Entrega'] == 'en camino') ? 'selected' : ''; ?>>En Camino</option>
                        <option value="entregado" <?php echo ($entrega['Estado_Entrega'] == 'entregado') ? 'selected' : ''; ?>>Entregado</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="direccionEntrega" class="form-label">Dirección de Entrega</label>
                    <textarea class="form-control" name="txtDireccionEntrega" id="direccionEntrega" rows="3" required><?php echo htmlspecialchars($entrega['Direccion_Entrega']); ?></textarea>
                </div>
                
                <div class="mt-4">
                    <button type="submit" name="btnActualizarEntrega" class="btn btn-primary me-2">Guardar Cambios</button>
                    <a href="gestionEntrega.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
LayoutGeneral('Editar Entrega - Perfumería', $content);
?>