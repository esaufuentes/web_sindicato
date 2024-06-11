<?php
// Define el nombre del directorio al que quieres redirigir
$directorio = "https://medicroccancun.com/ejemplocroc/pages";

// Redirige al index dentro del directorio especificado
header("Location: $directorio/index.php");
exit(); // Asegura que el script se detenga después de la redirección
?>
