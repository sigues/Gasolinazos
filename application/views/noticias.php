<div class="9u">

        <!-- Main Content -->
                <section>
                    
                    <? foreach($noticias as $noticia){?>
                        <header>
                                <h2><a href="<?=base_url()?>index.php/gasolinazos/noticia/<?=$noticia->idnoticia?>/<?=url_title($noticia->titulo)?>"><?=$noticia->titulo?></a></h2>
                                <h3>Publicada el <?=date("d/m/Y",strtotime($noticia->fecha))?>, <?=$noticia->vistas?> Visitas</h3>
                        </header>
                        <p>
                            <? if(isset($noticia->imagen) && $noticia->imagen!=""){ ?>
                                <div class="imagenNoticia"><img src="<?=base_url()?><?=$noticia->imagen?>" width="200px" /><span><?=$noticia->imagen_texto?></span></div>
                            <? } ?>
                                <?=$noticia->resumen?>
                        </p>
                    
                    <? } ?>

                </section>
<section>
    <p>Página: <?
    $paginas = ceil($count_noticias/5);
    
    if($pagina>1){
        echo " <a href='".base_url()."index.php/gasolinazos/noticias/".($pagina-1)."'>< Anterior</a> |";
    }
    for($x=1;$x<=$paginas;$x++){
        $url = ($pagina == $x) ? $x : "<a href='".base_url()."index.php/gasolinazos/noticias/".$x."'>".$x."</a>";
        echo $url."|";
    }                    
    if($paginas>1 && $pagina<$paginas){
        echo " <a href='".base_url()."index.php/gasolinazos/noticias/".($pagina+1)."'>Siguiente ></a>";
    }
                    ?></p>
    
</section>
</div>
<div class="3u">

        <!-- Sidebar -->
        <?php
            $this->load->view("sidebar/noticias");
        ?>

</div>
