<?php
include 'db.php';

$sql = "SELECT * FROM compania";
$result = $conn->query($sql);

echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Lista de Usuarios</title>";
echo "<link rel='stylesheet' href='styles.css'>";
echo "</head>";
echo "<body>";

echo "<h1>Lista de Usuarios</h1>";

if ($result->num_rows > 0) {
    echo "<table class='tabla'><tr><th>Nombre</th><th>Edad</th><th>Fecha</th><th>VIP</th><th>Provincia</th><th>Acciones</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["Edad"] . "</td><td>" . $row["Fecha"] . "</td><td>" . $row["VIP"] . "</td><td>" . $row["Provincia"] . "</td>";
        echo "<td><a href='update.php?id=" . $row["id"] . "' class='boton'>Editar</a> | <a href='delete.php?id=" . $row["id"] . "' class='boton' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\");'>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron registros.</p>";
}

echo "<br><a href='create.php' class='boton'>Añadir Nuevo Usuario</a>";

echo "</body>";
echo "</html>";
?>

<a href="logout.php">Cerrar sesión</a> 