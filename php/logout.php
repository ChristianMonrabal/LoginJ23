<?php
session_start();  // Inicia la sesión para poder eliminar los datos de la sesión.

$_SESSION = array();  // Borra todas las variables de sesión.

session_destroy();  // Destruye la sesión actual, eliminando todos los datos.

header("Location: ../forms/signin.php");  // Redirige a la página de inicio de sesión después de cerrar sesión.
exit();  // Finaliza la ejecución del script.
?>
