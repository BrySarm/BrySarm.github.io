<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['Edad'];
    $fecha = $_POST['Fecha'];
    $vip = $_POST['VIP'];
    $provincia = $_POST['Seleccione'];

    // Insertar los datos en la base de datos
    $sql_insert = "INSERT INTO compania (nombre, Edad, Fecha, VIP, Provincia) VALUES ('$nombre', $edad, '$fecha', '$vip', '$provincia')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Nuevo registro creado exitosamente.";
        // Redirigir a la página de lectura
        header("Location: read.php");
        exit;
    } else {
        echo "Error al crear el registro: " . $conn->error;
    }
}
?>

<link rel="stylesheet" href="styles.css">

<h1>Agregar Nuevo Usuario</h1>

<form action="create.php" method="post" class="formulario">
    <label>Nombre:</label><input type="text" name="nombre" required><br>
    <label>Edad:</label><input type="number" name="Edad" required><br>
    <label>Fecha:</label><input type="date" name="Fecha" required><br>
    <label>VIP:</label>
    <input type="radio" name="VIP" value="si">Si
    <input type="radio" name="VIP" value="no">No<br>
    <label>Provincia:</label>
    <select name="Seleccione">
        <option value="Madrid">Madrid</option>
        <option value="Sevilla">Sevilla</option>
        <option value="Bilbao">Bilbao</option>
        <option value="Barcelona">Barcelona</option>
    </select><br><br>
    <input type="submit" value="Guardar" class="boton">
</form>