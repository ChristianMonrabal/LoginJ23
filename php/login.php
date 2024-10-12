<?php
session_start();  // Inicia la sesión para poder usar variables de sesión.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Verifica si la solicitud es de tipo POST, asegurando que los datos se envían desde el formulario.
    $username = ($_POST['username']);  // Captura el valor del campo de nombre de usuario.
    $password = ($_POST['password']);  // Captura el valor del campo de contraseña.

    if (empty($username) || empty($password)) {  // Comprueba si algún campo está vacío.
        $errorMessage = "Por favor, complete todos los campos.";  // Genera un mensaje de error si falta algún campo.
    } else {
        include("../includes/conexion.php");  // Conecta a la base de datos.

        // Prepara la consulta SQL para obtener los datos del usuario en base al nombre de usuario.
        $stmt = $conn->prepare("SELECT password_usuario, tipo_usuario, nombre_usuario, apellido_usuario FROM usuarios WHERE username_usuario = ?");
        $stmt->bind_param("s", $username);  // Vincula el nombre de usuario a la consulta.
        $stmt->execute();  // Ejecuta la consulta.
        $stmt->store_result();  // Almacena el resultado.

        if ($stmt->num_rows > 0) {  // Verifica si se encontró al menos un resultado.
            // Vincula los resultados de la consulta a variables.
            $stmt->bind_result($storedPassword, $userType, $nombreUsuario, $apellidoUsuario);
            $stmt->fetch();  // Extrae los valores de las columnas.

            // Compara la contraseña ingresada con la almacenada en la base de datos.
            if (hash('sha256', $password) === $storedPassword) {
                // Si las contraseñas coinciden, guarda los datos del usuario en las variables de sesión.
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['userType'] = $userType;
                $_SESSION['nombre'] = $nombreUsuario;
                $_SESSION['apellido'] = $apellidoUsuario;

                header("Location: ../index.php");  // Redirige al usuario a la página de inicio.
                exit();  // Detiene la ejecución del script.
            } else {
                $errorMessage = "Contraseña incorrecta.";  // Mensaje de error si la contraseña no coincide.
            }
        } else {
            $errorMessage = "Usuario no encontrado.";  // Mensaje de error si el usuario no existe.
        }

        $stmt->close();  // Cierra la consulta.
        $conn->close();  // Cierra la conexión a la base de datos.
    }

    if (isset($errorMessage)) {  // Si hay un mensaje de error, lo redirige a la página de inicio de sesión con el error y el nombre de usuario.
        header("Location: ../forms/signin.php?error=" . urlencode($errorMessage) . "&username=" . urlencode($username));
        exit();
    }
}
