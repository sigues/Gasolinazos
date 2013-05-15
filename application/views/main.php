<!DOCTYPE HTML>
<!--
	Halcyonic 3.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>
                    <?php
                        if(isset($titulo)){
                            echo $titulo;
                        }else{
                            echo "Gasolinazos.com :: gasolineras y más";
                        }
                    ?>
                </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="<?=base_url()?>js/jquery-1.9.1.min.js"></script>
		<script src="<?=base_url()?>js/config.js"></script>
		<script src="<?=base_url()?>js/skel.min.js"></script>
		<script src="<?=base_url()?>js/skel-ui.min.js"></script>
			<link rel="stylesheet" href="<?=base_url()?>css/skel-noscript.css" />
			<link rel="stylesheet" href="<?=base_url()?>css/style.css" />
			<link rel="stylesheet" href="<?=base_url()?>css/style-desktop.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="<?=base_url()?>css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="<?=base_url()?>js/html5shiv.js"></script><![endif]-->
	</head>
	<body class="subpage">

		<!-- Header -->
			<div id="header-wrapper">
				<header id="header" class="container">
					<div class="row">
						<div class="12u">

							<!-- Logo -->
								<h1><a href="#" id="logo">Gasolinazos.com</a></h1>
							
							<!-- Nav -->
								<nav id="nav">
									<a href="<?=base_url()?>">Inicio</a>
									<a href="threecolumn.html">Estaciones</a>
									<a href="twocolumn1.html">Las Peores</a>
									<a href="twocolumn1.html">Las Mejores</a>
									<a href="twocolumn2.html">Noticias</a>
									<a href="onecolumn.html">Contacto</a>
								</nav>

						</div>
					</div>
				</header>
			</div>

		<!-- Content -->
			<div id="content-wrapper">
				<div id="content">
					<div class="container">
						<div class="row">
							<?php
                                                        if(isset($content)){
                                                            if(is_array($content)){
                                                                foreach($content as $contenido){
                                                                    echo $contenido;
                                                                }
                                                            } else {
                                                                echo $content;
                                                            }
                                                        }else{ ?>
                                                            <div class="12u">
							
								<!-- Main Content -->
									<section>
										<header>
											<h2>Error de contenido</h2>
											<h3>No se encontró el contenido solicitado</h3>
										</header>
										<p>
                                                                                    Favor de reportar este error con el administrador del sistema
										</p>
									</section>

							</div>
                                                       <?php }
                                                        ?>
						</div>
					</div>
				</div>
			</div>

		<!-- Footer -->
			<div id="footer-wrapper">
				<footer id="footer" class="container">
					<div class="row">
						<div class="8u">
						
							<!-- Links -->
								<section>
									<h2>Links to Important Stuff</h2>
									<div>
										<div class="row">
											<div class="3u">
												<ul class="link-list last-child">
													<li><a href="#">Neque amet dapibus</a></li>
													<li><a href="#">Sed mattis quis rutrum</a></li>
													<li><a href="#">Accumsan suspendisse</a></li>
													<li><a href="#">Eu varius vitae magna</a></li>
												</ul>
											</div>
											<div class="3u">
												<ul class="link-list last-child">
													<li><a href="#">Neque amet dapibus</a></li>
													<li><a href="#">Sed mattis quis rutrum</a></li>
													<li><a href="#">Accumsan suspendisse</a></li>
													<li><a href="#">Eu varius vitae magna</a></li>
												</ul>
											</div>
											<div class="3u">
												<ul class="link-list last-child">
													<li><a href="#">Neque amet dapibus</a></li>
													<li><a href="#">Sed mattis quis rutrum</a></li>
													<li><a href="#">Accumsan suspendisse</a></li>
													<li><a href="#">Eu varius vitae magna</a></li>
												</ul>
											</div>
											<div class="3u">
												<ul class="link-list last-child">
													<li><a href="#">Neque amet dapibus</a></li>
													<li><a href="#">Sed mattis quis rutrum</a></li>
													<li><a href="#">Accumsan suspendisse</a></li>
													<li><a href="#">Eu varius vitae magna</a></li>
												</ul>
											</div>
										</div>
									</div>
								</section>

						</div>
						<div class="4u">
							
							<!-- Blurb -->
								<section>
									<h2>An Informative Text Blurb</h2>
									<p>
										Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse eu 
										varius nibh. Suspendisse vitae magna eget odio amet mollis. Duis neque nisi, 
										dapibus sed mattis quis, sed rutrum accumsan sed. Suspendisse eu varius nibh 
										lorem ipsum amet dolor sit amet lorem ipsum consequat gravida justo mollis.
									</p>
								</section>
						
						</div>
					</div>
				</footer>
			</div>

		<!-- Copyright -->
			<div id="copyright">
				&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a> | Images: <a href="http://fotogrph.com">fotogrph</a>
			</div>

	</body>
</html>