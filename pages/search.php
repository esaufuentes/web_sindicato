<!DOCTYPE html>
<html>
<head>
    <title>Resultados de Búsqueda</title>
    <style>
        /* Estilos CSS aquí */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
        }
        h2 {
            color: #333;
        }
        p {
            line-height: 1.6;
            color: #666;
        }
        /* Estilos del popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .popup-content {
            background-color: #fefefe;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            max-width: 300px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
    <script>
        function showPopup(message) {
            var popup = document.getElementById("popup");
            var popupMessage = document.getElementById("popup-message");
            popupMessage.innerHTML = message;
            popup.style.display = "block";
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "none";
        }
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="container">
        <?php
        // Incluye tu archivo de conexión a la base de datos
        include '../pages/fetch_items.php';

        // Obtiene el término de búsqueda del formulario
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];

            // Consulta la base de datos para buscar palabras similares en el título
            $sql = "SELECT * FROM nnoticia WHERE titulo LIKE '%$search_query%'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $titulo = $row['titulo'];
                    $contenido = $row['dlarga'];
                    // Muestra los resultados de la búsqueda
                    echo '<h2><a href="single-blog.php?id=' . urlencode($titulo) . '">' . $titulo . '</a></h2>';
                    echo '<p>' . $contenido . '</p>';
                }
            } else {
                // Mostrar mensaje emergente (popup) en caso de no encontrar resultados
                echo '<a href="#" onclick="showPopup(\'No se encontraron resultados para la búsqueda.\'); return false;">Sin resultados</a>';
            }
        } else {
            echo 'Término de búsqueda no especificado.';
        }

        // Cierra la conexión a la base de datos
        $conn->close();
        ?>
    </div>

    <!-- Contenedor del popup -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <p id="popup-message"></p>
            <button onclick="goBack()">Volver</button>
        </div>
    </div>
</body>
</html>
