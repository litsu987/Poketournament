<?php
// Inicia la sesión
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirige al formulario de login
header('Location: index.php');
exit();
?>
