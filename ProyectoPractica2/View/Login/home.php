<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/layout.php';

IncluirHead('Inicio - Sistema de Gestión');
MostrarMenu( );
MostrarHeader();

?>

<div class="content container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Registro de Vendedores</h5>
                    <p class="card-text">Accede al formulario para registrar nuevos vendedores en el sistema.</p>
                    <a href="/ProyectoPractica2/View/registroVendedor.php" class="btn btn-success">Registrar Vendedor</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Registro de Vehículos</h5>
                    <p class="card-text">Accede al formulario para registrar vehículos asociados a vendedores.</p>
                    <a href="/ProyectoPractica2/View/registroVehiculos.php" class="btn btn-success">Registrar Vehículo</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Consulta de Vendedores</h5>
                    <p class="card-text">*PROXIMAMENTE Accede al registro de vehiculos en el sistema.</p>
                    <a href="/ProyectoPractica2/View/registroVendedor.php" class="btn btn-success">Registrar Vendedor</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Consulta de Vendedores</h5>
                    <p class="card-text">*PROXIMAMENTE Accede al registro de vendedores en el sistema.</p>
                    <a href="/ProyectoPractica2/View/registroVendedor.php" class="btn btn-success">Registrar Vendedor</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
IncluirFooter();
?>
<style>
    .content {
        background: #f5f5f5; 
        padding: 30px;
        border-radius: 8px;
    }
</style>