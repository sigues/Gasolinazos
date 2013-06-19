<div class="9u">
    <!-- Main Content -->
                <section>
                        <header>
                                <h2><?=$estacion["estacion"]?> - <?=$estacion["nombre"]?></h2>
                                <h3><?=$estacion["direccion"]?>, <?=$estacion["colonia"]?>, <?=$estacion["nombre_ciudad"]?>, <?=$estacion["nombre_estado"]?></h3>
                                <?php $this->load->view("extra/botones_sociales")?>
                        </header>
                        <p>
                            <?php
                            $semaforo[1] = "verde";
                            $semaforo[2] = "amarilla";
                            $semaforo[3] = "roja";
                                foreach($reportes as $reporte){
                                    echo "<a href='http://webapps.profeco.gob.mx/verificacion/gasolina/gasolinera01.asp?IdEs=".$reporte->idprofeco."' target='_blank'>Alerta ".$semaforo[$reporte->semaforo]." del día ".date("d-m-Y",strtotime($reporte->fecha))."</a><br>";
                                }
                            ?>
                            <table width="100%">
                                <tr>
                                    <td><b>Productos:</b></td>
                                    <td>
                                        <?
                                        foreach($productos as $producto){
                                            echo "<img src=".base_url()."/images/".$producto->nombre.".png width='100px' /> ".$producto->precio."<br>";
                                        }
                                        ?>
                                    </td>
                                    <td><b>Promedio:</b></td>
                                    <td><span id="promedio_voto"><?=$promedio?></span>% (<span id="votos_voto"><?=$votos?></span> votos)</td>
                                </tr>
                                <tr>
                                    <td><b>Cualli:</b></td>
                                    <td><?=($estacion["cualli"]==0)?"No":"Si"?></td>
                                    <td><b>VPM:</b></td>
                                    <td><?=($estacion["vpm"]==0)?"No":"Si"?></td>
                                </tr>
                                <tr>
                                    <td><b>Inicio de operaciones:</b></td>
                                    <td><?=date("d-m-Y",strtotime($estacion["inicio_operaciones"]))?></td>
                                    <td><b>Grupo:</b></td>
                                    <td><a href="<?=base_url()."index.php/grupo/perfil/".$estacion["grupo_idgrupo"]?>"><?=$estacion["nombre"]?></a></td>
                                </tr>
                                <tr>
                                    <td><b>Fecha de contrato:</b></td>
                                    <td><?=date("d-m-Y",strtotime($estacion["fecha_contrato"]))." - ".date("d-m-Y",strtotime($estacion["vencimiento_contrato"]))?></td>
                                    <td><b>Número de contrato:</b></td>
                                    <td><?=$estacion["numero_contrato"]?></td>
                                </tr>
                            </table>
                        
                        </p>
                        
                        <p>
                            
                            <input type="hidden" id="latitud" value="<?=$estacion["latitud"]?>" />
                            <input type="hidden" id="longitud" value="<?=$estacion["longitud"]?>" />
                            <input type="hidden" id="markers" value="0" />
                            <input type="hidden" id="position" value="false" />
                            <input type="hidden" id="geo-lat" value="0" />
                            <input type="hidden" id="geo-lng" value="0" />
                            <input type="hidden" id="base_url" value="<?=base_url()?>" />
                            <input type="hidden" id="estacion" value="<?=$estacion["estacion"]?>" />
                            <input type="hidden" id="idgasolinera" value="<?=$estacion["idgasolinera"]?>" />
                            <input type="hidden" id="ruta" value="<?=$ruta?>" />
                            <div id="mapa">
                                <div id="map-canvas"></div>
                            </div>
                            <?php
                                $cadena_mapa = ltrim(substr($estacion["estacion"],1),"0");
                               // echo $cadena_mapa;
                            ?>
                       <!--     <iframe width="825" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                            src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=PEMEX-<?=trim($cadena_mapa)?>,+<?=trim($estacion["nombre_ciudad"])?>,+<?=trim($estacion["nombre_estado"])?>&amp;aq=
                            &amp;t=h&amp;ie=UTF8&amp;hq=PEMEX-<?=trim($cadena_mapa)?>,&amp;hnear=,+<?=trim($estacion["nombre_ciudad"])?>,+<?=trim($estacion["nombre_estado"])?>,+Mexico
                            &amp;spn=0.031955,0.061283&amp;output=embed"></iframe>
                            <br /><small>
                            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=PEMEX-<?=$cadena_mapa?>,+tijuana&amp;aq=&amp;sll=37.0625,-95.677068
                            &amp;sspn=37.136668,86.572266&amp;t=h&amp;ie=UTF8&amp;hq=PEMEX-<?=$cadena_mapa?>,&amp;hnear=Tijuana,+Baja+California,+Mexico&amp;ll=32.529472,-117.010391
                            &amp;spn=0.031955,0.061283" style="color:#0000FF;text-align:left">View Larger Map</a></small> !-->

                        </p>
                        <ul id="instrucciones"></ul>
                        <br><br>
                            <div class="fb-comments" data-href="http://www.gasolinazos.com" data-width="825" data-num-posts="10">
                                
                            </div>                       
                </section>

</div>
<div class="3u">

    <input id="idgasolinera" type="hidden" value="<?=$estacion["idgasolinera"]?>"/>
    <input id="base_url" type="hidden" value="<?=base_url()?>"/>
        <!-- Sidebar -->
                <section>
                        <header>
                                <h2>Calificación</h2>
                        </header>
                    <div class="div_calificar">
                        <table border="1" class="calificar">
                            <tr>
                                <td><button id="votoMas" class="botonMas">+</button></td>
                                <td rowspan="2"><span id="promedio"><?=$promedio?></span>%<br>
                                                <span id="votos"><?=$votos?></span> votos
                                </td>
                            </tr>
                            <tr>
                                <td><button id="votoMenos" class="botonMenos">-</button></td>
                            </tr>
                        </table>
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
                            <? if(isset($estacion["telefono"])){
                                ?> <b>Telefono:</b> <?=$estacion["telefono"]?> </br>
                            <? } ?>
                            <? if(isset($estacion["email"])){
                                ?> <b>Correo:</b> <a href="mailto:<?=$estacion["email"]?>"><?=$estacion["email"]?></a> </br>
                            <? } ?>                                
                            <? if(isset($estacion["direccion"])){
                                ?> <b>Direccion:</b> <?=$estacion["direccion"]?>, <?=$estacion["colonia"]?>, <?=$estacion["nombre_ciudad"]?>, <?=$estacion["nombre_estado"]?> </br>
                            <? } ?>                                
                        </p>
                </section>
                <section>
                        <header>
                                <h2>Gasolineras cercanas:</h2>
                        </header>
                        
                        <ul class="link-list">
                            <?php for($x=1;$x<=10;$x++){
                                if(isset($gasolineras[$x])){
                                ?>
                                    <li>
                                        <a href="<?=base_url()?>index.php/gasolinera/estacion/<?=$gasolineras[$x]->estacion?>"><?=$gasolineras[$x]->estacion?></a> <small><?=number_format($gasolineras[$x]->distancia,2)?> metros</small>
                                        <br><small><?=$gasolineras[$x]->direccion?></small>
                                    </li>
                                <? } 
                            }?>
                        </ul>
                </section>

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

