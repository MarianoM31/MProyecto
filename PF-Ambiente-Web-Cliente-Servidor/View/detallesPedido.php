<?php
session_start();
require_once 'layout.php';

// Verificacion de de detalles
if (!isset($_SESSION['detalles_pedido']) || !isset($_SESSION['id_pedido_actual'])) {
    header('Location: gestionPedidos.php');
    exit();
}

$detalles = $_SESSION['detalles_pedido'];
$idPedido = $_SESSION['id_pedido_actual'];

// Capturamos el contenido de la vista
ob_start();
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Pedido /</span> Detalles del Pedido #<?php echo htmlspecialchars($idPedido); ?>
    </h4>
    
    <div class="card">
        <div class="card-body">
            <?php if (is_array($detalles) && count($detalles) > 0): ?>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detalles as $detalle): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($detalle['NombreProducto']); ?></td>
                                    <td><?php echo htmlspecialchars($detalle['Cantidad']); ?></td>
                                    <td>$<?php echo number_format($detalle['Precio_Unitario'], 2); ?></td>
                                    <td>$<?php echo number_format($detalle['Subtotal'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Total:</td>
                                <td class="fw-bold">$<?php 
                                    $total = array_sum(array_column($detalles, 'Subtotal'));
                                    echo number_format($total, 2); 
                                ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    Este pedido no tiene detalles registrados.
                </div>
            <?php endif; ?>
            
            <div class="mt-4">
                <a href="gestionPedidos.php" class="btn btn-secondary">Volver a Pedidos</a>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
LayoutGeneral('Detalles del Pedido - Perfumería', $content);

// Limpiamos las variables de sesiones
unset($_SESSION['detalles_pedido']);
unset($_SESSION['id_pedido_actual']);
?>