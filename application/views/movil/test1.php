
<!DOCTYPE HTML>
<html>
	<head>
            <meta charset="UTF-8">
		<title>Pruebamela1
                </title>
            <script src="<?=base_url()?>js/jquery-1.9.1.min.js"></script>
		<script src="<?=base_url()?>js/config.js"></script>
                <script type="text/javascript"
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR4DqYTbeqZUACVrVaAwnjFcgY6vR4BA&sensor=true">
                  </script>
		<script src="<?=base_url()?>js/gmaps.js"></script>

        <script type="text/javascript" src="<?=base_url()?>js/lib/buscador_movil.js"></script>
        <link rel="stylesheet" href="<?=base_url()?>css/movil.css" />
        </head>
        <body id="body">
            <div id="fb-root"></div>
            <script src="<?=base_url()?>js/init.js"></script>
            <header id="header"><div id="logo">Gasolinazos.com</div> <div id="boton_buscar">Buscar</div>
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
</div></header>
            <section id="buscador">
                            <div id="div-estado">
                            <label for="estado">Estado:</label> 
                                <select id="estado">
                                    <option> - Seleccionar - </option>
                                    <? foreach($estados as $estado){ ?>
                                        <option value="<?=$estado->idestado?>"><?=$estado->nombre?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div id="div-ciudad">
                                <label for="ciudad">Ciudad:</label> 
                                <select id="ciudad">
                                    <option> - Seleccionar - </option>
                                </select>
                            </div>
                            <div id="div-colonia">
                                <label for="colonia">Colonia:</label> 
                                <select id="colonia">
                                    <option value="0"> - Seleccionar - </option>
                                </select>
                            </div>
                            <div id="div-boton">
                                <button id="buscar">Buscar</button>
                            </div><br>
                            <div id="div-texto">
                                <label for="buscador-texto">Texto libre: </label> <input type="text" id="buscador-texto" />
                            </div>
                
                
            </section>
            <section id="mapa">
             <div id="map-canvas"></div>
            </section>
            <section id="resultados" class="list4">
                <input type="hidden" id="base_url" value="<?=base_url()?>" />
                <input type="hidden" id="latitud" value="0" />
                <input type="hidden" id="longitud" value="0" />
                <input type="hidden" id="markers" value="0" />
                <input type="hidden" id="position" value="false" />
                <input type="hidden" id="geo-lat" value="0" />
                <input type="hidden" id="geo-lng" value="0" />

                <ul id="ul-resultados" class="ul-resultados">
                    <li>Ingrese sus criterios de búsqueda en la parte superior</li>
                </ul>
            </section>
            <div id="layer2" class="layer2">
               
                Final content.      
            </div>
        </body>
</html>