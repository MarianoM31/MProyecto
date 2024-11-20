<?php
include_once 'BaseDatos.php';

function IniciarSesionModel($correo, $contrasenna) {
    $enlace = AbrirBD();

    // Llamar al procedimiento almacenado que valida el usuario
    $sentencia = "CALL IniciarSesion('$correo', '$contrasenna')";
    $resultado = $enlace->query($sentencia);

    // Verificar si se obtuvo un resultado
    if ($resultado && $resultado->num_rows > 0) {
        // Usuario encontrado
        return true;
    } else {
        // Usuario no encontrado
        return false;
    }

    // Cerrar la conexión a la base de datos
    CerrarBD($enlace);
}
?>