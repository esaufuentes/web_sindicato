<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir la configuración de la base de datos
include '../pages/fetch_items.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $dcorta = $_POST['dcorta'];
    $dlarga = $_POST['dlarga'];
    $idCategoria = $_POST['idCategoria'];

    // Verificar y procesar la imagen
    if (isset($_FILES['fotog']) && $_FILES['fotog']['error'] == UPLOAD_ERR_OK) {
        // Directorio de destino para la imagen
        $directorio_destino = '../galeria/';

        // Generar un nombre único para la imagen
        $nombre_imagen = uniqid() . '_' . $_FILES['fotog']['name'];
        $ruta_imagen = $directorio_destino . $nombre_imagen;

        // Mover la imagen cargada al directorio de destino
        if (move_uploaded_file($_FILES['fotog']['tmp_name'], $ruta_imagen)) {
            // Consulta SQL
            $sql = "INSERT INTO nnoticia (titulo, dcorta, dlarga, ruta_imagen, idCategoria) 
                    VALUES ('$titulo', '$dcorta', '$dlarga', '$ruta_imagen', $idCategoria)";

            if ($conn->query($sql) === TRUE) {
                header("Location: noti.php");
                exit; // D
            } else {
                echo 'Error al insertar los datos: ' . $conn->error;
            }
        } else {
            echo 'Error al mover la imagen al directorio de destino.';
        }
    } else {
        echo 'Error al cargar la imagen.';
    }
}
?>

