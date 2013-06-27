
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
                            <? 
                            if($idusuario == false) {?>
                            <font color="red"><? echo form_error('correo'); ?></font>
                            Correo electrónico: <input name="correo" id="correo" value="<?php echo set_value('correo'); ?>"/><br/>
                            <? } ?>
                            Mensaje:<br/>
                            <font color="red"><? echo form_error('mensaje'); ?></font>
                            <textarea rows="5" cols="60" id="mensaje" name="mensaje"><?php echo set_value('mensaje'); ?></textarea><br><br>
                            <button  onclick='contacto.submit();' class='botonMas' name="enviar" id="enviar"  >Enviar</button>
                            
                        </form>
                            
                </section>
        <? } ?>
</div>
<div class="3u">

        <!-- Sidebar -->
        <?php
            $this->load->view("sidebar/noticias");
        ?>
        
</div>
