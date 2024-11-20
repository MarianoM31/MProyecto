<?php
// Configuración para mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/Model/vehiculo.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/ProyectoPractica2/Config/db.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['marca'], $_POST['modelo'], $_POST['color'], $_POST['precio'], $_POST['IdVendedor'])) {
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $color = $_POST['color'];
        $precio = $_POST['precio'];
        $IdVendedor = $_POST['IdVendedor'];

    
        $enlace = AbrirBD();

        
        $stmt = $enlace->prepare("SELECT 1 FROM vendedores WHERE IdVendedor = ?");
        $stmt->bind_param("i", $IdVendedor);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            
            $resultado = RegistrarVehiculoModel($marca, $modelo, $color, $precio, $IdVendedor);

            if ($resultado === true) {
                header('Location: /ProyectoPractica2/View/registroVehiculos.php?mensaje=Vehículo registrado exitosamente');
            } else {
                $error = urlencode($resultado);
                header("Location: /ProyectoPractica2/View/registroVehiculos.php?mensaje=Error en el registro: $error");
            }
        } else {
            // Si el vendedor no existe, mostramos un mensaje de error
            header("Location: /ProyectoPractica2/View/registroVehiculos.php?mensaje=Error: El vendedor no existe.");
        }

        
        $stmt->close();
        CerrarBD($enlace);
    }
} catch (Exception $e) {
    echo "<p>Error en el registro: " . $e->getMessage() . "</p>";
}
?>
