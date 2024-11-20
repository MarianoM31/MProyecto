<?php
include_once 'BaseDatos.php';

class RegistroModel {
    public function registrarCliente($nombreCompleto, $correo, $telefono, $direccion, $contrasena) {
        $enlace = AbrirBD();

        if (!$enlace) {
            return "Error al conectar a la base de datos: " . mysqli_connect_error();
        }

        // Llamar al procedimiento almacenado para registrar un cliente
        $sentencia = $enlace->prepare("CALL RegistrarCliente(?, ?, ?, ?, ?)");
        if (!$sentencia) {
            return "Error al preparar la sentencia: " . $enlace->error;
        }

        $sentencia->bind_param("sssss", $nombreCompleto, $correo, $telefono, $direccion, $contrasena);

        
        if ($sentencia->execute()) {
            $mensaje = "Registro exitoso. ¡Bienvenido a Smell Elegance!";
        } else {
            $mensaje = "Error en el registro: " . $sentencia->error;
        }

        
        CerrarBD($enlace);

        return $mensaje;
    }
}
?>
