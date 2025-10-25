<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="form">
        <h2>Iniciar Sesión</h2>
        <form action="procesar-login.php" method="POST">
            <input type="email" name="email" placeholder="Correo" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <a href="index.php">¿No tienes cuenta? Regístrate</a>
    </div>
</body>
</html>