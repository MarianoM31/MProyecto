<?php
include_once '../Model/LoginModel.php';

class LoginController {

    public function login($emailUsername, $password) {
        
        $loginModel = new LoginModel();
        
        
        $usuario = $loginModel->autenticarUsuario($emailUsername, $password);

        if ($usuario) {
            // Si las redenciales son correctas
            session_start();
            $_SESSION['usuario'] = $usuario['Nombre_Completo']; 
            $_SESSION['rol'] = isset($usuario['Rol']) ? $usuario['Rol'] : 'cliente'; 

            // Mostrar alerta de inicio de sesión exitoso y redirigir al home.php
            echo "<script>
                    alert('Inicio de sesión exitoso. Redirigiendo a la página de inicio...');
                    window.location.href = '../View/home.php';
                  </script>";
            exit(); 
        } else {
            // Si las credenciales son incorrectas
            return "Correo electrónico o contraseña incorrectos.";
        }
    }
}

?>
