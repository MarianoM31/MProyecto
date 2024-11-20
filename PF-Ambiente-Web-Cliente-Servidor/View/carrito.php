<?php
require_once 'layout.php';

ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Carrito de Compras</h4>
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Perfume Floral</td>
                    <td>2</td>
                    <td>$45.00</td>
                    <td>$90.00</td>
                    <td><button class="btn btn-sm btn-danger">Eliminar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean(); 
LayoutUsuario('Productos - Perfumería', $content); 
?>
