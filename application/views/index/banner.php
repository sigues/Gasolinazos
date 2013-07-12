<div id="banner">
        <div class="container">
                <div class="row">
                        <div class="5u">

                                <!-- Banner Copy -->
                                        <p id="textoPrueba">¡Prueba nuestro buscador de gasolineras!</p>
                                        <a href="<?=base_url()?>index.php/gasolineras/buscador" class="button-big">Haz Click Aquí</a>

                        </div>
                        <div class="1u">
&nbsp;
                                <!-- Banner Copy -->
                        </div>
                        <div class="2u">
<img src="<?=base_url()?>images/premium.png" class="productoBanner" />
                                <span class="precioBanner">$<?=$precio["Premium"]?> / litro</span>
                                <br><small>
                                <? 
                                $x=0;
                                foreach($preciosAnteriores as $precios){
                                    if($precios->idproducto == 2){
                                        if($x>0){
                                            echo "<span >".date("d/m/Y",strtotime($precios->fecha))." $".$precios->precio."/litro</span><br>";
                                        }
                                        $x++;
                                    }
                                } ?>
                                </small>
                        </div>
                        <div class="2u">

<img src="<?=base_url()?>images/magna.png" class="productoBanner" />
                                <span class="precioBanner">$<?=$precio["Magna"]?> / litro</span>
                                <br><small>
                                <? $x=0;
                                foreach($preciosAnteriores as $precios){
                                    if($precios->idproducto == 1){
                                        if($x>0){
                                            echo "<span >".date("d/m/Y",strtotime($precios->fecha))." $".$precios->precio."/litro</span><br>";
                                        }
                                        $x++;
                                    }
                                } ?>
                                </small>

                        </div>
                        <div class="2u">

<img src="<?=base_url()?>images/diesel.png" class="productoBanner" />
                                <span class="precioBanner">$<?=$precio["Diesel"]?> / litro</span>
                                <br><small>
                                <? $x=0;
                                foreach($preciosAnteriores as $precios){
                                    if($precios->idproducto == 3){
                                        if($x>0){
                                            echo "<span >".date("d/m/Y",strtotime($precios->fecha))." $".$precios->precio."/litro</span><br>";
                                        }
                                        $x++;
                                    }
                                    
                                } ?>
                                </small>

                        </div>
                </div>
        </div>
</div>