<?php
include_once '../Model/ForgotPasswordModel.php';

class ResetPasswordController {
    public function changePassword($correo, $currentPassword, $newPassword, $confirmPassword) {
        $forgotPasswordModel = new ForgotPasswordModel();

        // Verificar si el correo y la contraseña actual coinciden (Puede ser numero de telefono)
        $usuario = $forgotPasswordModel->buscarPorCorreo($correo);

        if ($usuario) {
            if ($usuario['Contrasena'] == $currentPassword) {
                // Verificar si la nueva contraseña y la confirmación coinciden
                if ($newPassword === $confirmPassword) {
                    // Actualizar la contraseña
                    $resultado = $forgotPasswordModel->actualizarContrasena($correo, $newPassword);

                    if ($resultado) {
                        return "Tu contraseña ha sido cambiada exitosamente.";
                    } else {
                        return "Hubo un problema al actualizar la contraseña. Por favor, inténtalo de nuevo.";
                    }
                } else {
                    return "La nueva contraseña y la confirmación no coinciden.";
                }
            } else {
                return "La contraseña actual no es correcta.";
            }
        } else {
            return "No se encontró ninguna cuenta asociada con este correo.";
        }
    }
}
?>
