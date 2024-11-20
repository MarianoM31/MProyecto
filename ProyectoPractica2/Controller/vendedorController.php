<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/Model/vendedor.php'; // Asegúrate de que la ruta sea correcta
include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/Config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cedula'], $_POST['nombre'], $_POST['correo'])) {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    
    $resultado = RegistrarVendedorModel($cedula, $nombre, $correo);

    if ($resultado) {
        header('Location: /ProyectoPractica2/View/registroVendedor.php?mensaje=Vendedor registrado exitosamente');
    } else {
        $error = $enlace->error; 
        header("Location: /ProyectoPractica2/View/registroVendedor.php?mensaje=Error al registrar el vendedor: $error");
    }
}
?>
