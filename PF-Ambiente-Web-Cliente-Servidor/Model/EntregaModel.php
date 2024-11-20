<?php
include_once 'BaseDatos.php';

// Obtener clientes disponibles
function ObtenerClientesDisponiblesModel() {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return [];

        $query = "SELECT ID_Usuario, Nombre_Usuario FROM usuarios WHERE Activo = 1 AND Rol = 'cliente'";
        $resultado = $enlace->query($query);
        $clientes = [];

        if ($resultado) {
            $clientes = $resultado->fetch_all(MYSQLI_ASSOC);
        }

        CerrarBD($enlace);
        return $clientes;
    } catch (Exception $ex) {
        error_log("Error en ObtenerClientesDisponiblesModel: " . $ex->getMessage());
        return [];
    }
}

// Insertar una entrega
function InsertarEntregaModel($id_pedido, $fecha_entrega, $estado_entrega, $direccion_entrega, $id_cliente) {
    try {
        $enlace = AbrirBD();
        if (!$enlace) {
            error_log("Error de conexión: " . mysqli_connect_error());
            return null;
        }

        $stmt = $enlace->prepare("INSERT INTO entregas (ID_Pedido, Fecha_Entrega, Estado_Entrega, Direccion_Entrega, ID_Responsable_Entrega) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            error_log("Error en la preparación: " . $enlace->error);
            return null;
        }

        $stmt->bind_param("isssi", $id_pedido, $fecha_entrega, $estado_entrega, $direccion_entrega, $id_cliente);
        $resultado = $stmt->execute();
        
        $stmt->close();
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        error_log("Error en InsertarEntregaModel: " . $ex->getMessage());
        return null;
    }
}

// Actualizar una entrega
function ActualizarEntregaModel($id_entrega, $id_pedido, $fecha_entrega, $estado_entrega, $direccion_entrega, $id_cliente) {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return null;

        $stmt = $enlace->prepare("UPDATE entregas SET 
                                 ID_Pedido = ?, 
                                 Fecha_Entrega = ?, 
                                 Estado_Entrega = ?, 
                                 Direccion_Entrega = ?, 
                                 ID_Responsable_Entrega = ?
                                 WHERE ID_Entrega = ? AND Activo = 1");
        
        if (!$stmt) return null;

        $stmt->bind_param("isssii", $id_pedido, $fecha_entrega, $estado_entrega, $direccion_entrega, $id_cliente, $id_entrega);
        $resultado = $stmt->execute();
        
        $stmt->close();
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        error_log("Error en ActualizarEntregaModel: " . $ex->getMessage());
        return null;
    }
}

// Desactivar una entrega
function DesactivarEntregaModel($id_entrega) {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return null;

        $stmt = $enlace->prepare("UPDATE entregas SET Activo = 0 WHERE ID_Entrega = ?");
        if (!$stmt) return null;

        $stmt->bind_param("i", $id_entrega);
        $resultado = $stmt->execute();
        
        $stmt->close();
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        error_log("Error en DesactivarEntregaModel: " . $ex->getMessage());
        return null;
    }
}

// Obtener todas las entregas activas
function ObtenerTodasLasEntregasModel() {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return [];

        $query = "SELECT e.*, u.Nombre_Usuario as Nombre_Cliente, p.Total_Pedido 
                 FROM entregas e 
                 LEFT JOIN usuarios u ON e.ID_Responsable_Entrega = u.ID_Usuario
                 LEFT JOIN pedidos p ON e.ID_Pedido = p.ID_Pedido 
                 WHERE e.Activo = 1";
                 
        $resultado = $enlace->query($query);
        $entregas = [];

        if ($resultado) {
            $entregas = $resultado->fetch_all(MYSQLI_ASSOC);
        }

        CerrarBD($enlace);
        return $entregas;
    } catch (Exception $ex) {
        error_log("Error en ObtenerTodasLasEntregasModel: " . $ex->getMessage());
        return [];
    }
}

// Obtener una entrega por ID
function ObtenerEntregaPorIDModel($id_entrega) {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return null;

        $stmt = $enlace->prepare("SELECT e.*, u.Nombre_Usuario as Nombre_Cliente 
                                 FROM entregas e
                                 LEFT JOIN usuarios u ON e.ID_Responsable_Entrega = u.ID_Usuario
                                 WHERE e.ID_Entrega = ? AND e.Activo = 1");
        if (!$stmt) return null;

        $stmt->bind_param("i", $id_entrega);
        $stmt->execute();
        
        $resultado = $stmt->get_result();
        $entrega = null;

        if ($resultado && $resultado->num_rows > 0) {
            $entrega = $resultado->fetch_assoc();
        }

        $stmt->close();
        CerrarBD($enlace);
        return $entrega;
    } catch (Exception $ex) {
        error_log("Error en ObtenerEntregaPorIDModel: " . $ex->getMessage());
        return null;
    }
}

// Obtener pedidos disponibles para entrega
function ObtenerPedidosDisponiblesModel() {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return [];

        $query = "SELECT ID_Pedido, Estado_Pedido, Total_Pedido FROM pedidos WHERE Activo = 1 AND Estado_Pedido = 'pendiente'";
        $resultado = $enlace->query($query);
        $pedidos = [];

        if ($resultado) {
            $pedidos = $resultado->fetch_all(MYSQLI_ASSOC);
        }

        CerrarBD($enlace);
        return $pedidos;
    } catch (Exception $ex) {
        error_log("Error en ObtenerPedidosDisponiblesModel: " . $ex->getMessage());
        return [];
    }
}
?>