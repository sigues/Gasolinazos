<div class="9u">
    <!-- Main Content -->
                <section>
                        <header>
                                <h2><?=$estacion["estacion"]?> - <?=$estacion["nombre"]?></h2>
                                <h3><?=$estacion["direccion"]?>, <?=$estacion["colonia"]?>, <?=$estacion["nombre_ciudad"]?>, <?=$estacion["nombre_estado"]?></h3>
                        </header>
                        <p>
                                Información de la gasolinera <br>
                                Información de la gasolinera <br>
                                Información de la gasolinera <br>
                                Información de la gasolinera <br>
                                Información de la gasolinera <br>
                                Información de la gasolinera <br>
                                Información de la gasolinera <br>
                        </p>
                        
                        <p>
                            <?php
                                $cadena_mapa = ltrim(substr($estacion["estacion"],1),"0");
                               // echo $cadena_mapa;
                            ?>
                            <iframe width="825" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                            src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=PEMEX-<?=$cadena_mapa?>,+tijuana&amp;aq=&amp;sll=37.0625,-95.677068
                            &amp;sspn=37.136668,86.572266&amp;t=h&amp;ie=UTF8&amp;hq=PEMEX-<?=$cadena_mapa?>,&amp;hnear=Tijuana,+Baja+California,+Mexico&amp;ll=32.529472,-117.010391
                            &amp;spn=0.031955,0.061283&amp;output=embed"></iframe>
                            <br /><small>
                            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=PEMEX-<?=$cadena_mapa?>,+tijuana&amp;aq=&amp;sll=37.0625,-95.677068
                            &amp;sspn=37.136668,86.572266&amp;t=h&amp;ie=UTF8&amp;hq=PEMEX-<?=$cadena_mapa?>,&amp;hnear=Tijuana,+Baja+California,+Mexico&amp;ll=32.529472,-117.010391
                            &amp;spn=0.031955,0.061283" style="color:#0000FF;text-align:left">View Larger Map</a></small>

                        </p>
                        <p>
                            
                        <h1>Comentarios</h1>
                        </p>
                </section>

</div>
<div class="3u">

        <!-- Sidebar -->
                <section>
                        <header>
                                <h2>Calificación</h2>
                        </header>
                    <p>
                    <div style="background-color:yellow;height:225px;width:225px;">Aquí va a ir la madre para calificar</div>
                    </p>
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
<!--                        <ul class="link-list">
                                <li><a href="#">Sed dolore viverra</a></li>
                                <li><a href="#">Ligula non varius</a></li>
                                <li><a href="#">Dis parturient montes</a></li>
                                <li><a href="#">Nascetur ridiculus</a></li>
                        </ul>-->
                </section>

</div>
