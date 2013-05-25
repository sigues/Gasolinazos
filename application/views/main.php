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

		<script src="<?=base_url()?>js/skel.min.js"></script>
		<script src="<?=base_url()?>js/skel-ui.min.js"></script>
			<link rel="stylesheet" href="<?=base_url()?>css/skel-noscript.css" />
			<link rel="stylesheet" href="<?=base_url()?>css/style.css" />
			<link rel="stylesheet" href="<?=base_url()?>css/style-desktop.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="<?=base_url()?>css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="<?=base_url()?>js/html5shiv.js"></script><![endif]-->
	</head>
	<body class="subpage">
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '465561006870893', // App ID
    channelUrl : 'http://localhost/gasolinazos/js/channel.html', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        for(var propertyName in response) {
            // propertyName is what you want
            // you can get the value like this: myObject[propertyName]
      console.log(propertyName+" : "+response[propertyName]);
            
         }
      console.log('Good to see you, ' + response.name + '.');
    });
  }
</script>
<!--Below we include the Login Button social plugin. This button uses the JavaScript SDK to-->
<!--present a graphical Login button that triggers the FB.login() function when clicked.-->
<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>
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
									<a href="<?=base_url()?>index.php/gasolineras/buscador">Estaciones</a>
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