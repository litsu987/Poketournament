<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza el CSS -->
</head>
<body>
    <div class="container">
        <h1>Pokémon Welcome</h1>
        <p>¡Bienvenido, <?php echo $_SESSION['username']; ?>!</p>
        <p>Aquí tienes tu enlace al juego asignado: <a href="<?php echo $_SESSION['link']; ?>" target="_blank"><?php echo $_SESSION['link']; ?></a></p>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
