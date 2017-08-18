@extends('layouts.default')

@section('content')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtoL4098xgjVT7NS3E2vJLFzeDGxpgEf0"></script>

<script> google.maps.event.addDomListener(window, 'load', init);
var map;
function init() {
var mapOptions = {
   center: new google.maps.LatLng(-34.57525578, -58.40513992),
   zoom: 12,
   zoomControl: true,
   zoomControlOptions: {
       style: google.maps.ZoomControlStyle.DEFAULT,
   },
   disableDoubleClickZoom: false,
   mapTypeControl: true,
   mapTypeControlOptions: {
       style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
   },
   scaleControl: true,
   streetViewControl: true,
   draggable : true,
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

new google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
  return function() {
    infowindow.setContent(locations[i][0]);
    infowindow.open(map, marker);
  }
})(marker, i));
}
}
</script>

<div class="white-wrapper">
    <div class="map-wrapper">
      <div id="map" style="width:100%; height:450px;"></div>


      </div>
      <!-- /.map-wrapper -->
    </div>


<?php  /* <div class="post-parallax parallax inverse-wrapper parallax3" style="background-image: url({{ asset('style/images/art') }}/{{ $type->name }}.jpg);">
  <div class="container inner text-center">
    <h2>{{ $type->name }}</h2>
    <p class="lead">Aprende {{ $type->name }} con ilProfe.com</p>
  </div>
</div>
*/ ?>

<?php  /*   <div class="light-wrapper" style="margin-bottom:-100px;">
    <div class="container inner">
      <div class="row text-center facts">
        <div class="col-sm-3">
          <div class="icon-large"> <i class="budicon-headphones"></i> </div>
          <h2>{{ $cantidadposts }}</h2>
          <p>Profesores</p>
        </div>
        <!--/column -->
        <div class="col-sm-3">
          <div class="icon-large"> <i class="budicon-authors"></i> </div>
          <h2>{{ $cantidadalumnos }}</h2>
          <p>Alumnos</p>
        </div>
        <!--/column -->
        <div class="col-sm-3">
          <div class="icon-large"> <i class="budicon-pencil-4"></i> </div>
          <h2>{{ $cantidadreviews }}</h2>
          <p>Calificaciones</p>
        </div>
        <!--/column -->
        <div class="col-sm-3">
          <div class="icon-large"> <i class="budicon-note-1"></i> </div>
          <h2>{{ $cantidadestilos }}</h2>
          <p>Estilos Musicales</p>
        </div>
        <!--/column -->
      </div>
      <!--/.row -->
    </div>
  </div> */?>

  <div class="light-wrapper">
    <div class="container inner" style="margin-top:-20px;">
      <div class="headline text-center">
        <h1>Profesores de {{ $type->name }}</h1><br><br>
      </div>
      <div class="cbp-panel">

        <div id="grid-container" class="cbp">

          @foreach($posts as $post)
          <div class="cbp-item print"> <a class="cbp-caption fancybox-media" data-rel="portfolio" href="{{ route('/') }}/post/{{ $post->id }}">
            @if ( $post->user['picture'] != null && $post->user['picture'] != '' && $post->user['picture'] != 'null' )
                <div class="cbp-caption-defaultWrap"><div style="width:100%; height:235px;"><img src="{{ asset('uploads/avatars') }}/{{ $post->user['picture'] }}" alt="" /></div></div>
            @else
                 <div class="cbp-caption-defaultWrap"><div style="width:100%; height:235px;"><img src="{{ asset('uploads/avatars') }}/default.png" alt="" /></div></div>
            @endif
            <div class="cbp-caption-activeWrap">
              <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                  <div class="cbp-l-caption-title">Ver perfil</div>
                </div>
              </div>
            </div>
            <!--/.cbp-caption-activeWrap -->
            </a>
            <div class="box text-center">
              <h3 class="post-title" style="font-size:20px;"><a href="{{ route('/') }}/post/{{ $post->id }}">{{ $post->user['name'] }}</a></h3>
              <span class="meta category"><a class="">{{ $post->level }}</a></span> </div>
            <!--/.box -->
          </div>
          <!--/.cbp-item -->
           @endforeach

        </div>

        <!--/.cbp -->

        <div class="divide30"></div>

        <div class="text-center divide30">
        {{ $posts->links() }}
        </div>
      </div>
      <!--/.cbp-panel -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.light-wrapper -->

  @stop
