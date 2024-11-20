<?php
include_once '../Model/EntregaModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función para establecer mensajes de sesión
function setMensaje($mensaje, $tipo) {
    $_SESSION['mensaje'] = $mensaje;
    $_SESSION['tipo_mensaje'] = $tipo;
}

// Obtener todas las entregas para mostrarlas en la vista
$entregas = ObtenerTodasLasEntregasModel();
$pedidosDisponibles = ObtenerPedidosDisponiblesModel();
$clientesDisponibles = ObtenerClientesDisponiblesModel();

// Insertar una nueva entrega
if (isset($_POST["btnInsertarEntrega"])) {
    $id_pedido = $_POST["txtPedido"];
    $fecha_entrega = $_POST["txtFechaEntrega"];
    $estado_entrega = $_POST["txtEstadoEntrega"];
    $direccion_entrega = $_POST["txtDireccionEntrega"];
    $id_cliente = $_POST["txtMensajero"]; // Mantenemos el nombre del campo por compatibilidad

    $resultado = InsertarEntregaModel($id_pedido, $fecha_entrega, $estado_entrega, $direccion_entrega, $id_cliente);

    if ($resultado) {
        setMensaje("Entrega registrada exitosamente.", "success");
    } else {
        setMensaje("Error al registrar la entrega. Por favor, intenta nuevamente.", "danger");
    }

    header('Location: ../View/gestionEntrega.php');
    exit();
}

// Desactivar una entrega
if (isset($_POST["accion"]) && $_POST["accion"] === "eliminar") {
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;

    if ($id > 0) {
        $resultado = DesactivarEntregaModel($id);

        if ($resultado) {
            setMensaje("Entrega eliminada exitosamente.", "success");
        } else {
            setMensaje("Error al eliminar la entrega. Por favor, intenta nuevamente.", "danger");
        }
    } else {
        setMensaje("ID de entrega no válido.", "danger");
    }

    header('Location: ../View/gestionEntrega.php');
    exit();
}

// Cargar datos para editar una entrega existente
if (isset($_POST["accion"]) && $_POST["accion"] === "editar") {
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;

    if ($id > 0) {
        $entrega = ObtenerEntregaPorIDModel($id);
        
        if ($entrega) {
            $_SESSION['entrega_a_editar'] = $entrega;
            header('Location: ../View/editarEntrega.php');
            exit();
        } else {
            setMensaje("No se encontró la entrega para editar.", "danger");
        }
    } else {
        setMensaje("ID de entrega no válido.", "danger");
    }

    header('Location: ../View/gestionEntrega.php');
    exit();
}

// Actualizar una entrega existente
if (isset($_POST["btnActualizarEntrega"])) {
    $id_entrega = $_POST["txtID"];
    $id_pedido = $_POST["txtPedido"];
    $fecha_entrega = $_POST["txtFechaEntrega"];
    $estado_entrega = $_POST["txtEstadoEntrega"];
    $direccion_entrega = $_POST["txtDireccionEntrega"];

    $entrega_actual = ObtenerEntregaPorIDModel($id_entrega);
    $id_responsable = $entrega_actual['ID_Responsable_Entrega'];

    $resultado = ActualizarEntregaModel($id_entrega, $id_pedido, $fecha_entrega, $estado_entrega, $direccion_entrega, $id_responsable);

    if ($resultado) {
        setMensaje("Entrega actualizada exitosamente.", "success");
    } else {
        setMensaje("Error al actualizar la entrega. Por favor, intenta nuevamente.", "danger");
    }

    header('Location: ../View/gestionEntrega.php');
    exit();
}
?>