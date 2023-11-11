<?php
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

// Consulta SQL para obtener los datos de la tabla "alumnos"
$sql = "SELECT profesores_id, nombre, especialidad FROM Profesores";
$result = $conn->query($sql);

include_once("./includes/head.php");
include_once("./includes/header.php");
// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar la tabla HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Especialidad</th></tr>";

    // Iterar sobre los resultados y mostrar cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["profesores_id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["especialidad"] . "</td>";
        echo "</tr>";
    }


    echo "</table>";
} else {
    echo "No se encontraron resultados";
}

// Cerrar la conexión a la base de datos
$conn->close();
