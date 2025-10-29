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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Gatito 🐾</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@300;400;700&display=swap" rel="stylesheet">
       
</head>
<body>

    <header>
        <img src="img/image1.JPG" alt="Foto principal de mi gatito">
        <h1>Fotos de mi Gatito Lindo 🥹❤️!</h1> 
    </header>

    <main>
        <section class="about-me">
            <h2>Sobre Mi</h2>
            <p>Soy un gatito muy lindo tierno, adorable, hermoso, inteligente, y tengo una casa muy grande donde me dan mucho amor todos los dias, me hacen sentir en la gatito mas feliz del gatimundo</p>
            <p>tengo 1y de edad y desde que naci, lleno de ternura a todo el humano que me ve, tan solo mira mis fotos 🥰</p>
        </section>

        <section class="gallery-container">
            <h2>Gati Moments</h2>
            <div class="gallery">
                <img src="img/image1.JPG">
                <img src="img/image2.JPG">
                <img src="img/image3.JPG">
                <img src="img/image4.JPG">
                <img src="img/image5.HEIC">
                <img src="img/image6.HEIC">
                <img src="img/image7.HEIC">
                <img src="img/image8.HEIC">
                <img src="img/image9.HEIC">
            </div>
        </section>
    </main>

    <footer>
        <p>Hecho con mucho amor para mi gatito💖 | © <?php echo date("Y"); ?> Fran, Alejandro, Andres, Jose</p>
    </footer>

</body>
</html>