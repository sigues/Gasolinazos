<div class="9u">

        <!-- Main Content -->
                <section>
                    
                    <? foreach($noticias as $noticia){?>
                        <header>
                                <h2><?=$noticia->titulo?></h2>
                                <h3><?=date("d/M/Y",strtotime($noticia->fecha))?></h3>
                        </header>
                        <p>
                                <?=$noticia->resumen?>
                        </p>
                    
                    <? } ?>

                </section>

</div>
<div class="3u">

        <!-- Sidebar -->
                <section>
                        <header>
                                <h2>Magna Phasellus</h2>
                        </header>
                        <ul class="link-list">
                                <li><a href="#">Sed dolore viverra</a></li>
                                <li><a href="#">Ligula non varius</a></li>
                                <li><a href="#">Nec sociis natoque</a></li>
                                <li><a href="#">Penatibus et magnis</a></li>
                                <li><a href="#">Dis parturient montes</a></li>
                                <li><a href="#">Nascetur ridiculus</a></li>
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
