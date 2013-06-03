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
      var reportes = 0;
      for (var i = 0; i < length; i++) {
//          alert(data[i].latitud+" - "+data[i].longitud);
            reportes = data[i].reportes.length;
            console.log(data[i].reportes);
          if(data[i].latitud != null && data[i].longitud != null && data[i].idgasolinera!= undefined){
              var color = "";
              if(data[i].promedio==1.00){
                  color = "star";
              } else if(data[i].promedio<1.00 && data[i].promedio>=0.85){
                  color = "green";
              } else if (data[i].promedio<0.85 && data[i].promedio>=0.65){
                  color = "yellow";
              } else if (data[i].promedio<0.65 && data[i].promedio>=0.01){
                  color = "red";
              } else {
                  if(reportes>0){
                      if(data[i].reportes[0].semaforo==3){
                          color = "red";
                      }else if(data[i].reportes[0].semaforo==2){
                          color = "yellow";
                      }else if(data[i].reportes[0].semaforo==1){
                          color = "green";
                      }
                  }else{
                      color = "gray";
                  }
              }
            var marker = map.addMarker({
                
              lat: data[i].latitud,
              lng: data[i].longitud,
              title: data[i].estacion,
              icon: $("#base_url").val()+'images/marker-'+color+'.png',
              infoWindow: {
                content: '<!--<div id="infowindow_'+data[i].idgasolinera+'"></div><p>'+data[i].nombre+'<br>'+
                    '<small>'+data[i].direccion+'</small>'+'</p>-->'+'<div class="div_calificar">'+
'                        <table border="1" class="calificar">'+
'                            <tr>'+
'                                <td><button id="votoMas" class="botonMas">+</button></td>'+
'                                <td rowspan="2"><span id="promedio"><?=$promedio?></span>%<br>'+
'                                                <span id="votos"><?=$votos?></span> votos'+
'                                </td>'+
'                            </tr>'+
'                            <tr>'+
'                                <td><button id="votoMenos" class="botonMenos">-</button></td>'+
'                            </tr>'+
'                        </table>'+
'                    </div>'

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
    $("#position").val("true");
//    console.log($("#latitud").val(latitud));
//    console.log($("#longitud").val(longitud));
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
        map.setCenter(data[0].latitud,data[0].longitud);
    }
    $("#ul-resultados").html("");
    var lenAnt = $("#markers").val();
    if(lenAnt>0){
        map.removeMarkers();
        $("#position").val("false");
    }
    if($("#latitud").val()!=0 && $("#longitud").val()!=0){
        var marker = map.addMarker({
            lat: $("#latitud").val(),
            lng: $("#longitud").val(),
            title: "Usted está aquí",
            icon: "https://maps.google.com/mapfiles/kml/shapes/"+'poi.png',
            infoWindow: {
              content: '<p>'+"usted está aquí"+'</p>'
            }
        });  
        $("#position").val("true");
    }
    var length = data.length,
        element = null;
        $("#markers").val(length);
    var base_url = $("#base_url").val();
    //original, 1era vez, con geoloc, i = i+2
    //después del drag i = i+1
    //sin geoloc, buscar i=0
    //desupés del drag i = i+1;
    var j;
    if($("#position").val()=="false"){
        j=0;
    /*    var pos = map.markers[0];
        if(pos === undefined){ //por alguna razón cuando hay geoloc, el primer marker a veces es 1 y a veces es 2
            j=1;
        }*/
    }else{
        j=1;
        if(map.markers[1] === undefined){
            console.log("und");
        }else{
            if(data[0].nombre != map.markers[1].getPosition()){ //por alguna razón cuando hay geoloc, el primer marker a veces es 1 y a veces es 2
                j=2;
            }
        }
    }
    for (var i = 0; i < length; i++) {
      var promedio = data[i].promedio * 100;
      var reportes_len = data[i].reportes.length;
      $("#ul-resultados").append("<li>"+data[i].nombre+" <small>"+promedio+"% <a href='"+base_url+"index.php/gasolinera/estacion/"+data[i].estacion+"'>(ver perfil)</a> <a href='#map-canvas' class='pan-to-marker' data-marker-index='"+(i+j)+"'>Ubicar</a></small>"
          +"<br><small>Profeco: "+reportes_len+" distancia:"+data[i].distancia.toFixed(2)+" metros<small></li>");
    }
    $(document).on('mouseover', '.pan-to-marker', function(e) {
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