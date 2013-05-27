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
        zoom: 15,
        dragend: function(e) {
            buscarGasolinerasCoord(e.center.jb,e.center.kb);
        }
      });
      GMaps.geolocate({
        success: function(position) {
           // alert(position.coords.latitude+", "+position.coords.longitude);
          map.setCenter(position.coords.latitude, position.coords.longitude);
          var marker = map.addMarker({
              lat: position.coords.latitude,
              lng: position.coords.longitude,
              title: "Usted está aquí",
              icon: "https://maps.google.com/mapfiles/kml/shapes/"+'poi.png',
              infoWindow: {
                content: '<p>'+"usted está aquí"+'</p>'
              }
            });  
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
     /* map = new GMaps({
        div: '#map-canvas',
        lat: latitud,
        lng: longitud,
        zoom: 15,
        dragend: function(e) {
            buscarGasolinerasCoord(e.center.jb,e.center.kb);
        }
      });*/
      var markers = new Array();
      for (var i = 0; i < length; i++) {
//          alert(data[i].latitud+" - "+data[i].longitud);
          if(data[i].latitud != null && data[i].longitud != null){
            var marker = map.addMarker({
              lat: data[i].latitud,
              lng: data[i].longitud,
              title: data[i].estacion,
              icon: "https://maps.google.com/mapfiles/kml/shapes/"+'gas_stations.png',
              infoWindow: {
                content: '<p>'+data[i].nombre+'<br>'+
                    '<small>'+data[i].direccion+'</small>'+'</p>'
              }
            });   
            markers[i] = marker;
          }
      }
      //console.log(markers)
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
                    parseDatos(data,"buscador");
                }
            }							
        );
}

function buscarGasolinerasCoord(latitud,longitud,pagina){
    pagina = (typeof pagina === "undefined") ? 1 : pagina;
    $("#latitud").val(latitud);
    $("#longitud").val(longitud);
    var marker = map.addMarker({
        lat: $("#latitud").val(latitud),
        lng: $("#longitud").val(longitud),
        title: "Usted está aquí",
        icon: "https://maps.google.com/mapfiles/kml/shapes/"+'poi.png',
        infoWindow: {
          content: '<p>'+"usted está aquí"+'</p>'
        }
    });  
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

function parseDatos(data,buscador){
    if(buscador=="buscador"){
        map.setCenter(data[1].latitud,data[1].longitud);
    }
    $("#ul-resultados").html("");
    var lenAnt = $("#markers").val();
    if(lenAnt>0){
        map.removeMarkers();
    }
    
    var length = data.length,
        element = null;
        $("#markers").val(length);
    var base_url = $("#base_url").val();
    for (var i = 0; i < length; i++) {
      element = data[i];
      var distancia = data[i].distancia;
      $("#ul-resultados").append("<li>"+data[i].nombre+" <small><a href='"+base_url+"index.php/gasolinera/estacion/"+data[i].estacion+"'>(ver perfil)</a> <a href='#' class='pan-to-marker' data-marker-index='"+(i+1)+"'>Ubicar</a></small>"
          +"<br><small>"+data[i].direccion+" distancia:"+data[i].distancia.toFixed(2)+" metros<small></li>");
    }
    $(document).on('click', '.pan-to-marker', function(e) {
        e.preventDefault();

        var lat, lng;

        var $index = $(this).data('marker-index');
        var $lat = $(this).data('marker-lat');
        var $lng = $(this).data('marker-lng');

        if ($index != undefined) {
          // using indices
          var position = map.markers[$index].getPosition();
          lat = position.lat();
          lng = position.lng();
        }
        else {
          // using coordinates
          lat = $lat;
          lng = $lng;
        }

        map.setCenter(lat, lng);
      });
    cargaDatosMapa(data);
    return;
}