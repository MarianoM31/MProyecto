<?php
session_start();
include_once 'layout.php';

// Verificar si existe el producto a editar
if (!isset($_SESSION['producto_a_editar'])) {
    header('Location: gestionProducto.php');
    exit();
}

$producto = $_SESSION['producto_a_editar'];
unset($_SESSION['producto_a_editar']); // Limpiamos la sesión

// Capturamos el contenido específico de la vista
ob_start();
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Editar Producto</h4>
    
    <div class="card">
        <div class="card-body">
            <form action="../Controller/ProductoController.php" method="POST">
                <input type="hidden" name="txtID" value="<?php echo htmlspecialchars($producto['ID_Producto']); ?>">
                
                <div class="mb-3">
                    <label for="productName" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" name="txtNombre" id="productName" 
                           value="<?php echo htmlspecialchars($producto['Nombre']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="productBrand" class="form-label">Marca del Producto</label>
                    <input type="text" class="form-control" name="txtMarca" id="productBrand" 
                           value="<?php echo htmlspecialchars($producto['Marca']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Descripción</label>
                    <textarea class="form-control" name="txtDescripcion" id="productDescription" 
                              rows="3" required><?php echo htmlspecialchars($producto['Descripcion']); ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="txtPrecio" id="productPrice" 
                           value="<?php echo htmlspecialchars($producto['Precio']); ?>" step="0.01" required>
                </div>
                
                <div class="mb-3">
                    <label for="productStock" class="form-label">Stock</label>
                    <input type="number" class="form-control" name="txtStock" id="productStock" 
                           value="<?php echo htmlspecialchars($producto['Stock_Disponible']); ?>" required>
                </div>
                
                <div class="mt-4">
                    <button type="submit" name="btnActualizarProducto" class="btn btn-primary me-2">Guardar Cambios</button>
                    <a href="gestionProducto.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
LayoutGeneral('Editar Producto - Perfumería', $content);
?>
