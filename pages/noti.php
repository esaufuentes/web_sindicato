<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <style>
        /* Estilos para las imágenes */
        .blog-thumbnails {
            display: flex; /* Establece un contenedor flexible */
            flex-wrap: nowrap; /* Evita el ajuste de línea en el contenedor */
            overflow-x: auto; /* Permite desplazarse horizontalmente si el contenido excede el ancho del contenedor */
            gap: 10px; /* Espaciado entre las imágenes */
            padding: 10px; /* Añade un poco de espacio alrededor del contenedor */
            justify-content: flex-start; /* Alinea las imágenes al principio */
        }

        .blog-thumb {
            position: relative; /* Establece la posición relativa para los elementos */
            flex: 0 0 auto; /* Establece el tamaño de las imágenes */
            max-width: 300px; /* Ancho máximo de las imágenes */
            border-radius: 5px;
            overflow: hidden; /* Oculta el contenido que excede las dimensiones del contenedor */
            transition: transform 0.3s ease; /* Efecto de transición al pasar el ratón sobre las imágenes */
        }

        .blog-thumb img {
            width: 100%; /* Ajusta el tamaño de las imágenes al 100% del contenedor */
            height: auto;
            object-fit: cover;
        }

        .blog-thumb:hover {
            transform: scale(1.05); /* Efecto de aumento al pasar el ratón sobre las imágenes */
        }

        /* Estilos para el botón de eliminación */
        .delete-button {
            position: absolute; /* Establece la posición absoluta para el botón */
            top: 5px; /* Alinea el botón en la esquina superior derecha */
            right: 5px;
            width: 30px; /* Tamaño del botón */
            height: 30px;
            background-color: red; /* Color de fondo del botón */
            border-radius: 50%; /* Borde redondeado */
            display: flex; /* Alinear contenido en el centro */
            justify-content: center;
            align-items: center;
            cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
        }

        .delete-button:hover {
            background-color: darkred; /* Cambia el color de fondo al pasar el ratón */
        }

        .delete-button::after {
            content: '×'; /* Agrega el símbolo '×' como contenido del botón */
            color: white; /* Color del texto */
            font-size: 18px; /* Tamaño de la fuente */
            font-weight: bold; /* Fuente en negrita */
        }
    </style>
</head>

<body>
<form action="procesar_formulario.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="dcorta">Descripción Corta:</label><br>
        <textarea id="dcorta" name="dcorta" required></textarea><br><br>

        <label for="dlarga">Descripción Larga:</label><br>
        <textarea id="dlarga" name="dlarga" required></textarea><br><br>

        <label for="fotog">Imagen:</label><br>
        <input type="file" id="fotog" name="fotog" accept="image/*" required><br><br>

        <label for="idCategoria">ID Categoría:</label><br>
        <input type="number" id="idCategoria" name="idCategoria" required><br><br>

        <input type="submit" value="Agregar Noticia">
    </form>


    <div class="blog-thumbnails">
        <?php
        include '../pages/fetch_items.php'; // Archivo de configuración para la conexión a la base de datos

        $por_pagina = 3;
        $pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
        $offset = ($pagina - 1) * $por_pagina;

        $sql = "SELECT COUNT(*) AS total FROM nnoticia";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_imagenes = $row['total'];
        $total_paginas = ceil($total_imagenes / $por_pagina);

        $sql = "SELECT id_noticia, titulo, dcorta, ruta_imagen FROM nnoticia ORDER BY id_noticia DESC LIMIT $offset, $por_pagina";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) :
            $id_noticia = $row['id_noticia'];
            $nombre_imagen = strtoupper($row['titulo']);
            $dcorta = $row['dcorta'];
            $ruta_imagen = $row['ruta_imagen'];
        ?>
            <div class="blog-thumb">
                <a href="#" onclick="openAddPhotoForm(<?php echo $id_noticia; ?>)">
                    <img src="<?php echo $ruta_imagen; ?>" alt="Blog img">
                </a>
                <div class="delete-button" onclick="deletePhoto(<?php echo $id_noticia; ?>)"></div>
            </div>
        <?php
        endwhile;
        ?>
    </div>

    <?php if ($total_paginas > 1) : ?>
        <div class="paginador">
            <?php
            $mostrar_primero = 5;
            $mitad = floor($mostrar_primero / 2);
            $inicio = max(1, $pagina - $mitad);
            $final = min($total_paginas, $pagina + $mitad);

            if ($pagina > ($mitad + 1)) {
                echo '<a href="?pagina=1">1</a>';
                echo '<span>...</span>';
            }

            for ($i = $inicio; $i <= $final; $i++) :
                if ($i == $pagina) :
                    echo '<a class="activo" href="?pagina=' . $i . '">' . $i . '</a>';
                else :
                    echo '<a href="?pagina=' . $i . '">' . $i . '</a>';
                endif;
            endfor;

            if ($pagina < ($total_paginas - $mitad)) {
                echo '<span>...</span>';
                echo '<a href="?pagina=' . $total_paginas . '">' . $total_paginas . '</a>';
            }
            ?>
        </div>
    <?php endif; ?>

    <?php $conn->close(); ?>

    <script>
        function openAddPhotoForm(id_noticia) {
            window.location.href = 'agregar_fotos_blog.php?id_noticia=' + id_noticia;
        }

        function deletePhoto(id_noticia) {
            // Aquí puedes agregar la lógica para eliminar la foto con el ID correspondiente
            console.log('Eliminar foto con ID:', id_noticia);
        }
    </script>
</body>
</html>
