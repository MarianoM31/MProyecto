<?php
require_once 'layout.php'; // Incluye el archivo layout.php

// Capturamos el contenido específico de la vista
ob_start();
?>
<h4 class="fw-bold py-3 mb-4">Gestión de Clientes</h4>
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClienteModal">Añadir Nuevo Cliente</button>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#C001</td>
                    <td>Laura Sánchez</td>
                    <td>laura.sanchez@example.com</td>
                    <td>+506 1234-5678</td>
                    <td>
                        <button class="btn btn-sm btn-warning">Editar</button>
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para añadir cliente -->
<div class="modal fade" id="addClienteModal" tabindex="-1" aria-labelledby="addClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClienteModalLabel">Añadir Nuevo Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="clienteNombre" class="form-label">Nombre del Cliente</label>
                        <input type="text" class="form-control" id="clienteNombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="clienteEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="clienteEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="clienteTelefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="clienteTelefono" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Cliente</button>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean(); // Capturamos el contenido de salida en la variable
LayoutGeneral('Gestión de Clientes - Perfumería', $content); // Llamamos a la función layout con el contenido
?>
