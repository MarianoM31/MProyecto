<?php
include_once '../Controller/PedidoController.php';
require_once 'layout.php';

// Contenido de la vista
ob_start();
?>

<h4 class="fw-bold py-3 mb-4">Gestión de Pedidos</h4>

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPedidoModal">
            Añadir Nuevo Pedido
        </button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($pedidos) && is_array($pedidos) && count($pedidos) > 0): ?>
                    <?php foreach ($pedidos as $pedido): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($pedido['ID_Pedido']); ?></td>
                            <td><?php echo htmlspecialchars($pedido['NombreCliente']); ?></td>
                            <td><?php echo htmlspecialchars($pedido['Fecha_Pedido']); ?></td>
                            <td>$<?php echo number_format($pedido['Total_Pedido'], 2); ?></td>
                            <td>
                                <span class="badge bg-<?php 
                                    echo match($pedido['Estado_Pedido']) {
                                        'pendiente' => 'warning',
                                        'completado' => 'success',
                                        'cancelado' => 'danger',
                                        default => 'secondary'
                                    };
                                ?>">
                                    <?php echo htmlspecialchars($pedido['Estado_Pedido']); ?>
                                </span>
                            </td>
                            <td>
                                <form method="post" action="../Controller/PedidoController.php" style="display: inline;">
                                    <input type="hidden" name="accion" value="verDetalles">
                                    <input type="hidden" name="id" value="<?php echo $pedido['ID_Pedido']; ?>">
                                    <button type="submit" class="btn btn-sm btn-info">Ver Detalles</button>
                                </form>

                                <form method="post" action="../Controller/PedidoController.php" style="display: inline;">
                                    <input type="hidden" name="accion" value="editar">
                                    <input type="hidden" name="id" value="<?php echo $pedido['ID_Pedido']; ?>">
                                    <button type="submit" class="btn btn-sm btn-warning">Editar</button>
                                </form>

                                <form method="post" action="../Controller/PedidoController.php" style="display: inline;">
                                    <input type="hidden" name="accion" value="eliminar">
                                    <input type="hidden" name="id" value="<?php echo $pedido['ID_Pedido']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('¿Está seguro de que desea eliminar este pedido?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay pedidos disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Anadir pedido -->
<div class="modal fade" id="addPedidoModal" tabindex="-1" aria-labelledby="addPedidoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPedidoModalLabel">Nuevo Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Controller/PedidoController.php" method="POST">
                    <div class="mb-3">
                        <label for="cliente" class="form-label">Cliente</label>
                        <select class="form-select" name="txtCliente" id="cliente" required>
                            <option value="">Seleccione un cliente</option>
                            <?php
                            $clientes = ObtenerClientesActivosModel();
                            if ($clientes) {
                                foreach ($clientes as $cliente) {
                                    echo "<option value='" . $cliente['ID_Cliente'] . "'>" . 
                                         htmlspecialchars($cliente['Nombre_Completo']) . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado del Pedido</label>
                        <select class="form-select" name="txtEstado" id="estado" required>
                            <option value="pendiente">Pendiente</option>
                            <option value="completado">Completado</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="total" class="form-label">Total del Pedido</label>
                        <input type="number" class="form-control" name="txtTotal" id="total" 
                               step="0.01" min="0" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="btnInsertarPedido" class="btn btn-primary">Guardar Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
LayoutGeneral('Gestión de Pedidos - Perfumería', $content);
?>