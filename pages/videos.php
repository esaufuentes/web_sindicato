<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	 <!-- Tus meta tags existentes, títulos y enlaces a estilos -->
     <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <!-- Resto de tus enlaces a estilos -->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	 <!-- Favicon -->
     <link rel="icon" type="image/png" sizes="56x56" href="../assets/images/logocroc.png">
  <!-- bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" media="all" />
	<!-- Jquery UI Tab css -->
	<link rel="stylesheet" href="../assets/css/jquery-ui.min.css" type="text/css" media="all" >
	<!-- Uikit  CSS -->
	<link rel="stylesheet" href="../assets/css/uikit.min.css" type="text/css" media="all" />
	<!-- carousel CSS -->
	<link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css" media="all" />
	<!-- responsive CSS -->
	<link rel="stylesheet" href="../assets/css/responsive.css" type="text/css" media="all" />
	<!-- nivo-slider CSS -->
	<link rel="stylesheet" href="../assets/css/nivo-slider.css" type="text/css" media="all" />
	<!-- animate CSS -->
	<link rel="stylesheet" href="../assets/css/animate.css" type="text/css" media="all" />
	<!-- animated-text CSS -->
	<link rel="stylesheet" href="../assets/css/animated-text.css" type="text/css" media="all" />
	<!-- font-awesome CSS -->
	<link rel="stylesheet" href="../assets/css/all.min.css" type="text/css" media="all" />
	<!-- font-flaticon CSS -->
	<link rel="stylesheet" href="../assets/css/flaticon.css" type="text/css" media="all" />
	<!-- theme-default CSS -->
	<link rel="stylesheet" href="../assets/css/theme-default.css" type="text/css" media="all" />
	<!-- meanmenu CSS -->
	<link rel="stylesheet" href="../assets/css/meanmenu.min.css" type="text/css" media="all" />
	<!-- Main Style CSS -->
	<link rel="stylesheet"  href="../style.css" type="text/css" media="all" />
	<!-- transitions CSS -->
	<link rel="stylesheet" href="../assets/css/owl.transitions.css" type="text/css" media="all" />
	<!-- venobox CSS -->
	<link rel="stylesheet" href="../venobox/venobox.css" type="text/css" media="all" />
	<!-- widget CSS -->
	<link rel="stylesheet" href="../assets/css/widget.css" type="text/css" media="all" />
	<!-- Swiper Slider -->
	<link rel="stylesheet" href="../assets/css/swiper.min.css" type="text/css" media="all">

	<!-- modernizr js -->
	<script type="text/javascript" src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <style>
       #video-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Alinea los elementos a la derecha */
        }
        .video-container {
            width: 40%; /* Cambia el ancho para que quepan 4 videos en una fila */
            margin-left: 2%; /* Espacio entre los videos */
            margin-bottom: 20px;
            padding: 0;
            box-sizing: border-box;
        }
        .video-container:first-child {
            margin-left: 0; /* No aplicar margen izquierdo al primer elemento */
        }
        .video-container iframe {
            width: 100%;
    height: 400px;
    padding-bottom: 3.25%;
        }
        .video-description {
            margin-top: 10px;
        }
        #pagination {
            margin-top: 20px;
        }
        #pagination-controls {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        #pagination-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        #pagination-controls button,
        #pagination-controls a,
        .page-link {
            padding: 5px 10px;
            background-color: orange;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: white;
            margin: 0 5px;
            text-decoration: none;
        }

        #pagination-controls button:hover,
        #pagination-controls a:hover,
        .page-link:hover {
            background-color: #ccc;
        }

        /* Estilos para los números de página */
        #page-numbers {
            display: flex;
            flex-direction: row; /* Cambia la dirección a horizontal invertida */
        }

        #page-numbers .page-link {
            /* Puedes agregar estilos específicos para los números de página aquí */
        }
    </style>
