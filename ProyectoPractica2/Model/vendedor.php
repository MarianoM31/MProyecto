<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/Config/db.php'; 

function RegistrarVendedorModel($cedula, $nombre, $correo) {
    $enlace = AbrirBD(); 

    
    $stmt = $enlace->prepare("CALL RegistrarVendedor(?, ?, ?)");
    $stmt->bind_param("sss", $cedula, $nombre, $correo); 

    if ($stmt->execute()) {
        return true; 
    } else {
        return false; 
    }

    $stmt->close();
    CerrarBD($enlace); 
}
?>