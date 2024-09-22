<?php
// Inicia la sesión
session_start();

// Verifica si el formulario fue enviado
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    // Redirige automáticamente al formulario de login si no se enviaron datos
    header('Location: index.php');
    exit();
}

// Obtiene los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Abre el archivo users.txt en modo lectura
$file = fopen('users.txt', 'r');

// Bandera para indicar si el usuario fue encontrado
$login_successful = false;
$assigned_link = "";

// Lee el archivo línea por línea
while (($line = fgets($file)) !== false) {
    // Separa la línea en usuario, contraseña y enlace
    list($stored_username, $stored_password, $stored_link) = explode('|', trim($line));

    // Verifica si el usuario coincide y la contraseña es correcta
    if ($username === $stored_username && password_verify($password, $stored_password)) {
        $login_successful = true;
        $assigned_link = $stored_link; // Guarda el enlace asignado
        // Guarda el usuario en la sesión
        $_SESSION['username'] = $username;
        $_SESSION['link'] = $assigned_link; // Guarda también el enlace del usuario
        break;
    }
}

// Cierra el archivo
fclose($file);

// Si el login es exitoso, redirige a la página protegida
if ($login_successful) {
    header('Location: welcome.php'); // Redirige a la página donde se muestra el enlace
    exit();
} else {
    echo "Usuario o contraseña incorrectos. <a href='index.php'>Intentar de nuevo</a>";
}
?>
