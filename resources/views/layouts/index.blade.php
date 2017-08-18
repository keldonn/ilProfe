@extends('layouts.default')

@section('content')
    <div class="tp-fullscreen-container revolution">
      <div class="tp-fullscreen">
        <ul>
          <li data-transition="fade"> <img src="style/images/art/slider-bg1.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
            <div class="tp-caption large sfb text-center" data-x="center" data-y="263" data-speed="900" data-start="800" data-easing="Sine.easeOut">Elige tu profesor de música</div>
            <div class="tp-caption medium sfb text-center" data-x="center" data-y="348" data-speed="900" data-start="1500" data-easing="Sine.easeOut">y aprende a tocar ese intrumento con el que siempre soñaste</div>
            <div class="tp-caption sfb" data-x="center" data-y="420" data-speed="900" data-start="2200" data-easing="Sine.easeOut"  data-endspeed="100"><a href="{{ route('/') }}/home" class="btn btn-large btn-border">Comenzar</a></div>
          </li>
          <li data-transition="fade"> <img src="style/images/art/slider-bg2.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
            <div class="tp-caption large sfl text-center" data-x="center" data-y="263" data-speed="900" data-start="800" data-easing="Sine.easeOut">Encuentra una nueva pasión</div>
            <div class="tp-caption medium sfr text-center" data-x="center" data-y="343" data-speed="900" data-start="1500" data-easing="Sine.easeOut">Te ofrecemos la primer clase gratis, ¡probá sin miedo!</div>
            <div class="tp-caption sfb" data-x="center" data-y="420" data-speed="900" data-start="2200" data-easing="Sine.easeOut"  data-endspeed="100"><a href="{{ route('/') }}/home" class="btn btn-large">Empieza ya</a></div>
          </li>
          <li data-transition="fade"> <img src="style/images/art/slider-bg3.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
            <div class="tp-caption large sfr" data-x="30" data-y="263" data-speed="900" data-start="800" data-easing="Sine.easeOut">Sistema de localización</div>
            <div class="tp-caption medium sfr" data-x="30" data-y="343" data-speed="900" data-start="1500" data-easing="Sine.easeOut">Para buscar profesores directamente en tu zona.</div>
            <div class="tp-caption sfr" data-x="30" data-y="430" data-speed="900" data-start="2200" data-easing="Sine.easeOut"  data-endspeed="100"><a href="{{ route('/') }}/home" class="btn btn-large">Comenzar</a></div>
          </li>
        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
      </div>
      <!-- /.tp-fullscreen-container -->
    </div>
    <!-- /.revolution -->


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

    <!-- /footer -->
    <div id="share-bar" style="display:none"></div>

@stop
