<?php
include_once '../Model/ProductoModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Obtener todos los productos para mostrarlos en la vista
$productos = ObtenerTodosLosProductosModel();

// Función para establecer mensajes de sesión
function setMensaje($mensaje, $tipo) {
    $_SESSION['mensaje'] = $mensaje;
    $_SESSION['tipo_mensaje'] = $tipo;
}

// Insertar un nuevo producto
if (isset($_POST["btnInsertarProducto"])) {
    $nombre = $_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    $precio = $_POST["txtPrecio"];
    $marca = $_POST["txtMarca"];
    $stock = $_POST["txtStock"];

    $resultado = InsertarProductoModel($nombre, $descripcion, $precio, $marca, $stock);

    if ($resultado) {
        setMensaje("Producto insertado exitosamente.", "success");
    } else {
        setMensaje("Error al insertar el producto. Por favor, intenta nuevamente.", "danger");
    }

    header('Location: ../View/gestionProducto.php');
    exit();
}

// Desactivar un producto (eliminar)
if (isset($_POST["accion"]) && $_POST["accion"] === "eliminar") {
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;

    if ($id > 0) {
        $resultado = DesactivarProductoModel($id);

        if ($resultado) {
            setMensaje("Producto eliminado exitosamente.", "success");
        } else {
            setMensaje("Error al eliminar el producto. Por favor, intenta nuevamente.", "danger");
        }
    } else {
        setMensaje("ID del producto no válido.", "danger");
    }

    header('Location: ../View/gestionProducto.php');
    exit();
}

// Cargar datos para editar un producto existente
if (isset($_POST["accion"]) && $_POST["accion"] === "editar") {
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;

    if ($id > 0) {
        $producto = ObtenerProductoPorIDModel($id);
        
        if ($producto) {
            $_SESSION['producto_a_editar'] = $producto;




            header('Location: ../View/editarProducto.php');
            exit();
        } else {
            setMensaje("No se encontró el producto para editar.", "danger");
        }
    } else {
        setMensaje("ID del producto no válido.", "danger");
    }

    header('Location: ../View/gestionProducto.php');
    exit();
}


// Actualizar un producto existente
if (isset($_POST["btnActualizarProducto"])) {
    $id = $_POST["txtID"];
    $nombre = $_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    $precio = $_POST["txtPrecio"];
    $marca = $_POST["txtMarca"];
    $stock = $_POST["txtStock"];


    $resultado = ActualizarProductoModel($id, $nombre, $descripcion, $precio, $marca, $stock);

    if ($resultado) {
        setMensaje("Producto actualizado exitosamente.", "success");
    } else {
        setMensaje("Error al actualizar el producto. Por favor, intenta nuevamente.", "danger");
    }

    header('Location: ../View/gestionProducto.php');
    exit();
}


?>