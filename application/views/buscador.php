
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
                            
                        </div>
                    
                        <div id="mapa">
                                <div id="map-canvas"></div>
                        </div>
                        <div id="resultados">
                            <ul id="ul-resultados" class="quote-list">
                                <li>Ingrese sus criterios de búsqueda en la parte superior</li>
                            </ul>
                        </div>
                        
                </section>

</div>
<script src="<?=base_url()?>js/lib/buscador.js"></script>
