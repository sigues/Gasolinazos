
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
                        </header>
                    <p>
                        <? if(isset($noticia["imagen"]) && $noticia["imagen"]!=""){ ?>
                            <div class="imagenNoticia"><img src="<?=base_url()?><?=$noticia["imagen"]?>" width="200px" /><span><?=$noticia["imagen_texto"]?></span></div>
                        <? } ?>
                        <?=$noticia["texto"]?>
                        
                    </p>
                            
                </section>
</div>
<div class="3u">

        <!-- Sidebar -->
                <section>
                        <header>
                                <h2>Noticias</h2>
                        </header>
                        <ul class="link-list">
                            <? 
                            if(isset($noticias_sidebar) && sizeof($noticias_sidebar)>0){ 
                                foreach($noticias_sidebar as $noticia){ ?>
                                    <li><a href="<?=base_url()?>index.php/gasolinazos/noticia/<?=$noticia->idnoticia?>/<?=url_title($noticia->titulo);?>"><?=$noticia->titulo?></a></li>
                                <? }
                                
                                
                            }
                            ?>
                        </ul>
                </section>
</div>
