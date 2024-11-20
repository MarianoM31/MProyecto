<?php
require_once 'layout.php';

ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Promociones</h4>
<div class="alert alert-info">
    <strong>20% de descuento</strong> en todos los productos hasta el final del mes.
</div>
<?php
$content = ob_get_clean(); 
LayoutUsuario('Productos - Perfumería', $content); 
?>
