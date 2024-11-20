<?php
session_start();
include_once 'layout.php';

if (!isset($_SESSION['factura_detalle'])) {
    header('Location: gestionFacturas.php');
    exit();
}

$factura = $_SESSION['factura_detalle'];
unset($_SESSION['factura_detalle']);

// Capturamos el contenido de la vista
ob_start();
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detalle de Factura #F<?php echo str_pad($factura['ID_Pago'], 3, '0', STR_PAD_LEFT); ?></h5>
                    <div>
                        <button onclick="window.print()" class="btn btn-secondary btn-sm">
                            <i class="bx bx-printer"></i> Imprimir
                        </button>
                        <a href="gestionFacturas.php" class="btn btn-primary btn-sm">
                            <i class="bx bx-arrow-back"></i> Volver
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">De:</h6>
                            <div>
                                <strong>Smell Elegance</strong>
                            </div>
                            <div>Dirección de la empresa</div>
                            <div>Costa Rica</div>
                            <div>Email: info@smellelegance.com</div>
                            <div>Teléfono: (506) 8888-8888</div>
                        </div>

                        <div class="col-sm-6">
                            <h6 class="mb-3">Para:</h6>
                            <div>
                                <strong><?php echo htmlspecialchars($factura['Cliente']); ?></strong>
                            </div>
                            <div><?php echo htmlspecialchars($factura['Direccion']); ?></div>
                            <div>Email: <?php echo htmlspecialchars($factura['Correo_Electronico']); ?></div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">Detalles de Factura:</h6>
                            <div>
                                <strong>Número:</strong> #F<?php echo str_pad($factura['ID_Pago'], 3, '0', STR_PAD_LEFT); ?>
                            </div>
                            <div>
                                <strong>Fecha:</strong> <?php echo date('d/m/Y', strtotime($factura['Fecha_Pago'])); ?>
                            </div>
                            <div>
                                <strong>Método de Pago:</strong> <?php echo htmlspecialchars($factura['Metodo_Pago']); ?>
                            </div>
                            <div>
                                <strong>Estado:</strong> 
                                <?php 
                                $estado = $factura['Estado_Pago'];
                                $badgeClass = '';
                                switch(strtoupper($estado)) {
                                    case 'PAGADO':
                                        $badgeClass = 'bg-success';
                                        break;
                                    case 'PENDIENTE':
                                        $badgeClass = 'bg-warning';
                                        break;
                                    case 'ANULADO':
                                        $badgeClass = 'bg-danger';
                                        break;
                                    default:
                                        $badgeClass = 'bg-secondary';
                                }
                                ?>
                                <span class="badge <?php echo $badgeClass; ?>">
                                    <?php echo htmlspecialchars($estado); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Pedido #</th>
                                    <th class="text-end">Monto Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo htmlspecialchars($factura['ID_Pedido']); ?></td>
                                    <td class="text-end">$<?php echo number_format($factura['Monto_Pagado'], 2); ?></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-end">Total Pagado:</th>
                                    <th class="text-end">$<?php echo number_format($factura['Monto_Pagado'], 2); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="alert alert-info mb-0">
                                <i class="bx bx-info-circle me-2"></i>
                                Esta es una factura electrónica válida. Conserve este documento para sus registros.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos específicos para impresión -->
<style media="print">
    @page {
        size: auto;
        margin: 20mm;
    }
    
    .btn, .alert {
        display: none !important;
    }
    
    .card {
        border: none !important;
        box-shadow: none !important;
    }
    
    .card-header {
        background: none !important;
        border-bottom: 2px solid #000 !important;
    }
    
    .table {
        border-collapse: collapse !important;
    }
    
    .table td, .table th {
        background-color: #fff !important;
        border-color: #000 !important;
    }
</style>

<?php
$content = ob_get_clean();
LayoutGeneral('Detalle de Factura - Perfumería', $content);
?>