<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/Model/tipoEjercicio.php';


function ObtenerTiposDeEjercicio() {
    try {
        return ObtenerTiposDeEjercicioModel();
    } catch (Exception $e) {
        return [];
    }
}
?>
