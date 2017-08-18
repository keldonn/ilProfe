@extends('layouts.default')

@section('content')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtoL4098xgjVT7NS3E2vJLFzeDGxpgEf0"></script>

<script> google.maps.event.addDomListener(window, 'load', init);
var map;
function init() {
var mapOptions = {
  center: new google.maps.LatLng({{ $post->user['latitud'] }}, {{ $post->user['longitud'] }}),
  zoom: 14,
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

var mapElement = document.getElementById('map');
var map = new google.maps.Map(mapElement, mapOptions);

var locations = <?php print_r(json_encode($coor2)) ?>;

var infowindow = new google.maps.InfoWindow();

for (i = 0; i < locations.length; i++) {
   marker = new google.maps.Marker({
       position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          animation: google.maps.Animation.DROP,
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
<div class="offset"></div>

<div class="white-wrapper">
    <div class="map-wrapper">
      <div id="map" style="width:100%; height:310px;"></div>


      </div>
      <!-- /.map-wrapper -->
    </div>


<div class="light-wrapper" style="margin-top:-50px;">
   <div class="container inner">
     <div class="blog classic-view row">

       <aside class="col-sm-4 sidebar col-md-offset-1">
         <div class="sidebox widget">

           @if ( $post->user['picture'] != null && $post->user['picture'] != '' && $post->user['picture'] != 'null' )
                <img style="max-width:95%; margin-bottom:5px;" src="{{ asset('uploads/avatars') }}/{{ $post->user['picture'] }}" alt="" /><br>
           @else
                <img style="max-width:95%; margin-bottom:5px;" src="{{ asset('uploads/avatars/default.png') }}" alt="" /><br>
           @endif
           <script>
           function myFunction() {
               var x = document.getElementById('email');
               var y = document.getElementById('contactar');
               if (x.style.display === 'none') {
                   x.style.display = 'inline';
                   y.style.display = 'none';
               } else {
                   x.style.display = 'none';
                   y.style.display = 'inline';
               }
           }

           function myFunction2() {
               var x = document.getElementById('contactar');
               var y = document.getElementById('email');
               if (x.style.display === 'none') {
                   x.style.display = 'inline';
                   y.style.display = 'none';
               } else {
                   x.style.display = 'none';
                   y.style.display = 'inline';
               }
           }
            </script>

        <?php /*    <p style="text-align:center; color:black; font-size:16px;">Promedio: {{ $post->averageRating() }}</p> */  ?>



  @if (Auth::check())
         @if ($user->id != $post->user_id)
          <br><button id="contactar" style="text-align:center;" class="btn btn-blue" onclick="myFunction()"/>Contactar</button>
              <button id="email" style="text-align:center; display:none; font-family:Arial; text-transform:lowercase;" class="btn btn-green" onclick="myFunction2()"/>{{ $post->user['email'] }}</button>
         @endif
     @else
       <br><a href="{{ route('register') }}"><button id="contactar" style="text-align:center; " class="btn btn-red" />Registrate para contactarme</button></a>
    @endif

   @if (Auth::check())
    @if ($user->id == $post->user_id)
       <br><a href="{{ route('/') }}/post/{{ $post->id }}/edit"><button id="editar" style="text-align:center; " class="btn btn-blue" />Edita tu clase</button></a>
    @endif
  @endif
         <!-- /.widget -->


       </aside>
       <!-- /column .sidebar -->

       <div class="col-sm-6 blog-content">
         <div class="blog-posts text-boxes">
           <div class="post box format-image">

<?php  /*
             @if ( $user->picture != null && $user->picture != '' && $user->picture != 'null' )
                  <div class="post-content" style="text-align:center; "><img style="max-width:200px; " src="{{ asset('uploads/avatars') }}/{{ $post->user['picture'] }}" alt="" /></div>
             @else
                <div class="post-content"><img src="{{ asset('uploads/avatars/default.png') }}" alt="" /></div>
             @endif
             */
?>

             <div class="post-content">
               <h1>{{ $post->user['name'] }}</h1>
               <div style="width: 100%; height: 1px; background: #fa9a6a;"></div><div class="meta" style="margin-top:5px;"><span class="date"><a href="#" class="link-effect">{{ Carbon\Carbon::parse($post->user['created_at'])->format('d-m-Y') }}</a></span> <span class="category"><a href="{{ route('/') }}/estilos/{{ $post->type['id'] }}" class="link-effect">{{ $post->type['name'] }}</a> <span class="comments"><a href="#comments" class="link-effect"><i class="icon-chat-1"></i>  {!! ($commentscount == 0 ? 'Sin comentarios' : $commentscount) !!}</a></span></div><br>

               <!-- /.gallery-wrapper -->
               <p>{!! nl2br(e($post->description)) !!}</p><br>

               <div style="width: 100%; height: 1px; background: #fa9a6a;"></div>
                <br>

               <div style="display:block; float:left; margin-right:40px;"><h3>Precio:</h3>
               <p style="color:green; font-size:17px;">${{ $post->price }} / clase.</p></div>
                <!-- /.meta -->

               <div style="display:block; float:left;"><h3>Apto nivel:</h3>
               <p style="color:green; font-size:17px;"> {{ $post->level }}.</p> </div>
               <!-- /.meta -->

               <br> <br>
             </div>
             <!-- /.post-content -->
           </div>
           <!-- /.post .format-image -->

         </div>
         <!-- /.blog-posts -->

         <div id="comments" class="box">
           <div>
             <h3>Comentarios</h3>

             <ol id="singlecomments" class="commentlist">

               {!! ($commentscount == 0 ? 'Esta clase aun no tiene comentarios.' : '') !!}

               @foreach($post->comments as $comment)
               <li>
                   @if ( $comment->user['picture'] != null && $comment->user['picture'] != '' && $comment->user['picture'] != 'null' )
                    <div class="user"><img style="width:70px !important; height:auto;" src="{{ asset('uploads/avatars') }}/{{ $comment->user['picture'] }}" class="avatar" /></div>
                   @else
                    <div class="user"><img alt="" src="{{ asset('style/images/art/commentdefault.jpg') }}" class="avatar" /></div>
                   @endif
                   <div class="message">
                     <div class="message-inner">
                       <div class="info">
                         <h2>{{ $comment->user['name'] }}</h2>
                         <div class="meta"> <span class="date">{{ $comment->created_at->diffForHumans() }}</span> <span class="reply"><a class="link-effect" href="#comentar">Responder</a></span> </div>
                       </div>
                       <p>{{ $comment->text }}</p>
                     </div>
                   </div>
               </li>
               @endforeach

             </ol>
           </div>
           <!-- /#comments -->

         </div>
         <!-- /.box -->

        @if (Auth::check())
          @if ($user->id != $post->user_id)
              <div class="divide30"></div>
              <div class="box">
                <div id="comentar" class="comment-form-wrapper">
                  <h3>¿Quieres dejar un comentario o una pregunta?</h3>
                     <form class="comment-form" method="POST" action="/post/{{ $post->id }}/comment">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="profe_id" value="{{ $post->user_id }}">
                    <div class="name-field">
                      <label><i class="icon-user"></i></label>
                      <input type="text" name="first" title="Name*" placeholder="{{ $user->name }}" readonly>
                    </div>
                    <div class="message-field">
                      <textarea name="text" id="textarea" rows="5" cols="30" title="Enter your comment here..."></textarea>
                    </div>
                    <div class="message-field">
                      <label><i class="icon-star-1"></i></label>
                      <select name="stars" style="padding-left:60px; max-width:90px;">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                    <input type="submit" value="Enviar" name="submit" class="btn btn-submit" />
                  </form>
                </div>
                <!-- /.comment-form-wrapper -->

              </div>
              <!-- /.box -->

           @endif
         @endif

       </div>
       <!-- /.blog-content -->

     </div>
     <!-- /.blog -->
   </div>
   <!--/.container -->

 </div>
 <!-- /.light-wrapper -->

  @stop
