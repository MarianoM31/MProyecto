<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Caso1/Config/db.php';


function ObtenerTiposDeEjercicioModel() {
    try {
        $enlace = AbrirBD();
        $sql = "SELECT TipoEjercicio, DescripcionTipoEjercicio FROM tiposejercicio";
        $result = $enlace->query($sql);

        $tipos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tipos[] = $row;
            }
        }

        CerrarBD($enlace);
        return $tipos;
    } catch (Exception $ex) {
        return [];
    }
}
?>
