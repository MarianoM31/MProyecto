<!-- <?php

    function AbrirBD()
    {   //Conecta a la base de datos
        return mysqli_connect("127.0.0.1", "root", "123456", "smellelegance_db", 3307);
    }

    //Cierra la conexión a la base de datos
    function CerrarBD($enlace)
    {
        mysqli_close($enlace);
    }

?> -->

<?php
$enlace = mysqli_connect("127.0.0.1", "root", "123456", "smellelegance_db", 3307);

if (!$enlace) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
echo "Conexión exitosa a la base de datos";
?>
