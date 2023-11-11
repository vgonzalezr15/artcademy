<?php
session_start();

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
        echo("CONEXIÓN FALLIDA");
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Datos del formulario
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["pass"];

    // Consulta SQL para buscar el usuario en la base de datos
    $sql = "SELECT id, nombre, contrasena FROM usuarios WHERE nombre = '$nombre'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $contrasena_hash = $fila["contrasena"];

        if (password_verify($contrasena, $contrasena_hash)) {
            // Contraseña válida, inicia la sesión
            $_SESSION["usuario_id"] = $fila["id"];
            $_SESSION["usuario_nombre"] = $fila["nombre"];
            header("Location: inicio.php"); // Redirige a la página de inicio
        } else {
            header("Location: err.php"); // Redirige a la página de error
        }
    } else {
        header("Location: err.php"); // Redirige a la página de error
    }

    // Cierra la conexión
    $conexion->close();
}
