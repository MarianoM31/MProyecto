<?php
require_once 'layout.php';

ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Configuración de Perfil</h4>
<form>
    <div class="mb-3">
        <label for="username" class="form-label">Nombre de Usuario</label>
        <input type="text" class="form-control" id="username" value="John Doe">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" value="johndoe@example.com">
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>
<?php
$content = ob_get_clean(); 
LayoutUsuario('Productos - Perfumería', $content); 
?>
