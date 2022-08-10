<?php

    // Recibir datos que viajan de POST 
    print_r($_POST);

    // Validación
    if(!isset($_POST['codigo'])) {
        Header('Location:index.php?mensaje=error');
    }

    include './model/conexion.php';

    $codigo = $_POST['codigo'];
    $nombre = $_POST['inputNombre'];
    $edad = $_POST['inputEdad'];
    $signo = $_POST['inputSigno'];

    $sentencia = $bd->prepare("UPDATE empleados SET nombre = ?, edad = ?, signo = ? WHERE codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

    if ($resultado === TRUE) {
        header('Location:index.php?mensaje=editado');
    } else {
        header('Location:index.php?mensaje=error');
    }
?>