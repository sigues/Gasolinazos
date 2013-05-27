$(document).ready(function() {
    readyEstado();
    $("#buscar").click(function(n){
        buscarGasolineras();
    });
    initialize2();

});

function readyEstado(){
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
                                    readyCiudad();
                                }
                            }							
                            );
    });
}
function readyCiudad(){
    $("#ciudad").change(function(){
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
                                }
                            }							
                            );
    });
}	

function initialize2(data){
      map = new GMaps({
        div: '#map-canvas',
        lat: 19.423859,
        lng: -99.098053,
        zoom: 11,
        dragend: function(e) {
            buscarGasolinerasCoord(e.center.jb,e.center.kb);
        }
      });
      GMaps.geolocate({
        success: function(position) {
           // alert(position.coords.latitude+", "+position.coords.longitude);
          map.setCenter(position.coords.latitude, position.coords.longitude);
          buscarGasolinerasCoord(position.coords.latitude, position.coords.longitude);
        },
        error: function(error) {
          console.log('Geolocation failed: '+error.message);
        },
        not_supported: function() {
          alert("Su explorador no soporta la Geolocalización, le recomendamos actualizarlo.");
        },
        always: function() {
         // alert("Done!");
        }

      });
  return;
}

function cargaDatosMapa(data){
  var length = data.length;
  var latitud = ($("#latitud").val()!=0)?$("#latitud").val():data[0].latitud;
  var longitud = ($("#longitud").val()!=0)?$("#longitud").val():data[0].longitud;

  if(length>0){
      map = new GMaps({
        div: '#map-canvas',
        lat: latitud,
        lng: longitud,
        zoom: 15,
        dragend: function(e) {
            buscarGasolinerasCoord(e.center.jb,e.center.kb);
        }
      });
      for (var i = 0; i < length; i++) {
//          alert(data[i].latitud+" - "+data[i].longitud);
          if(data[i].latitud != null && data[i].longitud != null)
            var marker = map.addMarker({
              lat: data[i].latitud,
              lng: data[i].longitud,
              title: data[i].estacion,
              icon: "https://maps.google.com/mapfiles/kml/shapes/"+'schools_maps.png',
              infoWindow: {
                content: '<p>'+data[i].nombre+'<br>'+
                    '<small>'+data[i].direccion+'</small>'+'</p>'
              }
            });     
      }
      //http://hpneo.github.io/gmaps/examples/interacting.html
  }
  return;
}

function buscarGasolineras(pagina){
    pagina = (typeof pagina === "undefined") ? 1 : pagina;

    $.ajax(
            {
                url: $("#base_url").val()+"index.php/gasolineras/buscarGasolineras/"+pagina,
                type: "post",
                dataType: "json",
                data:{
                    ciudad:$("#ciudad").val(),
                    estado:$("#estado").val(),
                    colonia:$("#colonia").val(),
                    texto:$("#buscador-texto").val()
                },
                success: function( data ){
                    parseDatos(data);
                }
            }							
        );
}

function buscarGasolinerasCoord(latitud,longitud,pagina){
    pagina = (typeof pagina === "undefined") ? 1 : pagina;
    $("#latitud").val(latitud);
    $("#longitud").val(longitud);
    
    $.ajax(
            {
                url: $("#base_url").val()+"index.php/gasolineras/buscarGasolinerasCoord",
                type: "post",
                dataType: "json",
                data:{
                    latitud:latitud,
                    longitud:longitud
                },
                success: function( data ){
                    parseDatos(data);
                }
            }							
        );
     return;
}

function parseDatos(data){
    $("#ul-resultados").html("");
    var length = data.length,
        element = null;
    var base_url = $("#base_url").val();
    for (var i = 0; i < length; i++) {
      element = data[i];
      $("#ul-resultados").append("<li>"+data[i].nombre+" <small><a href='"+base_url+"index.php/gasolinera/estacion/"+data[i].estacion+"'>(ver perfil)</a></small>"
          +"<br><small>"+data[i].direccion+"<small></li>");
    }
    cargaDatosMapa(data);
    return;
}