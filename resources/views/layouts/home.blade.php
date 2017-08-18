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

    // Try HTML5 geolocation.
  /*   if (navigator.geolocation) {
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
       icon: (locations[i][3]),
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

<?php /*
    <div class="tp-fullscreen-container revolution" style="display:none">
      <div class="tp-fullscreen">
        <ul>
          <li data-transition="fade"> <img src="style/images/art/slider-bg1.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
            <div class="tp-caption large sfb text-center" data-x="center" data-y="263" data-speed="900" data-start="800" data-easing="Sine.easeOut">Elige tu profesor de música</div>
            <div class="tp-caption medium sfb text-center" data-x="center" data-y="348" data-speed="900" data-start="1500" data-easing="Sine.easeOut">y aprende a tocar ese intrumento con el que siempre soñaste</div>
            <div class="tp-caption sfb" data-x="center" data-y="420" data-speed="900" data-start="2200" data-easing="Sine.easeOut"  data-endspeed="100"><a href="#" class="btn btn-large btn-border">Ver Categorías</a></div>
          </li>
          <li data-transition="fade"> <img src="style/images/art/slider-bg2.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
            <div class="tp-caption large sfl text-center" data-x="center" data-y="263" data-speed="900" data-start="800" data-easing="Sine.easeOut">Encuentra una nueva pasión</div>
            <div class="tp-caption medium sfr text-center" data-x="center" data-y="343" data-speed="900" data-start="1500" data-easing="Sine.easeOut">Te ofrecemos la primer clase gratis, ¡probá sin miedo!</div>
            <div class="tp-caption sfb" data-x="center" data-y="420" data-speed="900" data-start="2200" data-easing="Sine.easeOut"  data-endspeed="100"><a href="#" class="btn btn-large">Empieza ya</a></div>
          </li>
          <li data-transition="fade"> <img src="style/images/art/slider-bg3.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
            <div class="tp-caption large sfr" data-x="30" data-y="263" data-speed="900" data-start="800" data-easing="Sine.easeOut">Sistema de calificaciones</div>
            <div class="tp-caption medium sfr" data-x="30" data-y="343" data-speed="900" data-start="1500" data-easing="Sine.easeOut">Para elegir a il profe ideal.</div>
            <div class="tp-caption sfr" data-x="30" data-y="430" data-speed="900" data-start="2200" data-easing="Sine.easeOut"  data-endspeed="100"><a href="#" class="btn btn-large">Comenzar</a></div>
          </li>
        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
      </div>
      <!-- /.tp-fullscreen-container -->
    </div>
    <!-- /.revolution -->
  */ ?>
    <div class="white-wrapper">
        <div class="map-wrapper">
          <div id="map" style="width:100%; height:520px;"></div>


          </div>
          <!-- /.map-wrapper -->
        </div>


      <div id="estilos" class="container inner">
        <div class="headline text-center">
          <h2>Elige un estilo</h2>
          <p class="lead animated-text letters type"> <span>Con ilProfe podrás </span> <span class="animated-text-wrapper waiting"> <b class="is-visible">encontrar un profesor</b> <b>darle ritmo a tu vida</b> </span> </p>
        </div>
        </div>

    <!-- /.light-wrapper -->


    <div class="light-wrapper" style="margin-top:-30px;">

        <div class="cbp-panel">
          <div id="grid-container" class="cbp">

            @foreach($types as $type)
            <div class="cbp-item print motion"> <a href="/estilos/{{ $type->id }}" class="cbp-caption">
              <div class="cbp-caption-defaultWrap"> <img style="max-height:252px;" src="style/images/estilos/{{ $type->name }}.jpg" alt="" /> </div>
              <div class="cbp-caption-activeWrap">
                <div class="cbp-l-caption-alignCenter">
                  <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-title" style="font-size:30px;">{{ $type->name }}</div>
                  </div>
                </div>
              </div>
              </a> </div>
            <!--/.cbp-item -->
             @endforeach

          </div>
          <!--/.cbp -->
          <div class="divide30"></div>

          <!--/.text-center -->
        </div>
        <!--/.cbp-panel --><br>
    </div>
    <!-- /.light-wrapper -->


<?php /*
    <div class="light-wrapper">
      <div class="container inner">
        <div class="headline text-center">
          <h2>Ultimas clases agregadas</h2><br><br>
          </div>
        <div class="row grid-view">


            @foreach($posts as $post)
            <div class="col-sm-3 text-center">
              <figure><a href="/profesor/{{ $post->user['id'] }}"><img style="max-width:180px;" src="uploads/avatars/{{ $post->user['picture'] }}" alt="" /></a></figure>
              <h4 class="post-title">{{ $post->user['name'] }}</h4>
              <div class="meta">{{ $post->level }}</div>
              <p>{{ str_limit($post->description, 70) }}</p>
            </div>
             @endforeach

          <!-- /column -->

        </div>
        <!--/.row -->
      </div>
      <!--/.container -->
    </div>
    <!-- /.light-wrapper -->
*/ ?>

 <div class="light-wrapper" style="margin-bottom:-25px;margin-top:-45px;">
    <div class="container inner">
      <div class="row text-center facts">
        <div class="col-sm-3">
          <div class="icon-large"> <i class="budicon-pin"></i> </div>
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
          <div class="icon-large"> <i class="budicon-comment-2"></i> </div>
          <h2>{{ $cantidadreviews }}</h2>
          <p>Comentarios</p>
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
  </div>


    <!-- /footer -->
    <div id="share-bar" style="display:none"></div>

@stop
