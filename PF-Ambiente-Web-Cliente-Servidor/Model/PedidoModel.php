<?php
include_once 'BaseDatos.php';

// Insertar un nuevo pedido
function InsertarPedidoModel($idCliente, $estadoPedido, $totalPedido) {
    try {
        $enlace = AbrirBD();
        $sentencia = "CALL sp_insertarPedido($idCliente, '$estadoPedido', $totalPedido)";
        $resultado = $enlace->query($sentencia);
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        error_log("Error en InsertarPedidoModel: " . $ex->getMessage());
        return null;
    }
}

// Actualizar un pedido existente
function ActualizarPedidoModel($idPedido, $estadoPedido, $totalPedido) {
    try {
        $enlace = AbrirBD();
        $sentencia = "CALL sp_actualizarPedido($idPedido, '$estadoPedido', $totalPedido)";
        $resultado = $enlace->query($sentencia);
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        error_log("Error en ActualizarPedidoModel: " . $ex->getMessage());
        return null;
    }
}

// Desactivar un pedido
function DesactivarPedidoModel($idPedido) {
    try {
        $enlace = AbrirBD();
        $sentencia = "CALL sp_desactivarPedido($idPedido)";
        $resultado = $enlace->query($sentencia);
        CerrarBD($enlace);
        return $resultado;
    } catch (Exception $ex) {
        error_log("Error en DesactivarPedidoModel: " . $ex->getMessage());
        return null;
    }
}

// Obtener todos los pedidos
function ObtenerTodosLosPedidosModel() {
    try {
        $enlace = AbrirBD();
        $sentencia = "CALL sp_obtenerPedidos()";
        $resultado = $enlace->query($sentencia);
        $pedidos = [];

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $pedidos[] = $fila;
            }
        }

        CerrarBD($enlace);
        return $pedidos;
    } catch (Exception $ex) {
        error_log("Error en ObtenerTodosLosPedidosModel: " . $ex->getMessage());
        return [];
    }
}

// Obtener un pedido por ID
function ObtenerPedidoPorIDModel($idPedido) {
    try {
        $enlace = AbrirBD();
        $sentencia = "CALL sp_obtenerPedidoPorID($idPedido)";
        $resultado = $enlace->query($sentencia);
        $pedido = null;

        if ($resultado && $resultado->num_rows > 0) {
            $pedido = $resultado->fetch_assoc();
        }

        CerrarBD($enlace);
        return $pedido;
    } catch (Exception $ex) {
        error_log("Error en ObtenerPedidoPorIDModel: " . $ex->getMessage());
        return null;
    }
}

// Obtener los detalles de un pedido
function ObtenerDetallesPedidoModel($idPedido) {
    try {
        $enlace = AbrirBD();
        $sentencia = "CALL sp_obtenerDetallesPedido($idPedido)";
        $resultado = $enlace->query($sentencia);
        $detalles = [];

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $detalles[] = $fila;
            }
        }

        CerrarBD($enlace);
        return $detalles;
    } catch (Exception $ex) {
        error_log("Error en ObtenerDetallesPedidoModel: " . $ex->getMessage());
        return [];
    }
}

// Obtener clientes activos desde dropdown
function ObtenerClientesActivosModel() {
    try {
        $enlace = AbrirBD();
        $sentencia = "SELECT ID_Cliente, Nombre_Completo FROM clientes WHERE Activo = 1";
        $resultado = $enlace->query($sentencia);
        $clientes = [];

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $clientes[] = $fila;
            }
        }

        CerrarBD($enlace);
        return $clientes;
    } catch (Exception $ex) {
        error_log("Error en ObtenerClientesActivosModel: " . $ex->getMessage());
        return [];
    }
}
?>