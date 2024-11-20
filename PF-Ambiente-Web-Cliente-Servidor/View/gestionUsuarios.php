<?php
require_once 'layout.php'; // Incluye el archivo layout.php

// Capturamos el contenido específico de la vista
ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Gestión de Usuarios</h4>
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUsuarioModal">Añadir Nuevo Usuario</button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#U001</td>
                    <td>Juan Pérez</td>
                    <td>juan.perez@example.com</td>
                    <td>Administrador</td>
                    <td>
                        <button class="btn btn-sm btn-warning">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para añadir usuario -->
<div class="modal fade" id="addUsuarioModal" tabindex="-1" aria-labelledby="addUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUsuarioModalLabel">Añadir Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="usuarioNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="usuarioNombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="usuarioEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="usuarioEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="usuarioRol" class="form-label">Rol</label>
                        <select class="form-select" id="usuarioRol" required>
                            <option value="Administrador">Administrador</option>
                            <option value="Cliente">Cliente</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Usuario</button>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean(); // Capturamos el contenido de salida en la variable
LayoutGeneral('Gestión de Usuarios - Perfumería', $content); // Llamamos a la función layout con el contenido
?>
