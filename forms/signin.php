<?php
session_start();  // Inicia la sesión para verificar si el usuario está autenticado.

if (isset($_SESSION['loggedin']) === true) {  // Si el usuario ya ha iniciado sesión, redirige a la página de inicio.
    header("Location: ../index.php");
    exit();  // Detiene la ejecución después de redirigir.
}

$errorMessage = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : "";  // Si hay un mensaje de error en la URL, lo captura y lo limpia para evitar inyecciones HTML.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../src/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="slider">
            <div class="slider-images">
                <img src="../img/slider1.jpg" class="active">
                <img src="../img/slider2.jpg">
                <img src="../img/slider3.jpg">
            </div>
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
        </div>
        <div class="login-form">
            <img src="../src/icon.png" alt="Icono" class="imgicon">
            <h2>Iniciar Sesión en J23</h2>
            <br>
            <form id="loginForm" action="../php/login.php" method="POST">
                <div class="input-container">
                    <input type="text" id="username" name="username" placeholder="Introduce tu usuario" value="<?= isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '' ?>" onblur="validateUsername()">
                    <span id="username-error" class="error-message"></span>
                </div>
                <br>
                <div class="input-container">
                    <input type="password" name="password" id="password" placeholder="Introduce tu contraseña" onblur="validatePassword()">
                    <span id="password-error" class="error-message"></span>
                </div>
                <br>
                <div class="php-error-message">
                    <span class="error-message"><?= $errorMessage ?></span>
                </div>
                <br>
                <button type="submit" class="btn-submit">Iniciar sesión</button>
                <br><br>
                <p>Has olvidado tu contraseña? <a href="#">Pulsa aqui</a></p>
            </form>
        </div>
    </div>
    <script src="../js/slider.js"></script>
    <script src="../js/validation_form.js"></script>
</body>
</html>
