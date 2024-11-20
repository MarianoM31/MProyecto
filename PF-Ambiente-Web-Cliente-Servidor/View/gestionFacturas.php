<?php
include_once '../Controller/FacturaController.php';
include_once 'layout.php';

// Capturamos el contenido de la vista
ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Gestión de Facturas</h4>

<?php if (isset($_SESSION['mensaje'])): ?>
<div class="alert alert-<?php echo $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
    <?php 
    echo $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
    unset($_SESSION['tipo_mensaje']);
    ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFacturaModal">
            Añadir Nueva Factura
        </button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>ID FACTURA</th>
                    <th>CLIENTE</th>
                    <th>FECHA</th>
                    <th>TOTAL</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($facturas) && is_array($facturas) && count($facturas) > 0): ?>
                    <?php foreach ($facturas as $factura): ?>
                        <tr>
                            <td>
                                <?php 
                                $idFactura = isset($factura['ID_Pago']) ? $factura['ID_Pago'] : 'N/A';
                                echo "#F" . str_pad($idFactura, 3, '0', STR_PAD_LEFT);
                                ?>
                            </td>
                            <td><?php echo isset($factura['Cliente']) ? htmlspecialchars($factura['Cliente']) : 'N/A'; ?></td>
                            <td><?php echo isset($factura['Fecha_Pago']) ? date('d/m/Y', strtotime($factura['Fecha_Pago'])) : 'N/A'; ?></td>
                            <td><?php echo isset($factura['Monto_Pagado']) ? '$' . number_format($factura['Monto_Pagado'], 2) : '$0.00'; ?></td>
                            <td>
                                <?php 
                                $estado = isset($factura['Estado_Pago']) ? $factura['Estado_Pago'] : 'N/A';
                                $badgeClass = 'bg-secondary';
                                
                                switch(strtoupper($estado)) {
                                    case 'PAGADO':
                                    case 'COMPLETADO':
                                        $badgeClass = 'bg-success';
                                        break;
                                    case 'PENDIENTE':
                                        $badgeClass = 'bg-warning';
                                        break;
                                    case 'ANULADO':
                                        $badgeClass = 'bg-danger';
                                        break;
                                }
                                ?>
                                <span class="badge <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($estado); ?></span>
                            </td>
                            <td>
                                <?php if (isset($factura['ID_Pago'])): ?>
                                    <div class="btn-group" role="group">
                                        <!-- Ver detalles -->
                                        <form method="POST" action="../Controller/FacturaController.php" style="display: inline;">
                                            <input type="hidden" name="accion" value="ver">
                                            <input type="hidden" name="id" value="<?php echo $factura['ID_Pago']; ?>">
                                            <button type="submit" class="btn btn-sm btn-info me-2">
                                                <i class="bx bx-show"></i>
                                            </button>
                                        </form>

                                        <!-- Editar -->
                                        <form method="POST" action="../Controller/FacturaController.php" style="display: inline;">
                                            <input type="hidden" name="accion" value="editar">
                                            <input type="hidden" name="id" value="<?php echo $factura['ID_Pago']; ?>">
                                            <button type="submit" class="btn btn-sm btn-warning me-2">Editar</button>
                                        </form>
                                        
                                        <!-- Anular -->
                                        <form method="POST" action="../Controller/FacturaController.php" style="display: inline;">
                                            <input type="hidden" name="accion" value="anular">
                                            <input type="hidden" name="id" value="<?php echo $factura['ID_Pago']; ?>">
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('¿Estás seguro de que deseas anular esta factura?')">
                                                Anular
                                            </button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay facturas disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para añadir factura -->
<div class="modal fade" id="addFacturaModal" tabindex="-1" aria-labelledby="addFacturaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFacturaModalLabel">Añadir Nueva Factura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Controller/FacturaController.php" method="POST">
                    <div class="mb-3">
                        <label for="pedidoSelect" class="form-label">Pedido</label>
                        <select class="form-select" name="txtPedido" id="pedidoSelect" required>
                            <option value="">Seleccione un pedido...</option>
                            <?php if (isset($pedidosPendientes) && is_array($pedidosPendientes)): ?>
                                <?php foreach ($pedidosPendientes as $pedido): ?>
                                    <option value="<?php echo htmlspecialchars($pedido['ID_Pedido']); ?>">
                                        Pedido #<?php echo htmlspecialchars($pedido['ID_Pedido']); ?> - 
                                        <?php echo htmlspecialchars($pedido['Cliente']); ?> - 
                                        $<?php echo htmlspecialchars(number_format($pedido['Total_Pedido'], 2)); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="montoInput" class="form-label">Monto</label>
                        <input type="number" step="0.01" class="form-control" name="txtMonto" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="metodoPagoSelect" class="form-label">Método de Pago</label>
                        <select class="form-select" name="txtMetodoPago" required>
                            <option value="">Seleccione un método...</option>
                            <option value="EFECTIVO">Efectivo</option>
                            <option value="TARJETA">Tarjeta</option>
                            <option value="TRANSFERENCIA">Transferencia</option>
                            <option value="SINPE">SINPE Móvil</option>
                        </select>
                    </div>
                    
                    <button type="submit" name="btnInsertarFactura" class="btn btn-primary">Guardar Factura</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
LayoutGeneral('Gestión de Facturas - Perfumería', $content);
?>