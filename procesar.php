<?php
function validarContrasena($password) {
    if (strlen($password) < 8) {
        return 'La contraseña debe tener al menos 8 caracteres.';
    }
    if (!preg_match('/[a-z]/', $password)) {
        return 'La contraseña debe contener al menos una letra minuscula.';
    }
    if (!preg_match('/[A-Z]/', $password)) {
        return 'La contraseña debe contener al menos una letra mayuscula.';
    }
    if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
        return 'La contraseña debe contener al menos un carácter especial.';
    }
    return true;
}

function emailExiste($email, $archivo) {
    if (!file_exists($archivo)) return false;
    $usuarios = json_decode(file_get_contents($archivo), true);
    if (!is_array($usuarios)) return false;
    foreach ($usuarios as $usuario) {
        if (isset($usuario['email']) && strtolower($usuario['email']) === strtolower(trim($email))) {
            return true;
        }
    }
    return false;
}

function guardar($n, $e, $p, $archivo) {
    $usuarios = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];
    $usuarios[] = [
        'nombre' => trim($n),
        'email' => trim($e),
        'password_hash' => password_hash($p, PASSWORD_DEFAULT)
    ];
    file_put_contents($archivo, json_encode($usuarios, JSON_PRETTY_PRINT));
}

$archivo = 'usuarios.json';
$verify = $_POST['verify'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty(trim($nombre))) {
    die('<p>Error: El campo "Nombre" es obligatorio.</p>');
}

if (empty(trim($email))) {
    die('<p>Error: El campo "Email" es obligatorio.</p>');
}

if (empty($password)) {
    die('<p>Error: El campo "Contraseña" es obligatorio.</p>');
}

if (empty($verify)) {
    die('<p>Error: El campo "Verificar Contraseña" es obligatorio.</p>');
}

if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
    die('<p>Error: El correo electronico no es válido.</p>');
}

$dominio = substr(strrchr(trim($email), "@"), 1);
if (!checkdnsrr($dominio, "MX")) {
    die("<p>Error: El dominio del email ('$dominio') no existe o no esta configurado para recibir correos.</p>");
}

if (trim($password) != trim($verify)) {
    die('<p>Error: Las contraseñas no coinciden.</p>');
}

if (emailExiste($email, $archivo)) {
    die('<p>Error: Este correo electronico ya está registrado.</p>');
}

$validacionPass = validarContrasena($password);
if ($validacionPass !== true) {
    die('<p>Error: ' . htmlspecialchars($validacionPass) . '</p>');
}

guardar($nombre, $email, $password, $archivo);

echo '<div>
        <h2>Registro exitoso</h2>
        <a href="index.php">Volver</a>
      </div>';
?>