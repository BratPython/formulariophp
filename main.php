<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="">
    <header class="header">
        <div class="header-t">
            <p>Bienvenido</p>
        </div>
        <div class="header-nav">
            <a href="#">Lorem ipsum</a>
            <a href="#">lorem ipsum</a>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </header>
    <main class="main">
        <div class="main-title">
        <h1>!Hola (nombre de usuario "jose")has iniciado sesion con exito bienvenido!</h1>
        <div class="main-desc">
        <p>para mas informacion visita </p>
        <a href="https://http.cat/">Para mas informacion</a>
        </div>
        </div>
    </main>

</body>
</html>