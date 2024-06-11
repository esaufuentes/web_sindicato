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
	<!-- responsive CSS -->
	<link rel="stylesheet" href="../assets/css/responsive.css" type="text/css" media="all" />
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
	<!-- Start itsoft Main Menu Area -->

	<?php include('menu.php'); ?>
	<!--==================================================-->
	<!-- Start itsoft Main Menu phone -->
	<!--==================================================-->
	<?php include('menuphone.php'); ?>
	<!--==================================================-->
	<!--==================================================-->
	<!-----Start Header Slider Section ----->
	<!--===================================================-->

	<!--==================================================-->
	<!-----Start Swiper Slider Section ----->
	<!--===================================================-->
	<div class="blog-section pt-75 bg-2 pb-70">
	<div class="container">
		<div class="section-head text-center mb-85">
			<h2 class="text-white"><span> NOTICROC</span></h2>
			<span class="section-head-bar-2"></span>
		</div>
		<div class="blog-section style-5 bg-2 pt-80 pb-80">
			<?php
			include '../pages/fetch_items.php';

			$por_pagina = 6;
			$pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
			$offset = ($pagina - 1) * $por_pagina;

			$sql = "SELECT COUNT(*) AS total FROM nnoticia";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$total_imagenes = $row['total'];
			$total_paginas = ceil($total_imagenes / $por_pagina);

			$sql = "SELECT id_noticia, titulo, dcorta, ruta_imagen FROM nnoticia ORDER BY id_noticia DESC LIMIT $offset, $por_pagina";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo '<div class="row">';
				while ($row = $result->fetch_assoc()) {
					$id_noticia = $row['id_noticia'];
					$nombre_imagen = strtoupper($row['titulo']);
					$dcorta = $row['dcorta'];
					$ruta_imagen = $row['ruta_imagen'];
					?>
					<div class="col-sm-12 col-md-6 col-lg-4">
						<div class="blog-single-carousel">
							<div class="blog-thumb">
								<a href="https://medicroccancun.com/ejemplocroc/pages/single-blog.php?id=<?php echo $id_noticia; ?>&imagen=<?php echo urlencode($ruta_imagen); ?>">
									<img src="<?php echo $ruta_imagen; ?>" alt="Blog img">
								</a>
								<div class="blog-meta-top">
									<ul>
										<li><a href="#">Noticroc</a></li>
									</ul>
								</div>
							</div>
							<div class="blog-content">
								<div class="blog-meta">
									<span><a href="#">Noticroc</a></span>
								</div>
								<h5><a href="https://medicroccancun.com/ejemplocroc/pages/single-blog.php?id=<?php echo $id_noticia; ?>&imagen=<?php echo urlencode($ruta_imagen); ?>"><?php echo $nombre_imagen; ?></a></h5>
								<p><?php echo $dcorta; ?></p>
								<div class="blog-learn-more">
									<a href="https://medicroccancun.com/ejemplocroc/pages/single-blog.php?id=<?php echo $id_noticia; ?>&imagen=<?php echo urlencode($ruta_imagen); ?>">
										Leer mas
										<i class="fas fa-angle-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				echo '</div>'; // Cierre del div row
			}
			?>
		</div>

		<?php if ($total_paginas > 1) : ?>
			<div class="pagination pt-30">
				<?php
				$mostrar_primero = 3;
				$mitad = floor($mostrar_primero / 2);
				$inicio = max(1, $pagina - $mitad);
				$final = min($total_paginas, $pagina + $mitad);

				if ($pagina > ($mitad + 1)) {
					echo '<a href="?pagina=1">1</a>';
					
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
	</div>
</div>


			</br>


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
			<!-- theme js -->
			<script type="text/javascript" src="../assets/js/theme.js"></script>
			<!-- jquery js -->
</body>

</html>