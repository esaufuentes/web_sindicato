<?php

include '../pages/fetch_items.php';

 // Archivo que contiene la conexión a la base de datos

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT fotog FROM nnoticia WHERE id_noticia = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagen);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    if ($imagen) {
        header("Content-Type: image/jpeg"); // Ajustar el tipo de contenido según el tipo de imagen almacenada
        echo $imagen;
        exit;
    } else {
        echo "Imagen no encontrada.";
    }
} else {
    echo "ID no especificado.";
}
?>
