<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = ($_POST['username']);
    $password = ($_POST['password']);

    if (empty($username) || empty($password)) {
        $errorMessage = "Por favor, complete todos los campos.";
    } else {
        include("../includes/conexion.php");

        $stmt = $conn->prepare("SELECT password_usuario, tipo_usuario, nombre_usuario, apellido_usuario FROM usuarios WHERE username_usuario = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($storedPassword, $userType, $nombreUsuario, $apellidoUsuario);
            $stmt->fetch();

            if (hash('sha256', $password) === $storedPassword) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['userType'] = $userType;
                $_SESSION['nombre'] = $nombreUsuario; 
                $_SESSION['apellido'] = $apellidoUsuario;

                header("Location: ../index.php");
                exit();
            } else {
                $errorMessage = "Contraseña incorrecta.";
            }
        } else {
            $errorMessage = "Usuario no encontrado.";
        }

        $stmt->close();
        $conn->close();
    }

    if (isset($errorMessage)) {
        header("Location: ../forms/signin.php?error=" . urlencode($errorMessage) . "&username=" . urlencode($username));
        exit();
    }
}
