<?
$this->load->model("noticias_m");
$noticias = $this->noticias_m->getNoticiasSidebar(1);
?>

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