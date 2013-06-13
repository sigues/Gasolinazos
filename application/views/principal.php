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
                <script type="text/javascript"
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR4DqYTbeqZUACVrVaAwnjFcgY6vR4BA&sensor=true">
                  </script>
		<script src="<?=base_url()?>js/gmaps.js"></script>

		<script src="<?=base_url()?>js/skel.min.js"></script>
		<script src="<?=base_url()?>js/skel-ui.min.js"></script>
			<link rel="stylesheet" href="<?=base_url()?>css/skel-noscript.css" />
			<link rel="stylesheet" href="<?=base_url()?>/css/style.css" />
			<link rel="stylesheet" href="<?=base_url()?>/css/style-desktop.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="<?=base_url()?>css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="<?=base_url()?>js/html5shiv.js"></script><![endif]-->
	</head>
	<body class="subpage">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41316581-1', 'startlogic.com');
  ga('send', 'pageview');

</script>
<div id="fb-root"></div>
<script src="<?=base_url()?>js/init.js"></script>
<!--Below we include the Login Button social plugin. This button uses the JavaScript SDK to-->
<!--present a graphical Login button that triggers the FB.login() function when clicked.-->
<div id="fb_loginbutton">
<?
if($this->session->userdata('fbid')==false){
?>
<fb:login-button show-faces="false" width="200" max-rows="1"></fb:login-button>
<?
} else {
echo "Hola ".$this->session->userdata("first_name");
//var_dump($this->session->all_userdata());
}
?>
</div>
<input type="hidden" id="base_url" value="<?=base_url()?>" />

		<!-- Header -->
			<div id="header-wrapper">
				<header id="header" class="container">
					<div class="row">
						<div class="12u">

							<!-- Logo -->
								<h1><!--<a href="#" id="logo"><img src="<?=base_url()?>/images/lg-s.png" /></a>!-->Gasolinazos.com</h1>
							
							<!-- Nav -->
								<nav id="nav">
									<a href="<?=base_url()?>">Inicio</a>
									<a href="<?=base_url()?>index.php/gasolineras/buscador">Buscador</a>
									<!--<a href="<?=base_url()?>index.php/gasolineras/las10peores">Las Peores</a>
									<a href="<?=base_url()?>index.php/gasolineras/las10mejores">Las Mejores</a>!-->
									<a href="<?=base_url()?>index.php/gasolinazos/noticias">Noticias</a>
									<a href="<?=base_url()?>index.php/gasolinazos/contacto">Contacto</a>
								</nav>

						</div>
					</div>
				</header>
			</div>
				<div id="banner">
					<div class="container">
						<div class="row">
							<div class="4u">
							
								<!-- Banner Copy -->
									<p>Prueba nuestro buscador de gasolineras!</p>
									<a href="<?=base_url()?>index.php/gasolineras/buscador" class="button-big">Haz Click Aquí</a>

							</div>
							<div class="8u">
								
								<!-- Banner Image -->
                                                                quitar esta imagen y poner aquí los precios actuales
									<a href="#" class="bordered-feature-image"><img src="../images/banner.jpg" alt="" /></a>
							
							</div>
						</div>
					</div>
				</div>
			</div>

		<!-- Features -->
			<div id="features-wrapper">
				<div id="features">
					<div class="container">
						<div class="row">
							<div class="3u">
							
								<!-- Feature #1 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic01.jpg" alt="" /></a>
										<h2>Welcome to Halcyonic</h2>
										<p>
                                                                                    Si no se le encuentra <strong>ningún</strong> uso a este div, 
                                                                                    quitarlo a la chingada
											<!--This is <strong>Halcyonic</strong>, a free site template 
											by <a href="http://n33.co/">AJ</a> for
											<a href="http://html5up.net">HTML5 UP</a>. It's responsive,
											built on HTML5 + CSS3, and includes 5 unique page layouts.-->
										</p>
									</section>

							</div>
							<div class="3u">
								
								<!-- Feature #2 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic02.jpg" alt="" /></a>
										<h2>Responsive You Say?</h2>
										<p>
											Yes! Halcyonic is built on the <a href="http://skeljs.org">skel.js</a>
											framework, so it has full responsive support for desktop, tablet,
											and mobile device displays.
										</p>
									</section>

							</div>
							<div class="3u">
								
								<!-- Feature #3 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic03.jpg" alt="" /></a>
										<h2>License Info</h2>
										<p>
											Halcyonic is licensed under the <a href="http://html5up.net/license">CCA 3.0</a> license,
											so use it for personal or commercial use as much as you like (just keep
											the footer credit intact).
										</p>
									</section>

							</div>
							<div class="3u">
								
								<!-- Feature #4 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic04.jpg" alt="" /></a>
										<h2>Volutpat etiam aliquam</h2>
										<p>
											Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse 
											eu varius nibh. Suspendisse vitae magna eget odio amet mollis.
										</p>
									</section>

							</div>
						</div>
					</div>
				</div>
			</div>

		<!-- Content -->
			<div id="content-wrapper">
				<div id="content">
					<div class="container">
						<div class="row">
							<div class="4u">

								<!-- Box #1 -->
									<section>
										<header>
											<h2>Who We Are</h2>
											<h3>A subheading about who we are</h3>
										</header>
										<a href="#" class="feature-image"><img src="images/pic05.jpg" alt="" /></a>
										<p>
											Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. 
											Suspendisse eu varius nibh. Suspendisse vitae magna eget odio amet mollis 
											justo facilisis quis. Sed sagittis mauris amet tellus gravida lorem ipsum.
										</p>
									</section>

							</div>
							<div class="4u">

								<!-- Box #2 -->
									<section>
										<header>
											<h2>What We Do</h2>
											<h3>A subheading about what we do</h3>
										</header>
										<ul class="check-list">
											<li>Sed mattis quis rutrum accum</li>
											<li>Eu varius nibh suspendisse lorem</li>
											<li>Magna eget odio amet mollis justo</li>
											<li>Facilisis quis sagittis mauris</li>
											<li>Amet tellus gravida lorem ipsum</li>
										</ul>
									</section>

							</div>
							<div class="4u">
								
								<!-- Box #3 -->
									<section>
										<header>
											<h2>What People Are Saying</h2>
											<h3>And a final subheading about our clients</h3>
										</header>
										<ul class="quote-list">
											<li>
												<img src="images/pic06.jpg" alt="" />
												<p>"Neque nisidapibus mattis"</p>
												<span>Jane Doe, CEO of UntitledCorp</span>
											</li>
											<li>
												<img src="images/pic07.jpg" alt="" />
												<p>"Lorem ipsum consequat!"</p>
												<span>John Doe, President of FakeBiz</span>
											</li>
											<li>
												<img src="images/pic08.jpg" alt="" />
												<p>"Magna veroeros amet tempus"</p>
												<span>Mary Smith, CFO of UntitledBiz</span>
											</li>
										</ul>
									</section>

							</div>
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