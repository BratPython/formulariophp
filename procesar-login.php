<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: main.php');
    exit;
}

$error = '';

if ($_POST) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $archivo = 'usuarios.json';

    if (empty(trim($email)) || empty($password)) {
        $error = 'Ambos campos son obligatorios.';
    } else {
        if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
            $error = 'El correo electronico no es valido.';
        } else {
            if (file_exists($archivo)) {
                $usuarios = json_decode(file_get_contents($archivo), true);
                if (is_array($usuarios)) {
                    foreach ($usuarios as $usuario) {
                        if (isset($usuario['email']) && strtolower($usuario['email']) === strtolower(trim($email))) {
                            if (password_verify($password, $usuario['password_hash'] ?? '')) {
                                $_SESSION['usuario'] = [
                                    'nombre' => $usuario['nombre'],
                                    'email' => $usuario['email']
                                ];
                                header('Location: main.php');
                                exit;
                            }
                        }
                    }
                }
            }
            $error = 'Correo o contraseña incorrectos.';
        }
    }
}
?>