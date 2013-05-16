$(document).ready(function() {

    $("#votoMas").click(function(){
        $.ajax(
                            {
                                url: $("#base_url").val()+"index.php/gasolinera/voto",
                                type: "post",
                                dataType: "json",
                                data:{
                                    voto:"1",
                                    gasolinera:$("#idgasolinera").val()
                                },
                                success: function( strData ){
                                        var promedio = strData.promedio*100;
                                        $("#promedio").html( promedio.toFixed(2) );
                                        $("#promedio_voto").html( promedio.toFixed(2) );
                                        $("#votos").html( strData.votos );
                                        $("#votos_voto").html( strData.votos );
                                }
                            }							
                            );
    });
    $("#votoMenos").click(function(){
                    $.ajax(
                            {
                                url: $("#base_url").val()+"index.php/gasolinera/voto",
                                type: "post",
                                dataType: "json",
                                data:{
                                    voto:"0",
                                    gasolinera:$("#idgasolinera").val()
                                },
                                success: function( strData ){
                                        var promedio = strData.promedio*100;
                                        $("#promedio").html( promedio.toFixed(2) );
                                        $("#promedio_voto").html( promedio.toFixed(2) );
                                        $("#votos").html( strData.votos );
                                        $("#votos_voto").html( strData.votos );
                                }
                            }							
                            );
    });

});

