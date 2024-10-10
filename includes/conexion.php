<?php
$host = 'localhost';
$db = 'db_escuelaJ23';
$user = 'root';
$pass = '';

//$conn = new mysqli($host, $user, $pass, $db);

//if ($conn->connect_error) {
//    die("Conexión fallida: " . $conn->connect_error);
//}

try {
    $conn =mysqli_connect($host,$user,$pass,$db);
} catch (Exception $e) {
    echo "Error de conexion:" . $e->getMessage();
    die();
}

?>