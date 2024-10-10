<?php
$host = 'localhost';
$db = 'db_escuelaJ23';
$user = 'root';
$pass = '';

try {
    $conn =mysqli_connect($host,$user,$pass,$db);
} catch (Exception $e) {
    echo "Error de conexion:" . $e->getMessage();
    die();
}

?>