
<?php

$conexion = mysqli_connect("localhost", "root", "", "biblioteca");

if (!$conexion) {
    die("Error al conectar con la base de datos");
}


// RESERVAR LIBRO

if (isset($_POST["reservar"])) {

    $libro = $_POST["libro"];

    $sql = "INSERT INTO reservas (libro, estado)
            VALUES (?, 'Reservado')";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $libro);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('¡Libro reservado correctamente!');</script>";
    } else {
        echo "<script>alert('Error al reservar libro');</script>";
    }
}


// COMPRAR LIBROS//

if (isset($_POST["comprar"])) {

    $libro = $_POST["libro"];
    $precio = $_POST["precio"];

    $sql = "INSERT INTO compras (libro, precio)
            VALUES (?, ?)";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "si", $libro, $precio);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('¡Compra registrada correctamente!');</script>";
    } else {
        echo "<script>alert('Error al realizar la compra');</script>";
    }
}

?>
