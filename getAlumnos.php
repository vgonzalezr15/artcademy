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
    echo("CONEXIÓN FALLIDA");
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla "alumnos"
$sql = "SELECT alumnos_id, nombre, fecha_nacimiento FROM alumnos";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar la tabla HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Fecha de Nacimiento</th><th>Acciones</th></tr>";

    // Iterar sobre los resultados y mostrar cada fila
    // Iterar sobre los resultados y mostrar cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["alumnos_id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["fecha_nacimiento"] . "</td>";
        echo "<td><a href='./eliminar-alumno.php?id=" . $row["alumnos_id"] . "'>Eliminar</a></td>";
        echo "</tr>";
    }


    echo "</table>";
} else {
    echo "No se encontraron resultados";
}

// Cerrar la conexión a la base de datos
$conn->close();
