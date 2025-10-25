<!DOCTYPE html>
<html lang="es"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title> 
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="form-container">
        <form action="procesar.php" method="POST" class="form-container-child">
            <div class="form">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="password">Contraseña</label> <input name="password" id="password">
            </div>
            <div>
                <button type="submit">Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>