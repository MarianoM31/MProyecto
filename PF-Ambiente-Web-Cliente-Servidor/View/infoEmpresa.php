<?php
require_once 'layout.php';

ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Información de la Empresa</h4>
<p>En Perfumería Smell Elegance, nos dedicamos a ofrecer fragancias exclusivas de alta calidad. Fundada en 1990, hemos logrado posicionarnos como líderes en el mercado.</p>
<?php
$content = ob_get_clean(); 
LayoutUsuario('Productos - Perfumería', $content); 
?>
