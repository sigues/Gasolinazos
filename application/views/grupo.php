<div class="9u">
    <!-- Main Content -->
                <section>
                        <header>
                                <h2>Grupo <?=$nombre_grupo?></h2>
                                <h3><?=$direccion_grupo?>, <?=$colonia_grupo?>, <?=$nombre_ciudad?>, <?=$nombre_estado?></h3>
                        </header>
                        <p>
                            <?php
                            
                            if(sizeof($estaciones)>0){ 
                                $x=0;?>
                            <b>Sus mejores gasolineras según los usuarios:</b>
                        <ul>
                            <?php 
                            foreach($estaciones as $c=>$gasolinera){
                                if($x==10){
                                    break(1);
                                }
                                
                                echo "<li>".($gasolinera->promedio*100)."% <a href='".base_url()."index.php/gasolinera/estacion/".$gasolinera->estacion."'>".$gasolinera->estacion." Col. ".$gasolinera->colonia.", ".$gasolinera->nombre_ciudad.", ".$gasolinera->nombre_estado."</a></li>";
                                $x++;
                                
                            } 
                            ?>
                        </ul>
                            <? } ?>
                        <a href="<?=base_url()?>index.php/grupo/gasolineras/<?=$idgrupo?>">Ver listado completo...</a>
                        </p>
                                                        <?php
                            
                            if(sizeof($estaciones_reportadas)>0){ 
                                $x=0;?>
                        <p>
                            <b>Gasolineras reportadas con errores por PROFECO:</b>

                        <ul>
                            <?php 
                            foreach($estaciones_reportadas as $c=>$gasolinera){
                                if($x==10){
                                    break(1);
                                }
                                
                                echo "<li>".($gasolinera->promedio*100)."% <a href='".base_url()."index.php/gasolinera/estacion/".$gasolinera->estacion."'>".$gasolinera->estacion." Col. ".$gasolinera->colonia.", ".$gasolinera->nombre_ciudad.", ".$gasolinera->nombre_estado."</a></li>";
                                $x++;
                                
                            } 
                            ?>
                        </ul>
                        </p>
                            <? } ?>
                        
                        
                        
                        
                        <div class="fb-comments" data-href="http://www.gasolinazos.com" data-width="825" data-num-posts="10">

                        </div>                       
                </section>

</div>
<div class="3u">

    <input id="idgrupo" type="hidden" value="<?=$idgrupo?>"/>
    <input id="base_url" type="hidden" value="<?=base_url()?>"/>
        <!-- Sidebar -->
                <section>
                        <header>
                                <h2>Calificación</h2>
                        </header>
                    <div class="div_calificar">
                        <div class="calificar">
                            Promedio de las gasolineras en este grupo:<br>
                            <center><span class="total-promedio"><?=($promedio_grupo["promedio"])*100?>%</span></center>
                                <center><?=($promedio_grupo["votos"])?> Votos</center>
                        </div>
                    </div>
                        <ul class="link-list">
                                <li><a href="#">Ver quejas</a></li>
                                <li><a href="#">Semáforo PROFECO</a></li>
                        </ul>
                </section>
                <section>
                        <header>
                                <h2>Contacto:</h2>
                        </header>
                        <p>
                            <? if(isset($telefono_grupo)){
                                ?> <b>Telefono:</b> <?=$telefono_grupo?> </br>
                            <? } ?>
                            <? if(isset($correo_grupo)){
                                ?> <b>Correo:</b> <a href="mailto:<?=$correo_grupo?>"><?=$correo_grupo?></a> </br>
                            <? } ?>                                
                            <? if(isset($direccion_grupo) || isset($colonia_grupo) || isset($nombre_ciudad) || isset($nombre_estado)){
                                ?> <b>Direccion:</b> <?=$direccion_grupo?>, <?=$colonia_grupo?>, <?=$nombre_ciudad?>, <?=$nombre_estado?> </br>
                            <? } ?>                                
                        </p>
                </section>
        <!--
                <section>
                        <header>
                                <h2>Publicidad:</h2>
                        </header>
                        
                        
                </section>
        !-->
</div>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script src="<?=base_url()?>js/lib/estacion.js"></script>

