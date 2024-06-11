<?php
$host = 'localhost';
$db = '';
$user = '';
$pass = 'E';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer el conjunto de caracteres
$conn->set_charset("utf8");

// Resto de tu código...
?>
