<?php
include_once '../Model/PedidoModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Obtener todos los pedidos para mostrarlos en la vista
$pedidos = ObtenerTodosLosPedidosModel();


function setMensaje($mensaje, $tipo) {
    $_SESSION['mensaje'] = $mensaje;
    $_SESSION['tipo_mensaje'] = $tipo;
}

// Insertar un nuevo pedido
if (isset($_POST["btnInsertarPedido"])) {
    $idCliente = $_POST["txtCliente"];
    $estadoPedido = $_POST["txtEstado"];
    $totalPedido = $_POST["txtTotal"];

    $resultado = InsertarPedidoModel($idCliente, $estadoPedido, $totalPedido);

    if ($resultado) {
        setMensaje("Pedido insertado exitosamente.", "success");
    } else {
        setMensaje("Error al insertar el pedido.", "danger");
    }

    header('Location: ../View/gestionPedidos.php');
    exit();
}

// Actualizar un pedido existente
if (isset($_POST["btnActualizarPedido"])) {
    $idPedido = $_POST["txtID"];
    $estadoPedido = $_POST["txtEstado"];
    $totalPedido = $_POST["txtTotal"];

    $resultado = ActualizarPedidoModel($idPedido, $estadoPedido, $totalPedido);

    if ($resultado) {
        setMensaje("Pedido actualizado exitosamente.", "success");
    } else {
        setMensaje("Error al actualizar el pedido.", "danger");
    }

    header('Location: ../View/gestionPedidos.php');
    exit();
}

// Eliminar un pedido
if (isset($_POST["accion"]) && $_POST["accion"] === "eliminar") {
    $idPedido = isset($_POST["id"]) ? intval($_POST["id"]) : 0;
    
    if ($idPedido > 0) {
        $resultado = DesactivarPedidoModel($idPedido);
        
        if ($resultado) {
            setMensaje("Pedido eliminado exitosamente.", "success");
        } else {
            setMensaje("Error al eliminar el pedido.", "danger");
        }
    }

    header('Location: ../View/gestionPedidos.php');
    exit();
}

// Cargar pedido para editar
if (isset($_POST["accion"]) && $_POST["accion"] === "editar") {
    $idPedido = isset($_POST["id"]) ? intval($_POST["id"]) : 0;
    
    if ($idPedido > 0) {
        $pedido = ObtenerPedidoPorIDModel($idPedido);
        
        if ($pedido) {
            $_SESSION['pedido_a_editar'] = $pedido;
            header('Location: ../View/editarPedido.php');
            exit();
        }
    }
    
    setMensaje("Error al cargar el pedido para editar.", "danger");
    header('Location: ../View/gestionPedidos.php');
    exit();
}

// Ver detalles del pedido
if (isset($_POST["accion"]) && $_POST["accion"] === "verDetalles") {
    $idPedido = isset($_POST["id"]) ? intval($_POST["id"]) : 0;
    
    if ($idPedido > 0) {
        $detalles = ObtenerDetallesPedidoModel($idPedido);
        
        if ($detalles) {
            $_SESSION['detalles_pedido'] = $detalles;
            $_SESSION['id_pedido_actual'] = $idPedido;
            header('Location: ../View/detallesPedido.php');
            exit();
        }
    }
    
    setMensaje("Error al cargar los detalles del pedido.", "danger");
    header('Location: ../View/gestionPedidos.php');
    exit();
}
?>