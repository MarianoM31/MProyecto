<?php
include_once 'BaseDatos.php';

class LoginModel {
    public function autenticarUsuario($correo, $contrasena) {
        $enlace = AbrirBD();

        if (!$enlace) {
            die("Error de conexión a la base de datos: " . mysqli_connect_error());
        }

        // Llamar al procedimiento almacenado para iniciar sesión
        $sentencia = $enlace->prepare("CALL IniciarSesion(?, ?)");
        if (!$sentencia) {
            die("Error al preparar la sentencia SQL: " . $enlace->error);
        }

        $sentencia->bind_param("ss", $correo, $contrasena);

        
        if (!$sentencia->execute()) {
            die("Error al ejecutar la sentencia SQL: " . $sentencia->error);
        }

        $resultado = $sentencia->get_result();

        if ($resultado) {
            echo "Resultado obtenido de la consulta.<br>";
            if ($resultado->num_rows > 0) {
                // Usuario encontrado
                echo "Usuario encontrado.<br>";
                return $resultado->fetch_assoc();
            } else {
                // Usuario no encontrado
                echo "No se encontró ningún usuario con estas credenciales.<br>";
                return false;
            }
        } else {
            echo "Error al obtener resultados de la consulta.<br>";
            return false;
        }

        
        CerrarBD($enlace);
    }
}
?>
