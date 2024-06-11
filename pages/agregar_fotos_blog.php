<?php
include '../pages/fetch_items.php'; // Archivo de configuración para la conexión a la base de datos

if (isset($_GET['id_noticia'])) {
    $id_noticia = intval($_GET['id_noticia']);
} else {
    die("ID de noticia no proporcionado.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['fotos']) && count($_FILES['fotos']['name']) > 0) {
        $directorio_destino = '../galeria/';
        
        for ($i = 0; $i < count($_FILES['fotos']['name']); $i++) {
            if ($_FILES['fotos']['error'][$i] == UPLOAD_ERR_OK) {
                $nombre_imagen = uniqid() . '_' . $_FILES['fotos']['name'][$i];
                $ruta_imagen = $directorio_destino . $nombre_imagen;

                if (move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $ruta_imagen)) {
                    $sql = "INSERT INTO detalle_noticia (id_noticia, fotos) VALUES (?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("is", $id_noticia, $ruta_imagen);
                    $stmt->execute();
                }
            }
        }
    }
}

// Obtener imágenes existentes
$sql = "SELECT fotos FROM detalle_noticia WHERE id_noticia = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_noticia);
$stmt->execute();
$result = $stmt->get_result();
$fotos_existentes = [];
while ($row = $result->fetch_assoc()) {
    $fotos_existentes[] = $row['fotos'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Fotos a la Noticia</title>
    <style>
        .existing-photos {
            display: flex;
            flex-wrap: wrap;
        }

        .existing-photos img {
            width: 100px;
            height: auto;
            margin: 10px;
            border-radius: 5px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .existing-photos img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>Agregar Fotos a la Noticia</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="fotos">Seleccionar imágenes:</label>
        <input type="file" id="fotos" name="fotos[]" multiple accept="image/*"><br><br>
        <input type="submit" value="Subir Fotos">
    </form>
    <h2>Fotos de la Nota</h2>
    <div class="existing-photos">
        <?php foreach ($fotos_existentes as $foto): ?>
            <img src="<?php echo $foto; ?>" alt="Foto de noticia">
        <?php endforeach; ?>
    </div>
    <a href="https://medicroccancun.com/ejemplocroc/pages/noti.php">Volver</a>
</body>
</html>
