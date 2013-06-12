<div class="row">
<div class="12u">
    <input id="base_url" value="<?=base_url()?>" type="hidden"/>
        <!-- Main Content -->
                <section>
                        <header>
                                <h2>Buscador</h2>
                                <h3>Busque las gasolineras mas cercanas</h3>
                        </header>
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
                            <div id="div-boton">
                                <button id="buscar">Buscar</button>
                            </div><br>
                            <div id="div-texto">
                                <label for="buscador-texto">Texto libre: </label> <input type="text" id="buscador-texto" />
                            </div>
                            <input type="hidden" id="latitud" value="0" />
                            <input type="hidden" id="longitud" value="0" />
                            <input type="hidden" id="markers" value="0" />
                            <input type="hidden" id="position" value="false" />
                            <input type="hidden" id="geo-lat" value="0" />
                            <input type="hidden" id="geo-lng" value="0" />
                        </div>
                </section>
</div>
</div>
<div class="row">
<div class="3u">
<section id="resultados">
    <ul id="ul-resultados" class="quote-list">
        <li>Ingrese sus criterios de búsqueda en la parte superior</li>
    </ul>
</section>

</div>
<div class="9u">
    
    <section id="mapa">
        <div id="altaGasolinera" style="display:none">
            Introduce el número de la gasolinera:
            <input type=text value="" id="nuevaEstacion"/> 
            <button class="botonMas" id="btnAltaGasolinera">Enviar</button></div>
        <div id="gracias" style="display:none"><h1>Gracias!!</h1></div>
        <div id="map-canvas"></div>
    </section>
</div>
                    
                        

</div>
<script type="text/javascript" src="<?=base_url()?>js/lib/buscador.js?t=<?=rand(0,1000)?>"></script>