</head>
<body>
	<!-- Loder Start -->
	<div class="loader-wrapper">
	  <div class="loader"></div>
	  <div class="loder-section left-section"></div>
	  <div class="loder-section right-section"></div>
	</div>
	<!-- Loder End -->

	<!--==================================================-->
	<!-----Start Header Top Section ----->
	<!--==================================================-->
	<!--Header top area-->
    <?php include ('header.php');?> 
    <!--==================================================-->
	
    <?php include ('menu.php');?> 
	<!--==================================================-->
	<!-- Start itsoft Main Menu phone -->
	<!--==================================================-->
	<?php include ('menuphone.php');?>
	<!--==================================================-->
	<!--==================================================-->
	<!-----Start Header Slider Section ----->
	<!--===================================================-->
    <div id="video-gallery"></div>
    <div id="pagination"></div>
    <div id="pagination-controls">
        <button id="first-page">Inicio</button>
        <button id="prev-page" ><<</button>
        <div id="page-numbers"></div>
        <button id="next-page" >>></button>
        <button id="last-page">Último</button>
		
		

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var videos = [

                {
                 
                 embedCode: '<iframe width="640" height="360" src="https://www.youtube.com/embed/OtfEaTVAhp0" title="RECORRIDO EDIFICIO CROC 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
                 description: 'RECORRIDO EDIFICIO CROC 2024'
             },

             {
                 
                 embedCode: '<iframe width="638" height="360" src="https://www.youtube.com/embed/NhyGQmMnZOM" title="Video | Firma de convenio #CROC y el Sindicato del #ISSSTE en Q.Roo #CROCContigo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
                 description: 'Video | Firma de convenio #CROC y el Sindicato del #ISSSTE en Q.Roo #CROCContigo'
             },

             {
                 
                 embedCode: '<iframe width="640" height="360" src="https://www.youtube.com/embed/VWboIG3fOlY" title="Diálogo Sindical en Cancún con nuestro líder nacional de la CROC, Isaías González Cuevas." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
                 description: 'Diálogo Sindical en Cancún con nuestro líder nacional de la CROC, Isaías González Cuevas.'
             },



                {
                 
                 embedCode: '<iframe width="885" height="498" src="https://www.youtube.com/embed/a1gcmHsz7zA" title="Video | Firma de convenio de colaboración CROC - Secretaría del Bienestar Quintana Roo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                 description: 'DFirma de convenio CROC - Secretaría de Bienestar de Q.Roo'
             },



             {
               
                            
                 embedCode: '<iframe width="660" height="401" src="https://www.youtube.com/embed/C-jP5NnSBtA" title="Firma de convenio CROC-COJUDEQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                 description: 'Firma de convenio CROC-COJUDEQ'
             },
             {
                 
                 embedCode: '<iframe width="660" height="401" src="https://www.youtube.com/embed/zcOmlEvpXlo" title="LXVII Consejo Nacional Ordinario de la #CROC" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                 description: 'LXVII Consejo Nacional Ordinario de la #CROC'
             },
              {
                
                 embedCode: '<iframe width="515" height="320" src="https://www.youtube.com/embed/ddKT3MlwE-M" title="Gira de trabajo en Cancún | Isaías González Cuevas." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                 description: 'Gira de trabajo en Cancún | Isaías González Cuevas'
             },
             {
               
                 embedCode: '<iframe width="515" height="320" src="https://www.youtube.com/embed/9as2Bw_eJ5Y" title="Conmemoración del 116 aniversario de los Mártires de Río Blanco." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                 description: 'Conmemoración del 116 aniversario de los Mártires de Río Blanco.'
             },
			 {
                 
                 embedCode: '<iframe width="515" height="320" src="https://www.youtube.com/embed/Zpygj_89q64" title="CROC Cancún conmemora el Día Mundial de la Lucha contra el Sida." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                 description: 'CROC Cancún conmemora el Día Mundial de la Lucha contra el Sida.'
             },

             {
                 
                 embedCode: '<iframe width="515" height="320" src="https://www.youtube.com/embed/RP6RaGkswqI" title="Mes Rosa / MasterClass de Total Dance y Combate sin contacto" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                 description: 'Mes Rosa / MasterClass de Total Dance y Combate sin contacto'
             },

             {
             embedCode: '<iframe width="515" height="320" src="https://www.youtube.com/embed/bQ0ik6KFm2Y" title="Día internacional de la alfabetización" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                 description: 'Día internacional de la alfabetización'
             },
        
        

                // Agrega más videos aquí
            ];

            var videosPerPage = 4;
            var currentPage = 1;
            var totalVideos = videos.length;
            var totalPages = Math.ceil(totalVideos / videosPerPage);

            function loadVideos(page) {
                var startIndex = (page - 1) * videosPerPage;
                var endIndex = startIndex + videosPerPage;
                var videoGallery = $('#video-gallery');
                videoGallery.empty();



               


                for (var i = startIndex; i < endIndex && i < totalVideos; i++) {
                    var video = videos[i];
                    videoGallery.append(`
                        <div class="video-container">
                            ${video.embedCode}
                            <div class="team-member-intro-section" ><center>${video.description}</p></center>
                        </div>
                    `);
                }
            }

            function updatePagination() {
                var pagination = $('#pagination');
                pagination.empty();

                var startPage = 1;
                var endPage = totalPages;

                if (totalPages > 10) {
                    if (currentPage <= 6) {
                        endPage = 10;
                    } else if (currentPage >= totalPages - 5) {
                        startPage = totalPages - 9;
                    } else {
                        startPage = currentPage - 4;
                        endPage = currentPage + 5;
                    }
                }

                var pageNumbersContainer = $('#page-numbers');
                pageNumbersContainer.empty(); // Limpiar el contenido anterior

                if (startPage > 1) {
                    pageNumbersContainer.append('<a href="#" class="page-link" data-page="1">1</a>');
                    pageNumbersContainer.append('<span>...</span>');
                }

                for (var i = startPage; i <= endPage; i++) {
                    var pageLink = '<a href="#" class="page-link" data-page="' + i + '">' + i + '</a>';
                    pageNumbersContainer.append(pageLink);
                }

                if (endPage < totalPages) {
                    pageNumbersContainer.append('<span>...</span>');
                    pageNumbersContainer.append('<a href="#" class="page-link" data-page="' + totalPages + '">' + totalPages + '</a>');
                }

                $('.page-link').on('click', function(e) {
                    e.preventDefault();
                    var newPage = parseInt($(this).data('page'));
                    if (newPage !== currentPage) {
                        currentPage = newPage;
                        loadVideos(currentPage);
                        updatePagination();
                    }
                });
            }

            function goToFirstPage() {
                currentPage = 1;
                loadVideos(currentPage);
                updatePagination();
            }

            function goToPrevPage() {
                if (currentPage > 1) {
                    currentPage--;
                    loadVideos(currentPage);
                    updatePagination();
                }
            }

            function goToNextPage() {
                if (currentPage < totalPages) {
                    currentPage++;
                    loadVideos(currentPage);
                    updatePagination();
                }
            }

            function goToLastPage() {
                currentPage = totalPages;
                loadVideos(currentPage);
                updatePagination();
            }

            $('#first-page').on('click', goToFirstPage);
            $('#prev-page').on('click', goToPrevPage);
            $('#next-page').on('click', goToNextPage);
            $('#last-page').on('click', goToLastPage);

            loadVideos(currentPage);
            updatePagination();
        });

		
    </script>
	<!--==================================================-->
	<!-----start fTo-Top ----->
	<!--===================================================-->

	<BR>
	<BR>
	<BR>
	
	<button id="to-top">
		<i class="fa fa-angle-up"></i>
	</button>
    <?php include ('../pages/foother.php');?>
	<!-- jquery js -->
	<script type="text/javascript" src="../assets/js/vendor/jquery-3.2.1.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<!-- carousel js -->
	<script type="text/javascript" src="../assets/js/owl.carousel.min.js"></script>
	<!-- counterup js -->
	<script type="text/javascript" src="../assets/js/jquery.counterup.min.js"></script>
	<!-- waypoints js -->
	<script type="text/javascript" src="../assets/js/waypoints.min.js"></script>
	<!-- appear js -->
	<script type="text/javascript" src="../assets/js/jquery.appear.js"></script>
	<!-- wow js -->
	<script type="text/javascript" src="../assets/js/wow.min.js"></script>
	<!-- imagesloaded js -->
	<script type="text/javascript" src="../assets/js/imagesloaded.pkgd.min.js"></script>
	<!-- venobox js -->
	<script type="text/javascript" src="../venobox/venobox.js"></script>
	<!-- ajax mail js -->
	<script type="text/javascript" src="../assets/js/ajax-mail.js"></script>
	<!--  animated-text js -->
	<script type="text/javascript" src="../assets/js/animated-text.js"></script>
	<!-- venobox min js -->
	<script type="text/javascript" src="../venobox/venobox.min.js"></script>
	<!-- isotope js -->
	<script type="text/javascript" src="../assets/js/isotope.pkgd.min.js"></script>
	<!-- jquery nivo slider pack js -->
	<script type="text/javascript" src="../assets/js/jquery.nivo.slider.pack.js"></script>
	<!-- jquery meanmenu js -->
	<script type="text/javascript" src="../assets/js/jquery.meanmenu.js"></script>
	<!-- jquery scrollup js -->
	<script type="text/javascript" src="../assets/js/jquery.scrollUp.js"></script>
	<!-- uikit js -->
	<script type="text/javascript" src="../assets//js/uikit.min.js"></script>
	<!-- Jquery UI Tab JS -->
	<script type="text/javascript" src="../assets/js/jquery-ui.min.js"></script>
	<!-- Swiper Slider -->
	<script type="text/javascript" src="../assets/js/swiper.min.js"></script>
	<!-- Circle-Progress js -->
	<script type="text/javascript" src="../assets/js/circle-progress.min.js"></script>
	<!-- theme js -->
	<script type="text/javascript" src="../assets/js/theme.js"></script>

	<!-- jquery js -->
</body>
</html>
