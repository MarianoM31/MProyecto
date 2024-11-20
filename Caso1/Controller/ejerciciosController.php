<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/Model/ejercicio.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/Config/db.php';

// Configurar la zona horaria pero creo que no funciono como esperaba 
date_default_timezone_set('America/Costa_Rica');

$mensaje = "";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"], $_POST["fecha"], $_POST["monto"], $_POST["tipoEjercicio"])) {
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $monto = $_POST["monto"];
        $tipoEjercicio = $_POST["tipoEjercicio"];

        $enlace = AbrirBD();

        
        $stmt = $enlace->prepare("SELECT COUNT(*) FROM ejercicios WHERE Nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $stmt->bind_result($conteo);
        $stmt->fetch();
        $stmt->close();

        if ($conteo < 2) {
            
            $resultado = RegistrarEjercicioModel($nombre, $fecha, $monto, $tipoEjercicio);

            if ($resultado === true) {
                $mensaje = "Ejercicio registrado exitosamente.";
            } else {
                $mensaje = "Error en el registro: " . $resultado;
            }
        } else {
            
            $mensaje = "Error: No se pueden registrar más de dos ejercicios para la misma persona.";
        }

        CerrarBD($enlace);
    } else {
        $mensaje = "Error: Solicitud incorrecta o parámetros faltantes.";
    }
} catch (Exception $e) {
    $mensaje = "Error en el registro: " . $e->getMessage();
}


header("Location: /Caso1/View/registroEjercicio.php?mensaje=" . urlencode($mensaje));
exit;
?>
