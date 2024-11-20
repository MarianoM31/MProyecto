<?php
include_once '../Model/FacturaModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Mensajes de sesion
function setMensaje($mensaje, $tipo) {
    $_SESSION['mensaje'] = $mensaje;
    $_SESSION['tipo_mensaje'] = $tipo;
}

// Datos Vista principal
$facturas = ObtenerTodasLasFacturasModel();
$pedidosPendientes = ObtenerPedidosPendientesFacturacionModel();

// Insertar una nueva factura
if (isset($_POST["btnInsertarFactura"])) {
    $id_pedido = $_POST["txtPedido"];
    $monto = $_POST["txtMonto"];
    $metodo_pago = $_POST["txtMetodoPago"];

    // Validaciones 
    if (empty($id_pedido) || empty($monto) || empty($metodo_pago)) {
        setMensaje("Todos los campos son requeridos.", "danger");
        header('Location: ../View/gestionFacturas.php');
        exit();
    }

    // Validar que el monto sea un num positivo
    if (!is_numeric($monto) || $monto <= 0) {
        setMensaje("El monto debe ser un número mayor que cero.", "danger");
        header('Location: ../View/gestionFacturas.php');
        exit();
    }

    $resultado = InsertarFacturaModel($id_pedido, $monto, $metodo_pago);

    if ($resultado) {
        setMensaje("Factura registrada exitosamente.", "success");
    } else {
        setMensaje("Error al registrar la factura. Por favor, intenta nuevamente.", "danger");
    }

    header('Location: ../View/gestionFacturas.php');
    exit();
}

// Anular una factura
if (isset($_POST["accion"]) && $_POST["accion"] === "anular") {
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;

    if ($id > 0) {
        // Primero obtener la factura para verificar que existe
        $factura = ObtenerFacturaPorIDModel($id);
        
        if ($factura) {
            $resultado = AnularFacturaModel($id);

            if ($resultado) {
                setMensaje("Factura anulada exitosamente.", "success");
            } else {
                setMensaje("Error al anular la factura. Por favor, intenta nuevamente.", "danger");
            }
        } else {
            setMensaje("La factura no existe o ya fue anulada.", "danger");
        }
    } else {
        setMensaje("ID de factura no válido.", "danger");
    }

    header('Location: ../View/gestionFacturas.php');
    exit();
}

// Ver detalles de una factura
if (isset($_POST["accion"]) && $_POST["accion"] === "ver") {
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;

    if ($id > 0) {
        $factura = ObtenerFacturaPorIDModel($id);
        
        if ($factura) {
            $_SESSION['factura_detalle'] = $factura;
            header('Location: ../View/detalleFactura.php');
            exit();
        } else {
            setMensaje("No se encontró la factura solicitada.", "danger");
        }
    } else {
        setMensaje("ID de factura no válido.", "danger");
    }

    header('Location: ../View/gestionFacturas.php');
    exit();
}

// Obtener datos de factura para editar
if (isset($_POST["accion"]) && $_POST["accion"] === "editar") {
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;

    if ($id > 0) {
        $factura = ObtenerFacturaPorIDModel($id);
        
        if ($factura && $factura['Estado_Pago'] !== 'ANULADO') {
            $_SESSION['factura_a_editar'] = $factura;
            header('Location: ../View/editarFactura.php');
            exit();
        } else {
            setMensaje("La factura no existe o no se puede editar.", "danger");
        }
    } else {
        setMensaje("ID de factura no válido.", "danger");
    }

    header('Location: ../View/gestionFacturas.php');
    exit();
}

// Obtener el monto del pedido
function obtenerMontoPedido($id_pedido) {
    $pedidosPendientes = ObtenerPedidosPendientesFacturacionModel();
    foreach ($pedidosPendientes as $pedido) {
        if ($pedido['ID_Pedido'] == $id_pedido) {
            return $pedido['Total_Pedido'];
        }
    }
    return 0;
}

// Endpoint para obtener el monto del pedido mediante AJAX
if (isset($_POST["accion"]) && $_POST["accion"] === "obtenerMontoPedido") {
    $id_pedido = isset($_POST["id_pedido"]) ? intval($_POST["id_pedido"]) : 0;
    $monto = obtenerMontoPedido($id_pedido);
    echo json_encode(["monto" => $monto]);
    exit();
}

// Actualizar una factura existente
if (isset($_POST["btnActualizarFactura"])) {
    $id_factura = $_POST["txtID"];
    $monto = $_POST["txtMonto"];
    $metodo_pago = $_POST["txtMetodoPago"];
    $estado = $_POST["txtEstado"];

    if (empty($id_factura) || empty($monto) || empty($metodo_pago) || empty($estado)) {
        setMensaje("Todos los campos son requeridos.", "danger");
    } else {
        $resultado = ActualizarFacturaModel($id_factura, $monto, $metodo_pago, $estado);

        if ($resultado) {
            setMensaje("Factura actualizada exitosamente.", "success");
        } else {
            setMensaje("Error al actualizar la factura.", "danger");
        }
    }

    header('Location: ../View/gestionFacturas.php');
    exit();
}
?>