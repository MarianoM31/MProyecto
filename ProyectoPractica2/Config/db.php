<?php
function AbrirBD() {
    $enlace = mysqli_connect("127.0.0.1", "root", "Venus2024", "Practica2");
    if (!$enlace) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }
    return $enlace;
}

function CerrarBD($enlace) {
    mysqli_close($enlace);
}
?>