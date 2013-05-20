$(document).ready(function() {

    $("#estado").change(function(){
        $.ajax(
                            {
                                url: $("#base_url").val()+"index.php/gasolineras/buscaCiudad",
                                type: "post",
                                dataType: "html",
                                data:{
                                    estado:$("#estado").val()
                                },
                                success: function( strData ){
                                    $("#div-ciudad").html(strData);
/*                                        var promedio = strData.promedio*100;
                                        $("#promedio").html( promedio.toFixed(2) );
                                        $("#promedio_voto").html( promedio.toFixed(2) );
                                        $("#votos").html( strData.votos );
                                        $("#votos_voto").html( strData.votos );*/
                                }
                            }							
                            );
    });
    $("#ciudad").click(function(){
                    $.ajax(
                            {
                                url: $("#base_url").val()+"index.php/gasolineras/buscaColonia",
                                type: "post",
                                dataType: "html",
                                data:{
                                    ciudad:$("#ciudad").val()
                                },
                                success: function( strData ){
                                        $("#div-colonia").html(strData);
                                        /*var promedio = strData.promedio*100;
                                        $("#promedio").html( promedio.toFixed(2) );
                                        $("#promedio_voto").html( promedio.toFixed(2) );
                                        $("#votos").html( strData.votos );
                                        $("#votos_voto").html( strData.votos );*/
                                }
                            }							
                            );
    });

});

