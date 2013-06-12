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
    var latitud = $("#latitud").val();
    var longitud = $("#longitud").val();
    if(latitud != "" && longitud != ""){
        initialize2();
    }

});


function initialize2(data){
      var latitud = $("#latitud").val();
      var longitud = $("#longitud").val();
      var estacion = $("#estacion").val();
      var idgasolinera = $("#idgasolinera").val();
      map = new GMaps({
        div: '#map-canvas',
        lat: latitud,
        lng: longitud,
        zoom: 15/*,
        dragend: function(e) {
            buscarGasolinerasCoord(e.center.jb,e.center.kb,estacion);
        }*/
      });
      
      var marker = map.addMarker({
        lat: latitud,
        lng: longitud,
        icon: $("#base_url").val()+'images/marker-star.png',
        title: "PEMEX estación "+estacion
      }); 
      
      GMaps.geolocate({
        success: function(position) {
           // alert(position.coords.latitude+", "+position.coords.longitude);
          map.setCenter(latitud, longitud);
          $("#geo-lat").val(position.coords.latitude);
          $("#geo-lng").val(position.coords.longitude);
          var marker = map.addMarker({
              lat: position.coords.latitude,
              lng: position.coords.longitude,
              title: "Usted está aquí",
              icon: "https://maps.google.com/mapfiles/kml/shapes/"+'poi.png',
              draggable:true,
              infoWindow: {
                content: '<p>'+"usted está aquí"+'</p>'
              }
            });
            google.maps.event.addListener(marker, 'dragend', function() {
                map.removePolylines();
                var position = marker.getPosition();
                var lat = position.lat();
                var lng = position.lng();
                $("#geo-lat").val(lat);
                $("#geo-lng").val(lng);
                trazaRuta();
            });
            trazaRuta();
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
function trazaRuta(){
    //if($("#ruta").val()=="true"){
        map.drawRoute({
            origin: [$("#geo-lat").val(), $("#geo-lng").val()],
            destination: [$("#latitud").val(),$("#longitud").val()],
            travelMode: 'driving',
            strokeColor: '#131540',
            strokeOpacity: 0.6,
            strokeWeight: 6
          });
          var i=0;var clase="";
         map.travelRoute({
            origin: [$("#geo-lat").val(), $("#geo-lng").val()],
            destination: [$("#latitud").val(),$("#longitud").val()],
            travelMode: 'driving',
            step: function(e) {
                if(i==0){
                    clase="non";
                    i=1;
                }else{
                    clase="par";
                    i=0;
                }
              $('#instrucciones').append('<li class="'+clase+'">'+e.instructions+'</li>');
              $('#instructions li:eq(' + e.step_number + ')').delay(450 * e.step_number);
            }
          });
    //}
}
