
<!DOCTYPE HTML>
<html>
	<head>
            <meta charset="UTF-8">
		<title>Gasolinazos.com :: Información sobre gasolineras
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
            <header id="header"><div id="logo">Gasolinazos.com</div> <div id="boton_buscar">Buscar</div> <div><?=$this->load->view("movil/follow_us")?></div>
<!--Below we include the Login Button social plugin. This button uses the JavaScript SDK to-->
<!--present a graphical Login button that triggers the FB.login() function when clicked.-->
<div id="fb_loginbutton">
<?
$this->load->view("index/login");
?>
</div></header>
            <div id="buscador">
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
                <div id="div-texto">
                    <label for="buscador-texto">Texto libre: </label> <input type="text" id="buscador-texto" />
                </div>
                <br><br>
                <div id="buscadorAvanzado" style="display:none">
                    <div id="filtros" style="vertical-align:top">
                        <b title="Prioridad en los colores, elija a que filtro dar prioridad">Colores:</b><br>
                        <label for="profeco" title="Si elige PROFECO se dará prioridad a las verificaciones de Litros de a litro">PROFECO</label> <input type="radio" value="profeco" id="profeco" name="filtros" />
                        <label for="gasolinazos" title="Si elige Gasolinazos.com se dará prioridad a las calificaciones de los usuarios">Gasolinazos.com</label> <input type="radio" value="gasolinazos" id="gasolinazos" name="filtros" checked="checked" />
                    </div>
                    <div id="Servicios">
                        <b title="Elija los servicios que deben tener las gasolineras que busca">Servicios:</b><br>
                        <label for="premium" title="Gasolina Premium">Premium</label> <input type="checkbox" value="" class="checkServicios" id="premium" name="premium" checked="checked" />
                        <label for="magna" title="Gasolina Magna">Magna</label> <input type="checkbox" value="" class="checkServicios" id="magna" name="magna" checked="checked" /><br>
                        <label for="diesel" title="Diesel">Diesel</label> <input type="checkbox" value="" class="checkServicios" id="diesel" name="diesel" checked="checked" />
                        <label for="dme" title="Diesel Marítimo">Diesel Marítimo</label> <input type="checkbox" value="" class="checkServicios" id="dme" name="dme" checked="checked" /><br>
                        <label for="cualli" title="Servicio Cualli">Cualli</label> <input type="checkbox" value="" class="checkServicios" id="cualli" name="cualli" checked="checked" />
                        <label for="vpm" title="Ventas de primera mano">VPM</label> <input type="checkbox" value="" class="checkServicios" id="vpm" name="vpm" checked="checked" /><br>

                    </div>
                </div>
                <br>
                <div id="div-boton" style="margin-bottom:10px;">
                    <button class="botonAvanzado" id="btn-buscadorAvanzado">Búsqueda avanzada</button>
                    <button id="buscar" class="botonMas">Buscar</button>
                </div>

                <input type="hidden" id="latitud" value="0" />
                <input type="hidden" id="base_url" value="<?=base_url()?>" />
                <input type="hidden" id="longitud" value="0" />
                <input type="hidden" id="markers" value="0" />
                <input type="hidden" id="position" value="false" />
                <input type="hidden" id="geo-lat" value="0" />
                <input type="hidden" id="geo-lng" value="0" />
                <input type="hidden" id="current-marker" value="0" />
                <input type="hidden" id="current-marker-color" value="0" />
            </div>
            <section id="mapa">
                <div id="altaGasolinera" style="display:none">
                    Introduce el número de la gasolinera:
                    <input type=text value="" id="nuevaEstacion"/> 
                    <button class="botonMas" id="btnAltaGasolinera">Enviar</button></div>
                <div id="gracias" style="display:none"><h1>Gracias!!</h1></div>
                <div id="map-canvas"></div>
                <!--<span><b><a href="<?=base_url()?>index.php/gasolinazos/contacto">¿Te gusta esto? contrátame</a></b></span>-->
            </section>
            <section id="resultados" class="list4">
                <ul id="ul-resultados" class="ul-resultados">
                    <li>Ingrese sus criterios de búsqueda en la parte superior</li>
                </ul>
            </section>
        </body>
</html>