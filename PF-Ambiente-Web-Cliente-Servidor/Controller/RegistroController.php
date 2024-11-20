<?php
include_once '../Model/RegistroModel.php';

class RegistroController {
    public function registrarCliente($nombreCompleto, $correo, $telefono, $direccion, $contrasena) {
        $modelo = new RegistroModel();
        $mensaje = $modelo->registrarCliente($nombreCompleto, $correo, $telefono, $direccion, $contrasena);

        if ($mensaje === "Registro exitoso. ¡Bienvenido a Smell Elegance!") {
            // Redireccionamos a login.php después de un registro exitoso
            header("Location: ../View/login.php");
            exit(); 
        } else {
            return $mensaje; 
        }
    }
}
?>
