<?php
$host = 'localhost';
$db = 'medicroccancun_blogcroc';
$user = 'medicroccancun_diego';
$pass = 'E.sau010511@11';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer el conjunto de caracteres
$conn->set_charset("utf8");

// Resto de tu código...
?>