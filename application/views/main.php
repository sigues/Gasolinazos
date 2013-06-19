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
		<link href="<?=base_url()?>css/ui-lightness/jquery-ui-1.9.2.custom.css" rel="stylesheet">
        	<script src="<?=base_url()?>js/jquery-ui-1.9.2.custom.js"></script>
                <script src="<?=base_url()?>js/config.js"></script>
                <script type="text/javascript"
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR4DqYTbeqZUACVrVaAwnjFcgY6vR4BA&sensor=true">
                  </script>
		<script src="<?=base_url()?>js/gmaps.js"></script>
<input id="base_url" value="<?=base_url()?>" type="hidden" />

		<script src="<?=base_url()?>js/skel.min.js"></script>
		<script src="<?=base_url()?>js/skel-ui.min.js"></script>
                <link rel="stylesheet" href="<?=base_url()?>css/skel-noscript.css" />
                <link rel="stylesheet" href="<?=base_url()?>css/style.css" />
                <link rel="stylesheet" href="<?=base_url()?>css/style-desktop.css" />
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
		<!-- Header -->
			<div id="header-wrapper">
				<header id="header" class="container">
					<div class="row">
						<div class="12u">

							<!-- Logo -->
								<h1><!--<a href="#" id="logo"><img src="<?=base_url()?>/images/lg-s.png" /></a>!-->Gasolinazos.com</h1>
							
							<!-- Nav -->
								<nav id="nav">
									<a href="<?=base_url()?>index.php">Inicio</a>
									<a href="<?=base_url()?>index.php/gasolineras/buscador">Estaciones</a>
									<a href="<?=base_url()?>index.php/gasolinazos/noticias">Noticias</a>
									<a href="<?=base_url()?>index.php/gasolinazos/contacto">Contacto</a>
								</nav>

						</div>
					</div>
				</header>
			</div>
                        <? if(isset($banner)&&$banner==true){$this->load->view("index/banner");}?>
                        <? if(isset($features)&&$features==true){$this->load->view("index/features");}?>
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
			<?
                        if(!isset($footer)){
                            $footer = $this->load->view("footer","",true);
                            echo $footer;
                        }
                        
                        ?>

		<!-- Copyright -->
			<div id="copyright">
				&copy; Gasolinazos.com. Todos los derechos reservados. | Diseño: <a href="http://html5up.net">HTML5 UP</a>
			</div>

	</body>
</html>