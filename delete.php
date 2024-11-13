<?php
include 'db.php';

// Verifica que se reciba el `id` desde la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ejecuta la consulta de eliminación
    $sql = "DELETE FROM compania WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "No se recibió un id válido para eliminar.";
}

// Redirige de vuelta a `read.php` después de la eliminación
header("Location: read.php");
exit;
?>

<link rel="stylesheet" href="styles.css">