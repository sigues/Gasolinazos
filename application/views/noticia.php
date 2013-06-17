
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
                                <h3><?=date("d/m/Y",strtotime($noticia["fecha"]))?>, <?=$noticia["vistas"]?> vistas</h3>
                        </header>
                    <p>
                        <?=$noticia["texto"]?>
                        <? if(isset($noticia["imagen"]) && $noticia["imagen"]!=""){ ?>
                            <div style="width:200px;float:right;"><img src="<?=base_url()?>images/<?=$noticia["imagen"]?>" width="200px" /><?=$noticia["imagen_texto"]?></div>
                        <? } ?>
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
