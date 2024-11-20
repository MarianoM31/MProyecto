<?php

require_once '../layout.php';

IncluirHead('Inicio - Sistema de Gestión de Ejercicios');
MostrarMenu();
MostrarHeader();

?>

<main class="container mt-5">
    <div class="jumbotron text-center">
        <h1 class="display-4">Bienvenido al Sistema de Gestión de Ejercicios creado por Mariano Mora</h1>
        <p class="lead">Utiliza el menú para navegar entre las distintas opciones y gestionar tus ejercicios de manera fácil y eficiente.</p>
        <hr class="my-4">
        <p>Puedes comenzar registrando un nuevo ejercicio o ver todos los ejercicios ya registrados.</p>
        <a class="btn btn-success btn-lg" href="registroEjercicio.php" role="button">Registrar Ejercicio</a>
        <a class="btn btn-primary btn-lg" href="consultaEjercicio.php" role="button">Consulta de Registros</a>
    </div>
</main>

<?php
IncluirFooter();
?>
