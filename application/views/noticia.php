
<div class="9u">
<script>
$(document).ready(function() {
    $(function() {
        $( document ).tooltip();
    });
});
</script>
                <section>
                        <header>
                                <h2><?=$noticia["titulo"]?></h2>
                                <h3>Publicada el <?=date("d/m/Y",strtotime($noticia["fecha"]))?>, <?=$noticia["vistas"]?> Visitas</h3>
                                <?php $this->load->view("extra/botones_sociales")?>
                        </header>
                    <p>
                        <? if(isset($noticia["imagen"]) && $noticia["imagen"]!=""){ ?>
                            <div class="imagenNoticia"><img src="<?=base_url()?><?=$noticia["imagen"]?>" width="200px" /><span><?=$noticia["imagen_texto"]?></span></div>
                        <? } ?>
                        <?=$noticia["texto"]?>
                        
                    </p>
                    <? $this->load->view("extra/comentarios"); ?>  
                </section>
</div>
<div class="3u">

        <!-- Sidebar -->
        <?php
            $this->load->view("sidebar/noticias");
        ?>
</div>
