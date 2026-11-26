<?php

$conexion = mysqli_connect("localhost", "root", "", "biblioteca");

if (!$conexion) {
    die("Error al conectar con la base de datos");
}

// REGISTRAR SOCIO

if (isset($_POST["registrar"])) {

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = password_hash($_POST["clave"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO socios (nombre, correo, clave)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nombre, $correo, $clave);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('¡Socio registrado correctamente!');</script>";
    } else {
        echo "<script>alert('Error al registrar socio');</script>";
    }
}

// CONTADOR DE SOCIOS

$sql = "SELECT COUNT(*) AS cantidad FROM socios";

$resultado = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_assoc($resultado);

$cantidadSocios = $fila["cantidad"];

