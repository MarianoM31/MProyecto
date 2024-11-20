<?php
session_start();
include_once 'layout.php';


if (!isset($_SESSION['pedido_a_editar'])) {
    header('Location: gestionPedidos.php');
    exit();
}

$pedido = $_SESSION['pedido_a_editar'];
unset($_SESSION['pedido_a_editar']); // Limpiamos la sesión

// Contenido de la vista
ob_start();
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Editar Pedido</h4>
    
    <div class="card">
        <div class="card-body">
            <form action="../Controller/PedidoController.php" method="POST">
                <input type="hidden" name="txtID" value="<?php echo htmlspecialchars($pedido['ID_Pedido']); ?>">
                
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($pedido['NombreCliente']); ?>" 
                           readonly>
                </div>
                
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado del Pedido</label>
                    <select class="form-select" name="txtEstado" id="estado" required>
                        <option value="pendiente" <?php echo $pedido['Estado_Pedido'] == 'pendiente' ? 'selected' : ''; ?>>
                            Pendiente
                        </option>
                        <option value="completado" <?php echo $pedido['Estado_Pedido'] == 'completado' ? 'selected' : ''; ?>>
                            Completado
                        </option>
                        <option value="cancelado" <?php echo $pedido['Estado_Pedido'] == 'cancelado' ? 'selected' : ''; ?>>
                            Cancelado
                        </option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="total" class="form-label">Total del Pedido</label>
                    <input type="number" class="form-control" name="txtTotal" id="total" 
                           value="<?php echo htmlspecialchars($pedido['Total_Pedido']); ?>" 
                           step="0.01" min="0" required>
                </div>
                
                <div class="mt-4">
                    <button type="submit" name="btnActualizarPedido" class="btn btn-primary me-2">Guardar Cambios</button>
                    <a href="gestionPedidos.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
LayoutGeneral('Editar Pedido - Perfumería', $content);
?>