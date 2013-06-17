
<div class="9u">
<script>
$(document).ready(function() {
    $(function() {
        $( document ).tooltip();
    });
});
</script>
        <!-- Main Content -->
        <?if(isset($success)){?>
                <section>
                        <header>
                                <h2>Gracias por contactarnos</h2>
                        </header>
                        
                        <p>
                            <h3>Gracias por tu mensaje. Tu opinion es muy importante para nosotros, 
                                es por eso que nuestro equipo se encargará de dar especial seguimiento a tus incomodidades.
                            Por el momento, no dudes en seguir utilizando nuestro <a href="<?=base_url()?>index.php/gasolineras/buscador">buscador de gasolineras</a></h3>
                        </p>
                            
                </section>
        <?} else {?>
                <section>
                        <header>
                                <h2>Contacto</h2>
                                <h3>¿Tienes preguntas, opiniones, sugerencias o quieres reportar problemas? ¡escríbenos!</h3>
                        </header>
                        <form action="" method="post" id="contacto" name="contacto">
                            <font color="red"><? echo form_error('correo'); ?></font>
                            Correo electrónico: <input name="correo" id="correo" value="<?php echo set_value('correo'); ?>"/><br/>
                            Mensaje:<br/>
                            <font color="red"><? echo form_error('mensaje'); ?></font>
                            <textarea rows="5" cols="60" id="mensaje" name="mensaje"><?php echo set_value('mensaje'); ?></textarea><br><br>
                            <button <?=(!$fbid)?" title='Debe registrarse en el sistema con facebook, en la esquina superior derecha de la pantalla. ' class='botonGris'  onclick='alert(\"Debe registrarse en el sistema con facebook, en la esquina superior derecha de la pantalla. \");return false;'":" onclick='contacto.submit()' class='botonMas' "?> name="enviar" id="enviar"  >Enviar</button>
                            
                        </form>
                            
                </section>
        <? } ?>
</div>
<div class="3u">

        <!-- Sidebar -->
                <section>
                        <header>
                                <h2>Noticias</h2>
                        </header>
                        <ul class="link-list">
                            <? 
                            if(isset($noticias) && sizeof($noticias)>0){ 
                                foreach($noticias as $noticia){ ?>
                                    <li><a href="<?=base_url()?>index.php/gasolinazos/noticia/<?=$noticia->idnoticia?>/<?=url_title($noticia->titulo);?>"><?=$noticia->titulo?></a></li>
                                <? }
                                
                                
                            }
                            ?>
                        </ul>
                </section>
                <section>
                        <header>
                                <h2>Ipsum Dolor</h2>
                        </header>
                        <p>
                                Vehicula fermentum ligula at pretium. Suspendisse semper iaculis eros, eu aliquam 
                                iaculis. Phasellus ultrices diam sit amet orci lacinia sed consequat. 							
                        </p>
                        <ul class="link-list">
                                <li><a href="#">Sed dolore viverra</a></li>
                                <li><a href="#">Ligula non varius</a></li>
                                <li><a href="#">Dis parturient montes</a></li>
                                <li><a href="#">Nascetur ridiculus</a></li>
                        </ul>
                </section>

</div>
