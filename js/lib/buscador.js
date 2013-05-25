$(document).ready(function() {
    readyEstado();
    $("#buscar").click(function(n){
        $.ajax(
            {
                url: $("#base_url").val()+"index.php/gasolineras/buscarGasolineras",
                type: "post",
                dataType: "json",
                data:{
                    ciudad:$("#ciudad").val(),
                    estado:$("#estado").val(),
                    colonia:$("#colonia").val(),
                    texto:$("#buscador-texto").val()
                },
                success: function( data ){
                    $("#ul-resultados").html("");
                    var length = data.length,
                        element = null;
                    var base_url = $("#base_url").val();
                    for (var i = 0; i < length; i++) {
                      element = data[i];
                      var out = '';
                        for (var x in data[i]) {
                            out += x + ": " + data[i][x] + "\n";
                        }
                        console.log(out);
//                        alert(out);
                      $("#ul-resultados").append("<li>"+data[i].nombre+" <small><a href='"+base_url+"index.php/gasolinera/estacion/"+data[i].estacion+"'>(ver perfil)</a></small>"
                          +"<br><small>"+data[i].direccion+"<small></li>");
                      // Do something with element i.
                        initialize(data);

                    }
                }
            }							
        );
    });
    initialize();

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


	
	
      google.maps.visualRefresh = true;

var map;
function initialize(data) {
  var myLatlng = new google.maps.LatLng(19.423859,-99.098053);
  var mapOptions = {
    zoom: 6,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var length = data.length,
    element = null;
    var base_url = $("#base_url").val();

   for (var i = 0; i < length; i++) {
        element = data[i];
        var out = '';
          for (var x in data[i]) {
              out += x + ": " + data[i][x] + "\n";
          }
    //      console.log(out);
    //                        alert(out);
        
        
        var southWest = new google.maps.LatLng(-31.203405,125.244141);
        var northEast = new google.maps.LatLng(-25.363882,131.044922);
        var bounds = new google.maps.LatLngBounds(southWest,northEast);
        map.fitBounds(bounds);
        var lngSpan = northEast.lng() - southWest.lng();
        var latSpan = northEast.lat() - southWest.lat();
        for (var i = 0; i < 5; i++) {
          var location = new google.maps.LatLng(southWest.lat() + latSpan * Math.random(),
              southWest.lng() + lngSpan * Math.random());
          var marker = new google.maps.Marker({
              position: location,
              map: map
          });
          var j = i + 1;
          marker.setTitle(j.toString());
          attachSecretMessage(marker, i);
        }
        
        
        
        
        
        $("#ul-resultados").append("<li>"+data[i].nombre+" <small><a href='"+base_url+"index.php/gasolinera/estacion/"+data[i].estacion+"'>(ver perfil)</a></small>"
            +"<br><small>"+data[i].direccion+"<small></li>");
        // Do something with element i.
          initialize(data);

      }

  // Add 5 markers to the map at random locations.
  /*
  var southWest = new google.maps.LatLng(-31.203405,125.244141);
  var northEast = new google.maps.LatLng(-25.363882,131.044922);
  var bounds = new google.maps.LatLngBounds(southWest,northEast);
  map.fitBounds(bounds);
  var lngSpan = northEast.lng() - southWest.lng();
  var latSpan = northEast.lat() - southWest.lat();
  for (var i = 0; i < 5; i++) {
    var location = new google.maps.LatLng(southWest.lat() + latSpan * Math.random(),
        southWest.lng() + lngSpan * Math.random());
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    var j = i + 1;
    marker.setTitle(j.toString());
    attachSecretMessage(marker, i);
  }*/
}

// The five markers show a secret message when clicked
// but that message is not within the marker's instance data.
function attachSecretMessage(marker, number) {
  var message = ["This","is","the","secret","message","This","is","the","secret","message"];
  var infowindow = new google.maps.InfoWindow(
      { content: message[number],
        size: new google.maps.Size(50,50)
      });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}


//google.maps.event.addDomListener(window, 'load', initialize);
