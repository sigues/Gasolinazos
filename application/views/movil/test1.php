
<!DOCTYPE HTML>
<!--
	Halcyonic 3.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
                margin: 2px 2px 2px 2px;
                -webkit-border-radius: 0px 0px 8px 8px;
                border-radius: 0px 0px 8px 8px; 
                text-shadow: 2px 2px 2px #777777;
                filter: dropshadow(color=#777777, offx=2, offy=2);
                background: #bfd255; /* Old browsers */
                background: -moz-linear-gradient(top, #bfd255 0%, #8eb92a 50%, #72aa00 51%, #9ecb2d 100%); /* FF3.6+ */
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#bfd255), color-stop(50%,#8eb92a), color-stop(51%,#72aa00), color-stop(100%,#9ecb2d)); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(top, #bfd255 0%,#8eb92a 50%,#72aa00 51%,#9ecb2d 100%); /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(top, #bfd255 0%,#8eb92a 50%,#72aa00 51%,#9ecb2d 100%); /* Opera 11.10+ */
                background: -ms-linear-gradient(top, #bfd255 0%,#8eb92a 50%,#72aa00 51%,#9ecb2d 100%); /* IE10+ */
                background: linear-gradient(to bottom, #bfd255 0%,#8eb92a 50%,#72aa00 51%,#9ecb2d 100%); /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bfd255', endColorstr='#9ecb2d',GradientType=0 ); /* IE6-9 */
            }
            header div{
                display: inline-block;
                padding-right:15px;
                padding-top:5px;
                margin-left:10px;
            }
            section{
                width:97%;
                border: #000 solid thin 1px;
                margin: 2px 2px 2px 2px;
            }
            #buscador{
                display: none;
            }
            #mapa {
                height: 65%;
            }
            #resultados{
                height: 25%;
                overflow:auto;
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
        #buscador{
            background-color: #6bbcef;
            height:80px;
        }
        
        #buscador div{
            display: inline-block;
            padding-right:15px;
            margin-left:10px;
        }
        
        #buscador div input{
            -moz-box-shadow:inset 0px 1px 0px 0px #f29c93;
            -webkit-box-shadow:inset 0px 1px 0px 0px #f29c93;
            -moz-border-radius:5px; 
            -webkit-border-radius:5px;
            border-radius:6px;
        }
        
        #buscador div select{
            -moz-box-shadow:inset 0px 1px 0px 0px #f29c93;
            -webkit-box-shadow:inset 0px 1px 0px 0px #f29c93;
            -moz-border-radius:6px; 
            -webkit-border-radius:6px;
            border-radius:6px;
        }
        
        .list4 { font-family:Georgia, Times, serif; font-size:11px; }
        .list4 ul { list-style: none; padding-left: 0px; padding-top:0px; }
        .list4 ul li {display:block; text-decoration:none; color:#000000; background-color:#FFFFFF; line-height:30px;
          border-bottom-style:solid; border-bottom-width:1px; border-bottom-color:#CCCCCC; padding-left:10px; cursor:pointer; }
        .list4 ul li a {  }
        .list4 ul li a:hover { color:#FFFFFF;  }
        .list4 ul li a strong { margin-right:10px; }
        #fb_loginbutton{
            float: right;
            margin-right: 30px;
        }
        .botonMas {
                -moz-box-shadow:inset 0px 1px 0px 0px #caefab;
                -webkit-box-shadow:inset 0px 1px 0px 0px #caefab;
                box-shadow:inset 0px 1px 0px 0px #caefab;
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #77d42a), color-stop(1, #5cb811) );
                background:-moz-linear-gradient( center top, #77d42a 5%, #5cb811 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77d42a', endColorstr='#5cb811');
                background-color:#77d42a;
                -moz-border-radius:6px;
                -webkit-border-radius:6px;
                border-radius:6px;
                border:1px solid #268a16;
                display:inline-block;
                color:#306108;
                font-family:arial;
                font-size:15px;
                font-weight:bold;
                padding:6px 11px;
                text-decoration:none;
                text-shadow:1px 1px 0px #aade7c;
        }.botonMas:hover {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5cb811), color-stop(1, #77d42a) );
                background:-moz-linear-gradient( center top, #5cb811 5%, #77d42a 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cb811', endColorstr='#77d42a');
                background-color:#5cb811;
        }.botonMas:active {
                position:relative;
                top:1px;
        }
        
        .botonMenos {
                -moz-box-shadow:inset 0px 1px 0px 0px #f29c93;
                -webkit-box-shadow:inset 0px 1px 0px 0px #f29c93;
                box-shadow:inset 0px 1px 0px 0px #f29c93;
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #fe1a00), color-stop(1, #ce0100) );
                background:-moz-linear-gradient( center top, #fe1a00 5%, #ce0100 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fe1a00', endColorstr='#ce0100');
                background-color:#fe1a00;
                -moz-border-radius:6px; 
                -webkit-border-radius:6px;
                border-radius:6px;
                border:1px solid #d83526;
                display:inline-block;
                color:#ffffff;
                font-family:arial;
                font-size:15px;
                font-weight:bold;
                padding:6px 12px;
                text-decoration:none;
                text-shadow:1px 1px 0px #b23e35;
        }.botonMenos:hover {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ce0100), color-stop(1, #fe1a00) );
                background:-moz-linear-gradient( center top, #ce0100 5%, #fe1a00 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ce0100', endColorstr='#fe1a00');
                background-color:#ce0100;
        }.botonMenos:active {
                position:relative;
                top:1px;
        }
        </style>
        </head>
        <body>
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