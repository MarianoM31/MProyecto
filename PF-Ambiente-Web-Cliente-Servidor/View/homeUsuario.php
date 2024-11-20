<?php
require_once 'layout.php'; // Incluye el archivo de layoutUsuario

// Capturamos el contenido específico de la vista
ob_start();
?>

<h4 class="fw-bold py-3 mb-4">Bienvenido a Smell Elegance</h4>

<!-- Carrusel de Productos Destacados con una sola imagen a la vez -->
<div id="productosCarrusel" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Producto 1 -->
        <div class="carousel-item active">
            <div class="card">
        <!-- Imagen ajustada a 1036x337 -->
        <img class="card-img-top img-fluid" src="https://th.bing.com/th/id/OIP.kYNWOWqwEFim1O20l6XiIwHaE1?w=306&h=199&c=7&r=0&o=5&pid=1.7" alt="Producto 1" style="width: 1388px; height: 450px; object-fit: cover;">
        <div class="card-body text-center">
            <h5 class="card-title">Fragancia Elegante</h5>
            <p class="card-text">C H A N E L</p>
            <a href="productos.php" class="btn btn-primary">Ver Producto</a>
        </div>
    </div>
</div>

        <!-- Producto 2 -->
        <div class="carousel-item">
            <div class="card">
                <img class="card-img-top" src="https://eu.florislondon.com/cdn/shop/files/Sirena_EDP_-_Second_Banner_Image.jpg?v=1687778229" alt="Producto 2" style="width: 1388px; height: 450px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">Fragancia Clásica</h5>
                    <p class="card-text">CAROLINA HERRERA</p>
                    <a href="productos.php" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </div>

        <!-- Producto 3 -->
        <div class="carousel-item">
            <div class="card">
                <img class="card-img-top" src="https://www.ties.com/blog/wp-content/uploads/2015/05/Guide_to_Cologne_01.jpg" alt="Producto 3" style="width: 1388px; height: 450px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">Fragancia Floral</h5>
                    <p class="card-text">V E R S A C E</p>
                    <a href="productos.php" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </div>

        <!-- Producto 4 -->
        <div class="carousel-item">
            <div class="card">
                <img class="card-img-top" src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/b25cff106887955.5f9a16e27459e.png" alt="Producto 4" style="width: 1388px; height: 450px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">Fragancia Suave</h5>
                    <p class="card-text"> HUGO BOSS</p>
                    <a href="productos.php" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </div>

        <!-- Producto 5 -->
        <div class="carousel-item">
            <div class="card">
                <img class="card-img-top" src="https://img.menzig.style/a/3000/3074-h1.jpg" alt="Producto 5" style="width: 1388px; height: 450px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">Fragancia Cítrica</h5>
                    <p class="card-text">PACO RABANNE</p>
                    <a href="productos.php" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </div>

        <!-- Producto 6 -->
        <div class="carousel-item">
            <div class="card">
                <img class="card-img-top" src="https://th.bing.com/th/id/OIP.wa6APNFV9MdridJLI9vmRAAAAA?rs=1&pid=ImgDetMain" alt="Producto 6" style="width: 1388px; height: 450px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">Fragancia Nocturna</h5>
                    <p class="card-text">DOLCE & GABBANA</p>
                    <a href="productos.php" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Controles del carrusel (flechas) -->
    <a class="carousel-control-prev" href="#productosCarrusel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#productosCarrusel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </a>
</div>

<!-- Menú de acceso a secciones para el usuario normal -->
<div class="row">
    <!-- Productos -->
    <div class="col-md-4">
        <div class="card hover-card">
            <img class="card-img-top" src="img/producto1.jpg" alt="Productos">
            <div class="card-body">
                <h5 class="card-title">Productos</h5>
                <p class="card-text">Explora nuestra variedad de perfumes.</p>
                <a href="productos.php" class="btn btn-primary">Ver Productos</a>
            </div>
        </div>
    </div>

    <!-- Carrito de Compras -->
    <div class="col-md-4">
        <div class="card hover-card">
            <img class="card-img-top" src="img/carrito.jpg" alt="Carrito de Compras">
            <div class="card-body">
                <h5 class="card-title">Carrito de Compras</h5>
                <p class="card-text">Revisa tus productos añadidos.</p>
                <a href="carrito.php" class="btn btn-primary">Ir al Carrito</a>
            </div>
        </div>
    </div>

    <!-- Lista de Deseos -->
    <div class="col-md-4">
        <div class="card hover-card">
            <img class="card-img-top" src="img/lista-deseos.jpg" alt="Lista de Deseos">
            <div class="card-body">
                <h5 class="card-title">Lista de Deseos</h5>
                <p class="card-text">Guarda tus productos favoritos.</p>
                <a href="listaDeseos.php" class="btn btn-primary">Ver Lista</a>
            </div>
        </div>
    </div>

    
</div>

   <!-- Sección de Contacto o Redes Sociales -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card hover-card">
                <div class="card-body text-center">
                    <h5 class="card-title">Síguenos en Redes Sociales</h5>
                    <p class="card-text">Mantente en contacto con nosotros a través de nuestras redes sociales.</p>
                    <div class="d-flex justify-content-center">
                        <a href="https://facebook.com" target="_blank" class="btn btn-primary mx-2">
                            <i class="bx bxl-facebook"></i> Facebook
                        </a>
                        <a href="https://instagram.com" target="_blank" class="btn btn-danger mx-2">
                            <i class="bx bxl-instagram"></i> Instagram
                        </a>
                        <a href="https://twitter.com" target="_blank" class="btn btn-info mx-2">
                            <i class="bx bxl-twitter"></i> Twitter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean(); // Capturamos el contenido de salida en la variable
layoutUsuario('Home Usuario - Perfumería', $content); // Llamamos al layout con el contenido
?>

<!-- CSS para hacer las tarjetas más interactivas -->
<style>
    .hover-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .hover-card:hover {
        transform: scale(1.05); /* Aumenta el tamaño al pasar el ratón */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Sombra suave */
    }
</style>

<!-- Bootstrap JS si es necesario -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
