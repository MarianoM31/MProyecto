<?php
session_start();
include_once '../Controller/FacturaController.php';
include_once 'layout.php';

if (!isset($_SESSION['factura_a_editar'])) {
    header('Location: gestionFacturas.php');
    exit();
}

$factura = $_SESSION['factura_a_editar'];
unset($_SESSION['factura_a_editar']);

ob_start();
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Editar Factura</h4>
    
    <div class="card">
        <div class="card-body">
            <form action="../Controller/FacturaController.php" method="POST">
                <input type="hidden" name="txtID" value="<?php echo htmlspecialchars($factura['ID_Pago']); ?>">
                
                <!-- Información del Pedido -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Pedido #</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($factura['ID_Pedido']); ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Monto</label>
                        <input type="number" 
                               step="0.01" 
                               class="form-control" 
                               name="txtMonto" 
                               value="<?php echo htmlspecialchars($factura['Monto_Pagado']); ?>" 
                               required>
                    </div>
                </div>

                <!-- Método de Pago y Estado -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Método de Pago</label>
                        <select class="form-select" name="txtMetodoPago" required>
                            <option value="EFECTIVO" <?php echo ($factura['Metodo_Pago'] == 'EFECTIVO') ? 'selected' : ''; ?>>Efectivo</option>
                            <option value="TARJETA" <?php echo ($factura['Metodo_Pago'] == 'TARJETA') ? 'selected' : ''; ?>>Tarjeta</option>
                            <option value="TRANSFERENCIA" <?php echo ($factura['Metodo_Pago'] == 'TRANSFERENCIA') ? 'selected' : ''; ?>>Transferencia</option>
                            <option value="SINPE" <?php echo ($factura['Metodo_Pago'] == 'SINPE') ? 'selected' : ''; ?>>SINPE Móvil</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Estado</label>
                        <select class="form-select" name="txtEstado" required>
                            <option value="pendiente" <?php echo ($factura['Estado_Pago'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                            <option value="completado" <?php echo ($factura['Estado_Pago'] == 'completado') ? 'selected' : ''; ?>>Completado</option>
                        </select>
                    </div>
                </div>

                <!-- Botones -->
                <div class="mt-4">
                    <button type="submit" name="btnActualizarFactura" class="btn btn-primary me-2">Guardar Cambios</button>
                    <a href="gestionFacturas.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
LayoutGeneral('Editar Factura - Perfumería', $content);
?>