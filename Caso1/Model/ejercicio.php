<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/Config/db.php';


function RegistrarEjercicioModel($nombre, $fecha, $monto, $tipoEjercicio) {
    try {
        $enlace = AbrirBD();
        $stmt = $enlace->prepare("CALL RegistrarEjercicio(?, ?, ?, ?)");

        $stmt->bind_param("ssdi", $nombre, $fecha, $monto, $tipoEjercicio);

        if ($stmt->execute()) {
            CerrarBD($enlace);
            return true;
        } else {
            $error = $stmt->error;
            CerrarBD($enlace);
            return $error;
        }
    } catch (Exception $ex) {
        return "Excepción en el modelo: " . $ex->getMessage();
    }
}

function ConsultarEjerciciosModel() {
    try {
        $enlace = AbrirBD();
        $sql = "SELECT Fecha, Monto, DescripcionTipoEjercicio, Nombre FROM ejercicios 
                JOIN tiposejercicio ON ejercicios.TipoEjercicio = tiposejercicio.TipoEjercicio";
        $resultado = $enlace->query($sql);
        
        $ejercicios = [];
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $ejercicios[] = $fila;
            }
        }
        
        CerrarBD($enlace);
        return $ejercicios;
    } catch (Exception $e) {
        return [];
    }
}
?>
