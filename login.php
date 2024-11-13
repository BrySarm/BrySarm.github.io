<?php
include 'dblog.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: read.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="styleslog.css">
</head>
<body>
    <div class="container"> 
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" name="username" placeholder="Introduce tu usuario" required><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" placeholder="Introduce tu contraseña" required><br>
            <button type="submit">Iniciar sesión</button>
        </form>
        <a href="register.php">Registrarse</a>
    </div>
</body>
</html>
