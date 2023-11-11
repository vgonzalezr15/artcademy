<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la conexión a la base de datos (reemplaza con tus propios datos)
    $db_host = "localhost";
    $db_usuario = "root";
    $db_password = "Monitor!1";
    $db_nombre = "artcademy";

    // Conexión a la base de datos
    $conexion = new mysqli($db_host, $db_usuario, $db_password, $db_nombre);

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión");
    }

    // Datos del formulario
    $nombre = trim($_POST["nombre"]);
    $date = trim($_POST["fecha-nacimiento"]);

    // Query para insertar el usuario en la base de datos
    $sql = "INSERT INTO Alumnos (nombre, fecha_nacimiento) VALUES ('$nombre', '$date')";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql) === TRUE) {
        header("Location: inicio.php");
    } else {
        echo "Error al registrar el alumno: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
