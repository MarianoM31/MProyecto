<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/Config/db.php';

function RegistrarVehiculoModel($marca, $modelo, $color, $precio, $IdVendedor) {
    try {
        $enlace = AbrirBD();
        $stmt = $enlace->prepare("CALL RegistrarVehiculo(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdi", $marca, $modelo, $color, $precio, $IdVendedor);

        if ($stmt->execute()) {
            CerrarBD($enlace);
            return true; 
        } else {
            // Para ver el mensaje de error, se repite en varias
            $error = $stmt->error;
            CerrarBD($enlace);
            return $error; 
        }
    } catch (Exception $ex) {
        return "Excepción en el modelo: " . $ex->getMessage();
    }
}

?>
