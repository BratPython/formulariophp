<?php
function validar($n, $e, $p) {
    return !empty(trim($n)) && !empty(trim($e)) && !empty($p);
}

function guardar($n, $e, $p) {
    $file = 'usuarios.json';
    $usuarios = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $usuarios[] = [
        'nombre' => trim($n),
        'email' => trim($e),
        'password_hash' => password_hash($p, PASSWORD_DEFAULT)
    ];
    file_put_contents($file, json_encode($usuarios, JSON_PRETTY_PRINT));
}

$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!validar($nombre, $email, $password)) {
    die('<p">Error: todos los campos son obligatorios</p>');
}

guardar($nombre, $email, $password);

echo '<div">
        <h2>Registro exitoso</h2>
        <a href="index.php">Volver</a>
      </div>';
?>