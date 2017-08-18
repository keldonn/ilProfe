@extends('layouts.default')

@section('content')
{!!$map['js']!!}
<?php /*  <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAJ4tGi7cCyC1RXkAlG4t4sUL9R0MbTkqk"></script> */ ?>
<div class="container" style="margin-top:130px; margin-bottom:60px; ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edita tu perfil</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/user/{{ $user->id }}">
                        <input name="_method" type="hidden" value="PUT">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         <label for="password" class="col-md-4 control-label">Constraseña</label>

                         <div class="col-md-6">
                             <input id="password" type="password" class="form-control" name="password">

                             @if ($errors->has('password'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="password-confirm" class="col-md-4 control-label">Confirma tu Constraseña</label>

                         <div class="col-md-6">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                         </div>
                     </div>


                     <div class="form-group{{ $errors->has('is_profe') ? ' has-error' : '' }}">
                         <label for="is_profe" class="col-md-4 control-label">Quiero ser</label>
                    <div class="col-md-6">
                      <div class="radio">
                        <label>
                          <input id="is_profe" type="radio" name="is_profe" value="0" {!! ($user->is_profe == 0) ? 'checked': '' !!}>
                          <i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Alumno </span>
                        </label>
                        <label>
                          <input id="is_profe" type="radio" name="is_profe" value="1" style="margin-left:1px;" {!! ($user->is_profe == 1) ? 'checked': '' !!}>
                          <i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span style="margin-left:19px;"> Profesor </span>
                        </label>
                        @if ($errors->has('is_profe'))
                            <span class="help-block">
                                <strong>{{ $errors->first('is_profe') }}</strong>
                            </span>
                        @endif
                      </div>
                        </div>

                      <br><br>


                            <label for="location" class="col-md-4 control-label">Buscá y dale click a tu zona</label>

                            <div class="col-md-6">

                                {!!$map['html']!!} <br><br>

                            </div>

                            <div class="form-group{{ $errors->has('latitud') ? ' has-error' : '' }}">
                            <label for="latitud" class="col-md-4 control-label">Coordenadas seleccionadas</label>

                            <div class="col-md-6">

                              <input id="latitud" type="text" class="form-control" name="latitud" value="{{ $user->latitud }}" readonly>
                              <input id="longitud" type="text" class="form-control" name="longitud" value="{{ $user->longitud }}" readonly>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitud') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Actualizar
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
