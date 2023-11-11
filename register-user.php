<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la conexión a la base de datos (reemplaza con tus propios datos)
    $db_host = "localhost";
    $db_usuario = "root";
    $db_contrasena = "Monitor!1";
    $db_nombre = "artcademy";

    // Conexión a la base de datos
    $conexion = new mysqli($db_host, $db_usuario, $db_contrasena, $db_nombre);

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión");
    }

    // Datos del formulario
    $nombre = trim($_POST["nombre"]);
    $contrasena = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    // Query para insertar el usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, contrasena) VALUES ('$nombre', '$contrasena')";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
