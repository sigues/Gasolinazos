<div class="3u">

        <!-- Left Sidebar -->
                <section>
                        <header>
                                <h2>Publicidad</h2>
                        </header>
                        <p>
                                Vehicula fermentum ligula at pretium. Suspendisse semper iaculis eros, eu aliquam 
                                iaculis. Phasellus ultrices diam sit amet orci lacinia sed consequat. 							
                        </p>
                </section>
</div>
<div class="6u skel-cell-mainContent">

        <!-- Main Content -->
                <section>
                        <header>
                                <h2>Grupo <?=$nombre_grupo?></h2>
                                <h3><?=$direccion_grupo?>, <?=$colonia_grupo?>, <?=$nombre_ciudad?>, <?=$nombre_estado?></h3>
                        </header>
                        <p>
                            <?php
                            
                            if(sizeof($estaciones)>0){ 
                                $x=1;?>
                            <b>Sus mejores gasolineras según los usuarios:</b>
                        <ul>
                            <?php 
                            foreach($estaciones as $c=>$gasolinera){
                                
                                
                                echo "<li>".$x." - ".($gasolinera->promedio*100)."% <a href='".base_url()."index.php/gasolinera/estacion/".$gasolinera->estacion."'>".$gasolinera->estacion." Col. ".$gasolinera->colonia.", ".$gasolinera->nombre_ciudad.", ".$gasolinera->nombre_estado."</a></li>";
                                $x++;
                                
                            } 
                            ?>
                        </ul>
                            <? } ?>
                        </p>
                </section>

</div>
<div class="3u">

        <!-- Right Sidebar -->
                <section>
                        <header>
                                <h2>Publicidad</h2>
                        </header>
                        <ul class="link-list">
                                <li><a href="#">Sed dolore viverra</a></li>
                                <li><a href="#">Ligula non varius</a></li>
                                <li><a href="#">Nec sociis natoque</a></li>
                                <li><a href="#">Penatibus et magnis</a></li>
                                <li><a href="#">Dis parturient montes</a></li>
                                <li><a href="#">Nascetur ridiculus</a></li>
                        </ul>
                </section>

</div>