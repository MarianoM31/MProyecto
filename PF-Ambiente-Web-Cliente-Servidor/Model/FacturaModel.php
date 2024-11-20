<?php
include_once 'BaseDatos.php';

// Obtener todas las facturas activas
function ObtenerTodasLasFacturasModel() {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return [];

        $resultado = $enlace->query("CALL sp_obtenerTodosLosPagos()");
        $facturas = [];

        if ($resultado) {
            $facturas = $resultado->fetch_all(MYSQLI_ASSOC);
        }

        CerrarBD($enlace);
        return $facturas;
    } catch (Exception $ex) {
        error_log("Error en ObtenerTodasLasFacturasModel: " . $ex->getMessage());
        return [];
    }
}

// Insertar una nueva factura/pago
function InsertarFacturaModel($id_pedido, $monto, $metodo_pago) {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return null;

        $sentencia = "CALL sp_insertarPago($id_pedido, $monto, '$metodo_pago')";
        $resultado = $enlace->query($sentencia);
        
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        error_log("Error en InsertarFacturaModel: " . $ex->getMessage());
        return null;
    }
}

// Actualizar una factura
function ActualizarFacturaModel($id_factura, $monto, $metodo_pago, $estado) {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return null;

        $sentencia = "CALL sp_actualizarPago($id_factura, $monto, '$metodo_pago', '$estado')";
        $resultado = $enlace->query($sentencia);
        
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        error_log("Error en ActualizarFacturaModel: " . $ex->getMessage());
        return false;
    }
}

// Anular factura (desactivar)
function AnularFacturaModel($id_factura) {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return null;

        $sentencia = "CALL sp_desactivarPago($id_factura)";
        $resultado = $enlace->query($sentencia);
        
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        error_log("Error en AnularFacturaModel: " . $ex->getMessage());
        return null;
    }
}

// Obtener factura por ID
function ObtenerFacturaPorIDModel($id_factura) {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return null;

        $resultado = $enlace->query("CALL sp_obtenerPagoPorID($id_factura)");
        $factura = null;

        if ($resultado && $resultado->num_rows > 0) {
            $factura = $resultado->fetch_assoc();
        }

        CerrarBD($enlace);
        return $factura;
    } catch (Exception $ex) {
        error_log("Error en ObtenerFacturaPorIDModel: " . $ex->getMessage());
        return null;
    }
}

// Obtener pedidos pendientes de facturación
function ObtenerPedidosPendientesFacturacionModel() {
    try {
        $enlace = AbrirBD();
        if (!$enlace) return [];

        $query = "SELECT p.ID_Pedido, 
                        p.Total_Pedido,
                        p.Fecha_Pedido,
                        c.Nombre_Completo as Cliente
                 FROM pedidos p
                 LEFT JOIN clientes c ON p.ID_Cliente = c.ID_Cliente
                 WHERE p.Estado_Pedido = 'pendiente' 
                 AND p.Activo = 1
                 AND NOT EXISTS (
                     SELECT 1 FROM pagos pg 
                     WHERE pg.ID_Pedido = p.ID_Pedido 
                     AND pg.Activo = 1
                 )";

        $resultado = $enlace->query($query);
        $pedidos = [];

        if ($resultado) {
            $pedidos = $resultado->fetch_all(MYSQLI_ASSOC);
        }

        CerrarBD($enlace);
        return $pedidos;
    } catch (Exception $ex) {
        error_log("Error en ObtenerPedidosPendientesFacturacionModel: " . $ex->getMessage());
        return [];
    }
}
?>