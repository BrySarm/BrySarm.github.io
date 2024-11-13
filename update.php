<?php
include 'db.php';

// Verificar si se ha recibido el id desde la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del registro actual para llenarlos en el formulario
    $sql = "SELECT * FROM compania WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el registro.";
        exit;
    }
} else {
    echo "No se proporcionó un ID válido.";
    exit;
}

// Verificar si el formulario fue enviado para actualizar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['Edad'];
    $fecha = $_POST['Fecha'];
    $vip = $_POST['VIP'];
    $provincia = $_POST['Seleccione'];

    // Actualizar los datos en la base de datos
    $sql_update = "UPDATE compania SET nombre='$nombre', Edad=$edad, Fecha='$fecha', VIP='$vip', Provincia='$provincia' WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Registro actualizado exitosamente.";
        // Redirigir a la página de lectura para mostrar los datos actualizados
        header("Location: read.php");
        exit;
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}
?>

<link rel="stylesheet" href="styles.css">

<!-- Formulario para editar -->
<form action="update.php?id=<?php echo $row['id']; ?>" method="post">
    <label>Nombre:</label><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>
    <label>Edad:</label><input type="number" name="Edad" value="<?php echo $row['Edad']; ?>" required><br>
    <label>Fecha:</label><input type="date" name="Fecha" value="<?php echo $row['Fecha']; ?>" required><br>
    <label>VIP:</label>
    <input type="radio" name="VIP" value="si" <?php echo $row['VIP'] == 'si' ? 'checked' : ''; ?>>Si
    <input type="radio" name="VIP" value="no" <?php echo $row['VIP'] == 'no' ? 'checked' : ''; ?>>No<br>
    <label>Provincia:</label>
    <select name="Seleccione">
        <option <?php echo $row['Provincia'] == 'Madrid' ? 'selected' : ''; ?>>Madrid</option>
        <option <?php echo $row['Provincia'] == 'Sevilla' ? 'selected' : ''; ?>>Sevilla</option>
        <option <?php echo $row['Provincia'] == 'Bilbao' ? 'selected' : ''; ?>>Bilbao</option>
        <option <?php echo $row['Provincia'] == 'Barcelona' ? 'selected' : ''; ?>>Barcelona</option>
    </select><br><br>
    <input type="submit" value="Actualizar">
</form>