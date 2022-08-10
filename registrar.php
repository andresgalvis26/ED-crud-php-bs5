<!-- Capturar la información que se envía del formulario -->
<!-- Y procesarla -->


<!-- 1RO - Validación -->
<?php 

    // print_r($_POST);

    if(empty($_POST['oculto']) || empty($_POST['inputNombre']) || empty($_POST['inputEdad']) || empty($_POST['inputSigno'])) {
        // Si falta un dato, que lo regrese a index.php
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once './model/conexion.php';

    $nombre = $_POST['inputNombre'];
    $edad = $_POST['inputEdad'];
    $signo = $_POST['inputSigno'];

    $sentencia = $bd->prepare("INSERT INTO empleados(nombre, edad, signo) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre, $edad, $signo]);

    if ($resultado === true ) {
        Header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=falta');
        exit();
    }

?>