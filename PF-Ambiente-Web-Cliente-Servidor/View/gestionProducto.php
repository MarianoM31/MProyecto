<?php
include_once '../Controller/ProductoController.php';
include_once 'layout.php';

// Capturamos el contenido específico de la vista
ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Gestión de Productos</h4>

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
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Añadir Nuevo
            Producto</button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($productos) && is_array($productos) && count($productos) > 0): ?>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo isset($producto['Nombre']) ? htmlspecialchars($producto['Nombre']) : 'N/A'; ?></td>
                    <td><?php echo isset($producto['Descripcion']) ? htmlspecialchars($producto['Descripcion']) : 'N/A'; ?>
                    </td>
                    <td><?php echo isset($producto['Precio']) ? '$' . number_format($producto['Precio'], 2) : 'N/A'; ?>
                    </td>
                    <td><?php echo isset($producto['Marca']) ? htmlspecialchars($producto['Marca']) : 'N/A'; ?></td>
                    <td><?php echo isset($producto['Stock_Disponible']) ? htmlspecialchars($producto['Stock_Disponible']) : 'N/A'; ?>
                    </td>
                    <td>

                    <form method="post" action="../Controller/ProductoController.php" style="display: inline;">
    <input type="hidden" name="accion" value="editar">
    <input type="hidden" name="id" value="<?php echo isset($producto['ID_Producto']) ? htmlspecialchars($producto['ID_Producto']) : ''; ?>">
    <button type="submit" class="btn btn-sm btn-warning">Editar</button>
</form>



                            <!-- <form method="POST" action="../Controller/ProductoController.php" style="display: inline;">
                                        <input type="hidden" name="accion" value="eliminar">
                                        <input type="hidden" name="id" value="?
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                                            Eliminar
                                        </button>
                                    </form> -->

                            <form method="POST" action="../Controller/ProductoController.php" style="display: inline;">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="id"
                                    value="<?php echo isset($producto['ID_Producto']) ? htmlspecialchars($producto['ID_Producto']) : ''; ?>">
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirmarEliminar()">
                                    Eliminar
                                </button>
                            </form>



                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No hay productos disponibles.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para añadir producto -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Añadir Nuevo Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Controller/ProductoController.php" method="POST">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" name="txtNombre" id="productName" required>
                    </div>
                    <div class="mb-3">
                        <label for="productBrand" class="form-label">Marca del Producto</label>
                        <input type="text" class="form-control" name="txtMarca" id="productBrand" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" name="txtDescripcion" id="productDescription" rows="3"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="txtPrecio" id="productPrice" step="0.01"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="productStock" class="form-label">Stock</label>
                        <input type="number" class="form-control" name="txtStock" id="productStock" required>
                    </div>
                    <button type="submit" name="btnInsertarProducto" class="btn btn-primary">Guardar Producto</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
function confirmarEliminar() {
    return confirm("¿Estás seguro de que deseas eliminar este producto?");
}
</script>


<?php
$content = ob_get_clean();
LayoutGeneral('Gestión de Productos - Perfumería', $content);
?>