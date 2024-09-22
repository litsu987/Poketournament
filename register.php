<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ya está logueado
if (isset($_SESSION['username'])) {
    // Si ya está logueado, redirige a welcome.php
    header('Location: welcome.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza el CSS -->
</head>
<body>
    <div class="container">
        <h1>Pokémon Tournament</h1>
        <h2>Registro de Usuario</h2>
        <form action="save_user.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" name="username" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required><br>

            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" name="confirm_password" required><br>

            <input type="submit" value="Registrar">
        </form>
        <br>
        <p> <a href="index.php">Volver al Login</a></p> <!-- Enlace al login -->
    </div>
</body>
</html>
