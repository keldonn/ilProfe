@extends('layouts.default')

@section('content')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtoL4098xgjVT7NS3E2vJLFzeDGxpgEf0"></script>

<script> google.maps.event.addDomListener(window, 'load', init);
var map;
function init() {
var mapOptions = {
  center: new google.maps.LatLng(-34.5487185661056, -58.44375193119049),
  zoom: 16,
   zoomControl: false,
   zoomControlOptions: {
       style: google.maps.ZoomControlStyle.DEFAULT,
   },
   disableDoubleClickZoom: false,
   mapTypeControl: true,
   mapTypeControlOptions: {
       style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
   },
   scaleControl: false,
   streetViewControl: false,
   draggable : false,
   overviewMapControl: false,
   mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [{stylers:[{saturation:-100},{gamma:1}]},{elementType:"labels.text.stroke",stylers:[{visibility:"off"}]},{featureType:"poi.business",elementType:"labels.text",stylers:[{visibility:"off"}]},{featureType:"poi.business",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"poi.place_of_worship",elementType:"labels.text",stylers:[{visibility:"off"}]},{featureType:"poi.place_of_worship",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"geometry",stylers:[{visibility:"simplified"}]},{featureType:"water",stylers:[{visibility:"on"},{saturation:50},{gamma:0},{hue:"#50a5d1"}]},{featureType:"administrative.neighborhood",elementType:"labels.text.fill",stylers:[{color:"#333333"}]},{featureType:"road.local",elementType:"labels.text",stylers:[{weight:0.5},{color:"#333333"}]},{featureType:"transit.station",elementType:"labels.icon",stylers:[{gamma:1},{saturation:50}]}]
    }
/*
    // Try HTML5 geolocation.
     if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(function(position) {
         var pos = {
           lat: position.coords.latitude,
           lng: position.coords.longitude
         };

         map.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
       }, function() {
         handleLocationError(true, infoWindow, map.getCenter());
       });
     } else {
       // Browser doesn't support Geolocation
       handleLocationError(false, infoWindow, map.getCenter());
     }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
     infoWindow.setPosition(pos);
     infoWindow.setContent(browserHasGeolocation ?
                           'Error: The Geolocation service failed.' :
                           'Error: Your browser doesn\'t support geolocation.');
    }
*/
var mapElement = document.getElementById('map');
var map = new google.maps.Map(mapElement, mapOptions);

var locations = <?php print_r(json_encode($coor2)) ?>;

var infowindow = new google.maps.InfoWindow();

for (i = 0; i < locations.length; i++) {
   marker = new google.maps.Marker({
       icon: '{{ $icono }}',
       position: new google.maps.LatLng(locations[i][1], locations[i][2]),
       map: map
   });

new google.maps.event.addListener(marker, 'click', (function(marker, i) {
  return function() {
    infowindow.setContent(locations[i][0]);
    infowindow.open(map, marker);
  }
})(marker, i));
}
}
</script>

  <div class="offset"></div>

  <div class="white-wrapper">
      <div class="map-wrapper">

        <div id="map" style="width:100%; height:300px;"></div>
        <div class="text">
          <div class="inner-col">
            <div class="section-title">
              <h3>Contactanos</h3>
            </div>
            <!-- /.section-title -->
            <p>Nos encantaría recibir tus comentarios y sugerencias. No dudes en escribirnos, te responderemos a la brevedad.</p>
            <div class="contact-info"> <i class="icon-location"></i> Monroe 860. Ciudad de Buenos Aires.<br>
              <i class="icon-phone"></i>+54 9 (221) 409 24 17 <br>
              <i class="icon-mail"></i> <a href="mailto:enlinea@gmail.com">enlinea@gmail.com</a> </div>
            <!-- /.contact-info -->
          </div>
          <!-- /.text -->

        </div>
        <!-- /.map-wrapper -->
      </div>

  <div class="light-wrapper" style="margin-top:-20px;">
    <div class="container inner" style="margin-bottom:-35px;">
      <div class="thin">
        <h2 style="color:#45be84">¿Qué es ilProfe?</h2>
        <div class="divide10"></div>
        <p style="color:#000">Este proyecto es un trabajo integrador realizado tras la finalización del curso de Desarrollo Web Full Stack de Digital House.</p>
        <p style="color:#000">Agradecemos la colaboración y dedicación de los especialistas y docentes que nos acompañaron a lo largo de toda la cursada.</p>
        <br><p style="float:right;font-size:16px; font-weight:bold;color:green;">
          if (aprobado) {
            echo '¡Hasta pronto!';
          } else {
            echo 'Colearning...';
      }</p>
      </div>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.light-wrapper -->

@stop
