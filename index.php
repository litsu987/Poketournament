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
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza el CSS -->
</head>
<body>
    <div class="container">
        <h1>Pokémon Login</h1>
        <h2>Login de Usuario</h2>
        <form action="login.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" name="username" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Login">
        </form>
        <br>
        <a href="register.php">Regístrate aquí</a>
    </div>
    
</body>
</html>
