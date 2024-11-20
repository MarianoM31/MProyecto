<?php
include_once '../Controller/EntregaController.php';
include_once 'layout.php';

// Capturamos el contenido específico de la vista
ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Gestión de Entregas</h4>

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
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEntregaModal">
            Añadir Nueva Entrega
        </button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                <th>Pedido</th>
<th>Fecha Entrega</th>
<th>Estado</th>
<th>Dirección</th>
<th>Cliente</th>
<th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($entregas) && is_array($entregas) && count($entregas) > 0): ?>
                    <?php foreach ($entregas as $entrega): ?>
                        <tr>
                            <td>
                                Pedido #<?php echo isset($entrega['ID_Pedido']) ? htmlspecialchars($entrega['ID_Pedido']) : 'N/A'; ?>
                                <?php if(isset($entrega['Total_Pedido'])): ?>
                                    <br>
                                    <small class="text-muted">
                                        Total: $<?php echo number_format($entrega['Total_Pedido'], 2); ?>
                                    </small>
                                <?php endif; ?>
                            </td>
                            <td><?php echo isset($entrega['Fecha_Entrega']) ? date('d/m/Y H:i', strtotime($entrega['Fecha_Entrega'])) : 'N/A'; ?></td>
                            <td>
                                <?php 
                                $estado = isset($entrega['Estado_Entrega']) ? htmlspecialchars($entrega['Estado_Entrega']) : 'N/A';
                                $badgeClass = '';
                                switch(strtolower($estado)) {
                                    case 'pendiente':
                                        $badgeClass = 'bg-warning';
                                        break;
                                    case 'en camino':
                                        $badgeClass = 'bg-info';
                                        break;
                                    case 'entregado':
                                        $badgeClass = 'bg-success';
                                        break;
                                    default:
                                        $badgeClass = 'bg-secondary';
                                }
                                ?>
                                <span class="badge <?php echo $badgeClass; ?>"><?php echo $estado; ?></span>
                            </td>
                            <td><?php echo isset($entrega['Direccion_Entrega']) ? htmlspecialchars($entrega['Direccion_Entrega']) : 'N/A'; ?></td>
                            <td><?php echo isset($entrega['Nombre_Mensajero']) ? htmlspecialchars($entrega['Nombre_Mensajero']) : 'Sin asignar'; ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <form method="POST" action="../Controller/EntregaController.php" style="display: inline;">
                                        <input type="hidden" name="accion" value="editar">
                                        <input type="hidden" name="id" value="<?php echo isset($entrega['ID_Entrega']) ? htmlspecialchars($entrega['ID_Entrega']) : ''; ?>">
                                        <button type="submit" class="btn btn-sm btn-warning me-2">Editar</button>
                                    </form>
                                    
                                    <form method="POST" action="../Controller/EntregaController.php" style="display: inline;">
                                        <input type="hidden" name="accion" value="eliminar">
                                        <input type="hidden" name="id" value="<?php echo isset($entrega['ID_Entrega']) ? htmlspecialchars($entrega['ID_Entrega']) : ''; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta entrega?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay entregas disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para añadir entrega -->
<div class="modal fade" id="addEntregaModal" tabindex="-1" aria-labelledby="addEntregaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEntregaModalLabel">Añadir Nueva Entrega</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Controller/EntregaController.php" method="POST">
                    <div class="mb-3">
                        <label for="pedidoSelect" class="form-label">Pedido</label>
                        <select class="form-select" name="txtPedido" id="pedidoSelect" required>
                            <option value="">Seleccione un pedido...</option>
                            <?php foreach ($pedidosDisponibles as $pedido): ?>
                                <option value="<?php echo htmlspecialchars($pedido['ID_Pedido']); ?>">
                                    Pedido #<?php echo htmlspecialchars($pedido['ID_Pedido']); ?> - 
                                    Total: $<?php echo htmlspecialchars($pedido['Total_Pedido']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="fechaEntrega" class="form-label">Fecha de Entrega</label>
                        <input type="datetime-local" class="form-control" name="txtFechaEntrega" id="fechaEntrega" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="estadoSelect" class="form-label">Estado</label>
                        <select class="form-select" name="txtEstadoEntrega" id="estadoSelect" required>
                            <option value="pendiente">Pendiente</option>
                            <option value="en camino">En Camino</option>
                            <option value="entregado">Entregado</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="direccionEntrega" class="form-label">Dirección de Entrega</label>
                        <textarea class="form-control" name="txtDireccionEntrega" id="direccionEntrega" rows="3" required></textarea>
                    </div>
                    
                    <div class="mb-3">
    <label for="clienteSelect" class="form-label">Cliente</label>
    <select class="form-select" name="txtMensajero" id="clienteSelect" required>
        <option value="">Seleccione un cliente...</option>
        <?php foreach ($clientesDisponibles as $cliente): ?>
            <option value="<?php echo htmlspecialchars($cliente['ID_Usuario']); ?>">
                <?php echo htmlspecialchars($cliente['Nombre_Usuario']); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
                    
                    <button type="submit" name="btnInsertarEntrega" class="btn btn-primary">Guardar Entrega</button>
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
LayoutGeneral('Gestión de Entregas - Perfumería', $content);
?>