@extends('layouts.default')

@section('content')
<br>
<div class="container" style="margin-top:130px; margin-bottom:60px; ">
    <div class="row">
      <div class="col-md-4 col-md-offset-2">

          @if ( $user->picture != null && $user->picture != '' && $user->picture != 'null' )
               <img src="/uploads/avatars/{{ $user->picture }}" style="max-width:300px; float:left; margin-right:45px; margin-bottom:15px; text-align:center;">
          @else
               <img src="/uploads/avatars/default.png" style="max-width:280px; float:left; margin-right:10px; margin-bottom:15px; text-align:center;">
          @endif

          </div>
      <div class="col-md-4">
          <br><br><h1>{{ $user->name }}</h1>

<?php /* 
           @if ( $user->bio != null && $user->bio != '' )
              <p style="font-weight:bold; font-size:18px; color:green;">{{ $user->bio }}</p>
           @else
              <p><a href="{{ route('/') }}/user/{{ $user->id }}/edit">Descríbete brevemente</a></p>
           @endif
*/ ?>
          <form enctype="multipart/form-data" action="/profile" method="POST">
              <label>Cambiar imagen de perfil</label>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="file" name="avatar" style="color: transparent;">
              <input type="submit" class="pull-right btn btn-sm btn-primary" value="Subir imagen">
          </form>
      </div>
      </div>
      <div class="row">
          <div class="col-md-4 col-md-offset-2">
            <?php /*
            <p style="font-size:18px; ">Tipo de usuario:
            @if ( $user->is_profe == 1 )
               <strong>Profesor</strong></p>
            @else
               <strong>Alumno</strong></p>
            @endif
          */   ?>
          </div>
        </div>

  @if (Auth::user()->is_profe == 1)

        <div id="clases" class="row">
          <div class="col-md-8 col-md-offset-2">
            <br><br>
          <h1 style="display:inline-block;">Mis clases</h1>
            <a style="float:right;" href="{{ route('/') }}/post/create" class="btn btn-primary" />Crear una clase</a>
          <div class="tabs tabs-top left tab-container">

          <ul class="etabs">
            @foreach($posts as $key=>$post)
              <li class="tab"><a href="#{{ $post->type['name'] }}-{{ $key }}">{{ $post->type['name'] }}</a></li>
             @endforeach
          </ul>
         <!-- /.etabs -->

            <div class="panel-container">

              @foreach($posts as $keyy=>$post)
                  <div class="tab-block" id="{{ $post->type['name'] }}-{{ $keyy }}" style="display: block;">
                  {!! nl2br(e($post->description)) !!}<br><br>
                  <div style="width:320px; height:50px;">
                    <a style="float:left; " href="{{ route('/') }}/post/{{ $post->id }}" class="btn btn-submit" />Ver Clase</a>
                    <a style="float:left;  " href="{{ route('/') }}/post/{{ $post->id }}/edit" class="btn btn-blue" />Editar</a>

                    <form style="float:right;" action="/post/{{ $post->id }}" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="submit" name="submit" class="btn btn-orange" value="Eliminar">
                    </form>
                      </div>
                  </div>
               @endforeach

            </div>
            <!-- /.panel-container -->
                <br><br>
              </div>
          <!-- /.tabs -->

        </div>

              </div>
          </div>

  @else
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <a style="margin-left:40px;" href="{{ route('/') }}/user/{{ $user->id }}/edit" class="btn btn-primary" />¡Quiero ser profesor!</a>
  </div>
  </div>

  <br><br><br><br>

  @endif

</div>
@stop
