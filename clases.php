
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
$sql = "SELECT clases_id, nombre, descripcion, fecha_inicio, fecha_fin, profesor_id  FROM Clases";
$result = $conn->query($sql);

include_once("./includes/head.php");
include_once("./includes/header.php");
// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar la tabla HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>profesor id</th></tr>";

    // Iterar sobre los resultados y mostrar cada fila
    // Iterar sobre los resultados y mostrar cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["clases_id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["descripcion"] . "</td>";
        echo "<td>" . $row["fecha_inicio"] . "</td>";
        echo "<td>" . $row["fecha_fin"] . "</td>";
        echo "<td>" . $row["profesor_id"] . "</td>";
        echo "</tr>";
    }


    echo "</table>";
} else {
    echo "No se encontraron resultados";
}

// Cerrar la conexión a la base de datos
$conn->close();
