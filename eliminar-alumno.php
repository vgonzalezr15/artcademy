<?php
// Verificar si se ha enviado un ID válido
if (isset($_GET['id'])) {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "Monitor!1";
    $dbname = "artcademy";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el ID del alumno a eliminar
    $alumno_id = $_GET['id'];

    // Consulta SQL para eliminar al alumno
    $sql = "DELETE FROM Alumnos WHERE alumnos_id=$alumno_id";

    $conn->query($sql);

    header("Location: inicio.php");
    // Ejecutar la consulta

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "ID de alumno no válido";
}
