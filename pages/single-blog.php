<!DOCTYPE HTML>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>CROC - Cancún Revitalizando el Sindicalismo en México</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="../assets/images/logocroc.png">
	<!-- bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" media="all" />
	<!-- Jquery UI Tab css -->
	<link rel="stylesheet" href="../assets/css/jquery-ui.min.css" type="text/css" media="all">
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
	<link rel="stylesheet" href="../style.css" type="text/css" media="all" />
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
	<?php include('header.php'); ?>
	<!--==================================================-->

	<?php include('menu.php'); ?>
	<!--==================================================-->
	<!-- Start itsoft Main Menu phone -->
	<!--==================================================-->
	<?php include('menuphone.php'); ?>
	<!--==================================================-->
	<!--==================================================-->
	<!-----Start Header Slider Section ----->
	<!--===================================================-->
	<!--=================================================-->
	<!----START feture-area Section ----->
	<!--=================================================-->

	<!-- Contenido de la página -->
	<div class="blog-section style-8 bg-1 pt-80 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-8">
					<div class="blog-single-items">
						<?php
						// Incluir archivo de conexión a la base de datos
						include '../pages/fetch_items.php';

						// Verificar si se proporcionó el ID de la noticia en la URL
						if (isset($_GET['id'])) {
							$id_noticia = $_GET['id'];

							// Obtener la ruta de la imagen de la URL
							$ruta_imagen = isset($_GET['imagen']) ? $_GET['imagen'] : '';

							// Preparar y ejecutar la consulta para obtener los detalles de la noticia
							$sql = "SELECT titulo, dlarga FROM nnoticia WHERE id_noticia = ?";
							$stmt = $conn->prepare($sql);
							$stmt->bind_param("i", $id_noticia);
							$stmt->execute();
							$result = $stmt->get_result();

							// Verificar si se encontraron resultados
							if ($result && $result->num_rows > 0) {
								$row = $result->fetch_assoc();
								$titulo = strtoupper($row['titulo']);
								$contenido = $row['dlarga'];

								// Mostrar la imagen y el contenido de la noticia
								echo '<h5>' . $titulo . '</h5>';
								echo '<div class="blog-thumb">';
								echo '<img src="' . $ruta_imagen . '" alt="' . $titulo . '">';
								echo '</div>';
								echo '<div class="block-quote">';
								echo '<p>' . $contenido . '</p>';
								echo '</div>';
							} else {
								echo 'No se encontró la noticia.';
							}

							// Cerrar la conexión a la base de datos
							$stmt->close();
						} else {
							echo 'ID de noticia no especificado.';
						}
						?>



						<!--==================================================-->
						<!----START PORTFOLIO Section ----->
						<!--===================================================-->
						<div class="portfolio-section upper3 pt-80 pb-75">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="section-head text-center pb-35">
											<h2>Galería de imágenes</h2>
											<span class="section-head-bar-2"></span>
										</div>
									</div>
								</div>

								<div class="row image_load">
									<?php
									// Verificar si se proporcionó el ID de la noticia en la URL
									if (isset($_GET['id'])) {
										$id_noticia = $_GET['id'];

										// Preparar y ejecutar la consulta para obtener todas las imágenes asociadas a la noticia con el ID proporcionado
										$sql = "SELECT fotos FROM detalle_noticia WHERE id_noticia = $id_noticia";
										$result = $conn->query($sql);

										// Verificar si se encontraron resultados
										if ($result && $result->num_rows > 0) {
											// Iterar sobre cada resultado
											while ($row = $result->fetch_assoc()) {
												$fotos = $row['fotos'];

												// Convertir la cadena de fotos en un array
												$array_fotos = explode(',', $fotos);

												// Iterar sobre cada foto y mostrarla en la galería
												foreach ($array_fotos as $foto) {
													// Mostrar la imagen de la noticia en la galería
													echo '<div class="col-lg-4 col-md-6 col-sm-12 p-0 grid-item design cemes">';
													echo '<div class="single_portfolio">';
													echo '<div class="portfolio-thumb">';
													echo '<img src="' . $foto . '" alt="Blog img">';
													echo '<div class="portfolio-icon">';
													echo '<div class="port-icon">';
													echo '<a class="port-icon venobox vbox-item" data-gall="myportfolio" href="' . $foto . '"><i class="fas fa-image"></i></a>';
												
													echo '</div>';
													echo '</div>';
													echo '</div>';
													echo '</div>';
													echo '</div>';
												}
											}
										} else {
											echo 'No hay imágenes disponibles para esta noticia.';
										}

										// Cerrar la conexión a la base de datos
										$conn->close();
									} else {
										echo 'ID de noticia no especificado en la URL.';
									}
									?>
								</div>
							</div>
						</div>

					</div>
				</div>


				<div class="col-sm-12 col-md-12 col-lg-4">
					<div class="widget-items mb-40">
						<form action="search.php" method="get">
							<input type="text" class="src-input-box" placeholder="Buscar Noticia" name="query" value="" title="src-input-box">
							<button class="src-icon" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</form>
					</div>



					<div class="widget-items mb-40">
						<div class="calender-area style-2">
							<div class="widget-title">
								<h2>Calendario</h2>
								<span></span>
							</div>
							<div class="tag-item">
								<div class="curr-month"><b>january</b></div>
								<div class="all-days">
									<ul>
										<li>S</li>
										<li>M</li>
										<li>T</li>
										<li>W</li>
										<li>T</li>
										<li>F</li>
										<li>S</li>
									</ul>
								</div>
								<div class="all-date">
									<ul></ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</br>




	<!-- ============================================================== -->
	<!-- Start - testimoniale_areas -->
	<!-- ============================================================= -->
	</div>
	</div>
	<!--==================================================-->
	<!----END PORTFOLIO  Section ----->
	<!--===================================================-->

	<!--==================================================-->
	<!----START BLOG  Section ----->
	<!--===================================================-->




	<?php include('../pages/foother.php'); ?>
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