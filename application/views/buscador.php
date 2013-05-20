
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
                                    <option> - Seleccionar - </option>
                                </select>
                            </div>
                            
                        </div>
                        <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam metus, congue 
                                vel suscipit ut, dignissim non risus. Vestibulum ante est, fringilla nec placerat 
                                eu, vestibulum vitae diam. Integer eget egestas eros. Duis enim erat, mollis quis 
                                lacinia eget, blandit nec ipsum. Donec vitae turpis ipsum. Aliquam mauris libero, 
                                sagittis in eleifend at, mattis imperdiet velit. Donec urna risus, rutrum molestie 
                                varius ac, lacinia sit amet augue. Nam ultrices elementum eros.
                        </p>
                        <p>
                                Sed faucibus viverra ligula, non varius magna semper vitae. Donec eu justo ut ipsum 
                                hendrerit congue nec eu risus. Cum sociis natoque penatibus et magnis dis parturient 
                                montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing 
                                egestas tempus. Cras convallis odio sit amet risus convallis porttitor. Integer 
                                vehicula fermentum ligula at pretium. Suspendisse semper iaculis eros, eu aliquam 
                                justo imperdiet vel. Proin nec dictum mi. Duis commodo enim non tellus interdum 
                                elit. Suspendisse fermentum adipiscing nisi, a tempor libero malesuada at. Morbi 
                                lacinia dui adipiscing risus eleifend tincidunt. Proin eu mauris eu tellus eleifend 
                                hendrerit.
                        </p>
                        <p>
                                Mauris sit amet tellus urna. In facilisis, tortor vitae ultricies egestas, odio 
                                mi rhoncus arcu, quis euismod felis felis et velit. Mauris varius consectetur erat 
                                egestas tempus. Cras convallis odio sit amet risus convallis porttitor. Integer 
                                vehicula fermentum ligula at pretium. Suspendisse semper iaculis eros, eu aliquam 
                                justo imperdiet vel. Proin nec dictum mi. Duis commodo enim non tellus interdum 
                                iaculis. Phasellus ultrices diam sit amet orci lacinia sed consequat dui auctor. 							
                        </p>
                        <p>
                                Sed faucibus viverra ligula, non varius magna semper vitae. Donec eu justo ut ipsum 
                                hendrerit congue nec eu risus. Cum sociis natoque penatibus et magnis dis parturient 
                                montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing 
                                egestas tempus. Cras convallis odio sit amet risus convallis porttitor. Integer 
                                vehicula fermentum ligula at pretium. Suspendisse semper iaculis eros, eu aliquam 
                                justo imperdiet vel. Proin nec dictum mi. Duis commodo enim non tellus interdum 
                                elit. Suspendisse fermentum adipiscing nisi, a tempor libero malesuada at. Morbi 
                                lacinia dui adipiscing risus eleifend tincidunt. Proin eu mauris eu tellus eleifend 
                                hendrerit.
                        </p>
                        <p>
                                Mauris sit amet tellus urna. In facilisis, tortor vitae ultricies egestas, odio 
                                mi rhoncus arcu, quis euismod felis felis et velit. Mauris varius consectetur erat 
                                egestas tempus. Cras convallis odio sit amet risus convallis porttitor. Integer 
                                vehicula fermentum ligula at pretium. Suspendisse semper iaculis eros, eu aliquam 
                                justo imperdiet vel. Proin nec dictum mi. Duis commodo enim non tellus interdum 
                                iaculis. Phasellus ultrices diam sit amet orci lacinia sed consequat dui auctor. 							
                        </p>
                </section>

</div>
<script src="<?=base_url()?>js/lib/buscador.js"></script>