<?php
include_once '../Model/ForgotPasswordModel.php';

class ForgotPasswordController {
    public function resetPasswordByPhone($correo, $telefono) {
        $forgotPasswordModel = new ForgotPasswordModel();

        // Verificar si el correo y el teléfono coinciden en la base de datos
        $usuario = $forgotPasswordModel->buscarPorCorreo($correo);

        if ($usuario) {
            // Verificar si el teléfono proporcionado coincide con el teléfono del usuario
            if ($usuario['Telefono'] == $telefono) {
                // Actualizar la contraseña al número de teléfono
                $resultado = $forgotPasswordModel->actualizarContrasena($correo, $telefono);

                if ($resultado) {
                    return "Tu contraseña ha sido cambiada al número de teléfono proporcionado.";
                } else {
                    return "Hubo un problema al actualizar la contraseña. Por favor, inténtalo de nuevo.";
                }
            } else {
                return "El teléfono proporcionado no coincide con nuestra información.";
            }
        } else {
            return "No se encontró ninguna cuenta asociada con este correo.";
        }
    }
}
?>
