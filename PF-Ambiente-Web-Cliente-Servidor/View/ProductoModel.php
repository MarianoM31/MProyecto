<?php
include_once 'BaseDatos.php';

// Insertar un producto
function InsertarProductoModel($nombre, $descripcion, $precio, $marca, $stock) {
    try {
        $enlace = AbrirBD();
        $sentencia = "CALL sp_insertarProducto('$nombre', '$descripcion', $precio, '$marca', $stock)";
        $resultado = $enlace->query($sentencia);
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        return null;
    }
}

function ActualizarProductoModel($id, $nombre, $descripcion, $precio, $marca, $stock) {
    try {
        $enlace = AbrirBD();
        
        // Usar prepared statement para mayor seguridad
        $stmt = $enlace->prepare("CALL sp_actualizarProducto(?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            error_log("Error preparando la consulta de actualización: " . $enlace->error);
            return false;
        }

        $stmt->bind_param("issdsi", $id, $nombre, $descripcion, $precio, $marca, $stock);
        
        $resultado = $stmt->execute();
        
        if (!$resultado) {
            error_log("Error ejecutando sp_actualizarProducto: " . $stmt->error);
            return false;
        }

        $stmt->close();
        CerrarBD($enlace);
        return true;
    } catch (Exception $ex) {
        error_log("Error en ActualizarProductoModel: " . $ex->getMessage());
        return false;
    }
}

// Desactivar un producto
function DesactivarProductoModel($id) {
    try {
        $enlace = AbrirBD();
        $sentencia = "CALL sp_desactivarProducto($id)";
        $resultado = $enlace->query($sentencia);
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        return null;
    }
}

// Obtener todos los productos
function ObtenerTodosLosProductosModel() {
    try {
        $enlace = AbrirBD();
        $sentencia = "SELECT * FROM productos WHERE Activo = 1";
        $resultado = $enlace->query($sentencia);
        $productos = [];

        if ($resultado) {
            $productos = $resultado->fetch_all(MYSQLI_ASSOC);
        }

        CerrarBD($enlace);
        return $productos;
    } catch (Exception $ex) {
        return [];
    }
}

// Obtener un producto por ID
function ObtenerProductoPorIDModel($id) {
    try {
        $enlace = AbrirBD();
        
        // Usar prepared statement para mayor seguridad
        $stmt = $enlace->prepare("SELECT * FROM productos WHERE ID_Producto = ? AND Activo = 1");
        if (!$stmt) {
            error_log("Error preparando la consulta: " . $enlace->error);
            return null;
        }

        $stmt->bind_param("i", $id);
        
        if (!$stmt->execute()) {
            error_log("Error ejecutando la consulta: " . $stmt->error);
            return null;
        }

        $resultado = $stmt->get_result();
        $producto = null;

        if ($resultado && $resultado->num_rows > 0) {
            $producto = $resultado->fetch_assoc();
        }

        $stmt->close();
        CerrarBD($enlace);
        return $producto;
    } catch (Exception $ex) {
        error_log("Error en ObtenerProductoPorIDModel: " . $ex->getMessage());
        return null;
    }
}


?>
