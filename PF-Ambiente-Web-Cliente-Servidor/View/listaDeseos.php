<?php
require_once 'layout.php';

ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Lista de Deseos</h4>
<div class="table-responsive text-nowrap">
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Perfume Floral</td>
                <td>$45.00</td>
                <td><button class="btn btn-sm btn-primary">Agregar al Carrito</button></td>
            </tr>
        </tbody>
    </table>
</div>
<?php
$content = ob_get_clean(); 
LayoutUsuario('Productos - Perfumería', $content); 
?>
