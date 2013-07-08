<?
$CI = & get_instance();
    
$CI->load->model("noticias_m");
$noticias = $CI->noticias_m->getNoticiasPortada();
$x=0;
?>
<div id="features-wrapper">
    <div id="features">
            <div class="container">
                    <div class="row">
                        <?
                        foreach($noticias as $noticia){ ?>
                            <div class="3u">

                                    <!-- Feature #<?=$x?> -->
                                            <section>
                                                <? if(isset($noticia->imagen) && $noticia->imagen!=""){ ?>
                                                    <a href="<?=base_url()?>index.php/gasolinazos/noticia/<?=$noticia->idnoticia?>/<?=url_title($noticia->titulo)?>" class="bordered-feature-image"><img src="<?=base_url()?><?=$noticia->imagen?>" alt="<?=$noticia->imagen_texto?>" /></a>
                                                <? } ?>
                                                    <h2><a href="<?=base_url()?>index.php/gasolinazos/noticia/<?=$noticia->idnoticia?>/<?=url_title($noticia->titulo)?>"><?=substr($noticia->titulo,0,150)?></a></h2>
                                                    <?=$noticia->resumen?>
                                            </section>

                            </div>
                        <? $x++; 
                        } ?>
                        <? if($x < 4) { 
                            while($x<4) {?>
                            <div class="3u">

                                    <!-- Feature #<?=$x?> -->
                                            <section>
                                                    <a href="#" class="bordered-feature-image"><img src="<?=base_url()?>images/pic01.jpg" alt="" /></a>
                                                    <h2>Welcome to Halcyonic</h2>
                                                    <p>
                                                        Si no se le encuentra <strong>ningún</strong> uso a este div, 
                                                        quitarlo a la chingada
                                                            <!--This is <strong>Halcyonic</strong>, a free site template 
                                                            by <a href="http://n33.co/">AJ</a> for
                                                            <a href="http://html5up.net">HTML5 UP</a>. It's responsive,
                                                            built on HTML5 + CSS3, and includes 5 unique page layouts.-->
                                                    </p>
                                            </section>

                            </div>
                        <? $x++;
                            }
                        } ?>
                    </div>
            </div>
    </div>
</div>
