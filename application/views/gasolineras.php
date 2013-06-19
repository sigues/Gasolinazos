<div class="3u">

        <!-- Left Sidebar -->
                <section>
                        <header>
                                <h2>Publicidad</h2>
                        </header>
                        <p>
                                ¿Quieres anunciarte con nosotros? <a href="<?=base_url()?>index.php/gasolinazos/contacto">Contáctanos</a>						
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
<?$this->load->model("noticias_m");?>
        <? $this->load->view("sidebar/noticias")?>

</div>