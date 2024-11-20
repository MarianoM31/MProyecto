<?php
include_once 'BaseDatos.php';

class ForgotPasswordModel {
    public function buscarPorCorreo($correo) {
        $enlace = AbrirBD();

        //para buscar el correo electrónico
        $sentencia = $enlace->prepare("SELECT * FROM clientes WHERE Correo_Electronico = ?");
        $sentencia->bind_param("s", $correo);

        // Ejecutar la consulta
        $sentencia->execute();
        $resultado = $sentencia->get_result();

        if ($resultado->num_rows > 0) {
            // Correo encontrado
            return $resultado->fetch_assoc();
        } else {
            // no encontrado
            return false;
        }
        CerrarBD($enlace);
    }

    public function actualizarContrasena($correo, $nuevaContrasena) {
        $enlace = AbrirBD();

        
        $sentencia = $enlace->prepare("UPDATE clientes SET Contrasena = ? WHERE Correo_Electronico = ?");
        $sentencia->bind_param("ss", $nuevaContrasena, $correo);

      
        $resultado = $sentencia->execute();

        
        CerrarBD($enlace);

        return $resultado;
    }

    public function validarContrasena($correo, $contrasena) {
        $enlace = AbrirBD();

        
        $sentencia = $enlace->prepare("SELECT * FROM clientes WHERE Correo_Electronico = ? AND Contrasena = ?");
        $sentencia->bind_param("ss", $correo, $contrasena);

        
        $sentencia->execute();
        $resultado = $sentencia->get_result();

        
        CerrarBD($enlace);

        return $resultado->num_rows > 0;
    }
}
?>
