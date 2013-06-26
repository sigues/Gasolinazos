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
                            <input type="hidden" id="longitud" value="0" />
                            <input type="hidden" id="markers" value="0" />
                            <input type="hidden" id="position" value="false" />
                            <input type="hidden" id="geo-lat" value="0" />
                            <input type="hidden" id="geo-lng" value="0" />
                            <input type="hidden" id="current-marker" value="0" />
                            <input type="hidden" id="current-marker-color" value="0" />
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
