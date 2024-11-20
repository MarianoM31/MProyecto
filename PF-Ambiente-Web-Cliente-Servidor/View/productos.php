<?php
require_once 'layout.php'; // Incluye el archivo layoutUsuario.php

// Simulación de productos (en lugar de una base de datos)
$productos = [
    [
        'nombre' => 'Nueva Coleccion',
        'precio' => '$45.00',
        'imagen' => 'images/Perfumes/perfume1.jpg'
    ],
    [
        'nombre' => 'Los mas Comprados',
        'precio' => '$50.00',
        'imagen' => 'images/Perfumes/perfume2.jpg'
    ],
    [
        'nombre' => 'Perfumes en Promocion',
        'precio' => '$55.00',
        'imagen' => 'images/Perfumes/perfume3.jpg'
    ],
    // Puedes agregar más productos aquí
];

// Capturamos el contenido específico de la vista
ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Nuestros Productos</h4>
<div class="row">
    <?php foreach ($productos as $producto): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <!-- Imagen del producto -->
                <img class="card-img-top" src="<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= $producto['nombre'] ?></h5>
                    <p class="card-text"><?= $producto['precio'] ?></p>
                    <button class="btn btn-primary">Agregar al Carrito</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean(); 
LayoutUsuario('Productos - Perfumería', $content);
?>
