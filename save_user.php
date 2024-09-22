<?php
// Función para contar el número de usuarios registrados
function count_users() {
    if (!file_exists('users.txt')) {
        return 0;
    }
    $file = fopen('users.txt', 'r');
    $user_count = 0;

    // Recorre cada línea (cada usuario) y cuenta
    while (fgets($file) !== false) {
        $user_count++;
    }
    
    fclose($file);
    return $user_count;
}

// Función para verificar si un usuario ya está registrado
function user_exists($username) {
    if (!file_exists('users.txt')) {
        return false; // Si no existe el archivo, no hay usuarios
    }
    
    $file = fopen('users.txt', 'r');
    
    // Recorre cada línea y verifica si el usuario ya está registrado
    while (($line = fgets($file)) !== false) {
        list($stored_username, , ) = explode('|', trim($line)); // Ignora la contraseña y el enlace
        if ($stored_username === $username) {
            fclose($file);
            return true; // El usuario ya está registrado
        }
    }
    
    fclose($file);
    return false;
}

// Lista de 16 enlaces
$links = [
    "https://drive.google.com/file/d/12XXyWjAMF10wpYcSqmFW6WmPNnblTlLS/view?usp=sharing",
    "https://drive.google.com/file/d/1kkrJRWyzraf10yGboZf6m7rXEb4o5RkR/view?usp=sharing",
    "https://drive.google.com/file/d/1UNTLaR-OpTZukRT19kiBnMmT8l_oH456/view?usp=sharing",
    "https://drive.google.com/file/d/1z2xbk57ZqeS_VTF_Dyl_SIfR-f-vnm1h/view?usp=sharing",
    "https://drive.google.com/file/d/1lRUt31kTslXxYpWWd96LKmPh7ZBKIQMs/view?usp=sharing",
    "https://drive.google.com/file/d/1G6ibHwp2NVL36DeaiDqVSVXSqzsIAlts/view?usp=sharing",
    "https://drive.google.com/file/d/1ACJg3SXALDewlKn8-aX7sT2DMnUUKKH1/view?usp=sharing",
    "https://drive.google.com/file/d/1eNIjFS6Ohk9MDtO1Ho6Vu9womTWEaFSJ/view?usp=sharing",
    "https://drive.google.com/file/d/1ISgjtB_ZH6LwfHU9bkMVYhqXm7FMZU8W/view?usp=sharing",
    "https://drive.google.com/file/d/1RyaV9uu3TL5-RJga_b8e-KafFG9CYDEX/view?usp=sharing",
    "https://drive.google.com/file/d/1PMFOnFyK1mqL2T3eSzAhEnQubBBPo3iy/view?usp=sharing",
    "https://drive.google.com/file/d/1RPCQ5tAVSwZFrTH5rUUlzyqd-fE3ax8C/view?usp=sharing",
    "https://drive.google.com/file/d/18UQAdq_IB-5T2paQsooiKLF78Wdyu7Dw/view?usp=sharing",
    "https://drive.google.com/file/d/1lAybXHwkSyb1lLWGjU3YT2EVJTdxfalv/view?usp=sharing",
    "https://drive.google.com/file/d/1bUDnIUpZHyLIqobUTJHXMFcbm7X_DPcS/view?usp=sharing",
    "https://drive.google.com/file/d/1IAUQSOa14IKoQ21FZosnpG9FcWRQW7iw/view?usp=sharing"
];

// Limite máximo de usuarios
$max_users = 16;

// Verificar si ya se alcanzó el límite de usuarios
if (count_users() >= $max_users) {
    echo "El número máximo de usuarios ha sido alcanzado. No puedes registrar más usuarios.";
    exit(); // Detiene la ejecución
}

// Obtiene los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Verifica si el usuario ya está registrado
if (user_exists($username)) {
    echo "El usuario ya está registrado. <a href='register.php'>Inténtalo de nuevo</a>";
    exit(); // Detiene la ejecución si el usuario ya existe
}

// Verifica que las contraseñas coincidan
if ($password !== $confirm_password) {
    echo "Las contraseñas no coinciden. <a href='register.php'>Inténtalo de nuevo</a>";
    exit(); // Detiene la ejecución si las contraseñas no coinciden
}

// Crea el hash de la contraseña para mayor seguridad
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Asigna un enlace al usuario basándose en el número de usuarios actuales (secuencialmente)
$user_count = count_users();
$assigned_link = $links[$user_count % 16]; // Cada usuario obtiene un enlace secuencialmente de los 16 disponibles

// Abre el archivo en modo de añadir (append)
$file = fopen('users.txt', 'a');

// Guarda los datos del usuario en formato: usuario|contraseña_encriptada|enlace_asignado
fwrite($file, $username . "|" . $hashed_password . "|" . $assigned_link . PHP_EOL);

// Cierra el archivo
fclose($file);

echo "Usuario registrado con éxito. <a href='index.php'>Ir a Login</a>";
?>
