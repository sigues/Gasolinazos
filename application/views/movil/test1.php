
<!DOCTYPE HTML>
<!--
	Halcyonic 3.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<style>
    html, body, #wrapper {
    height: 100%;
    min-height: 100%;
    z-index:1;
    }
    
    header{
        width:97%;
        height:30px;
        height: 5%;
        background: #005702;
        border: #000 solid thick;
        margin: 2px 2px 2px 2px;
    }
    section{
        width:97%;
        background: #999;
        border: #000 solid thick;
        margin: 2px 2px 2px 2px;
    }
    #buscador{
        display: none;
    }
    #mapa {
        height: 70%;
    }
    #resultados{
        height: 25%;
        overflow:scroll;
    }
    #map-canvas{
        height: 100%
    }
    .layer2 { position: absolute; 
             z-index: 2; top: 10px; 
             left: 10px; 
             height: 100%;
             width: 100%;
            background-color:rgba(255,0,0,0.5);
    }
   
</style>

<html>
	<head>
		<title>Pruebamela1
                </title>
            <script src="<?=base_url()?>js/jquery-1.9.1.min.js"></script>
		<script src="<?=base_url()?>js/config.js"></script>
                <script type="text/javascript"
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR4DqYTbeqZUACVrVaAwnjFcgY6vR4BA&sensor=true">
                  </script>
		<script src="<?=base_url()?>js/gmaps.js"></script>

        <script type="text/javascript" src="<?=base_url()?>js/lib/buscador_movil.js"></script>

        </head>
        <body>
            <header id="header">Gasolinazos.com</header>
            <section id="buscador">
                <input type="text" value="texto libre" /><br>
                <select>
                    <option>sdfdsf</option>
                    <option>sdfdsf</option>
                    <option>sdfdsf</option>
                    <option>sdfdsf</option>
                </select>
                
                
            </section>
            <section id="mapa">
             <div id="map-canvas"></div>
            </section>
            <section id="resultados">
                <input type="hidden" id="base_url" value="<?=base_url()?>" />
                <input type="hidden" id="latitud" value="0" />
                <input type="hidden" id="longitud" value="0" />
                <input type="hidden" id="markers" value="0" />
                <input type="hidden" id="position" value="false" />
                <input type="hidden" id="geo-lat" value="0" />
                <input type="hidden" id="geo-lng" value="0" />

                <ul id="ul-resultados" class="quote-list">
                    <li>Ingrese sus criterios de búsqueda en la parte superior</li>
                </ul>
            </section>
            <div id="layer2" class="layer2">
               
                Final content.      
            </div>
        </body>
</html>