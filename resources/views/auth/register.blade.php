@extends('layouts.default')

@section('content')
<script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
<div class="container" style="margin-top:130px; margin-bottom:60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         <label for="password" class="col-md-4 control-label">Contraseña</label>

                         <div class="col-md-6">
                             <input id="password" type="password" class="form-control" name="password" required>

                             @if ($errors->has('password'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="password-confirm" class="col-md-4 control-label">Confirma tu Contraseña</label>

                         <div class="col-md-6">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                         </div>
                     </div>

                     <div class="form-group{{ $errors->has('is_profe') ? ' has-error' : '' }}">
                         <label for="is_profe" class="col-md-4 control-label">Quiero ser</label>
                    <div class="col-md-6 radio">
                        <label>
                          <input type="radio" name="is_profe" value="0" checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Alumno </span>
                        </label>
                        <label>
                          <input type="radio" name="is_profe" value="1" style="margin-left:1px;"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span style="margin-left:19px;"> Profesor </span>
                        </label>
                        @if ($errors->has('is_profe'))
                            <span class="help-block">
                                <strong>{{ $errors->first('is_profe') }}</strong>
                            </span>
                        @endif
                      </div>
                        </div>

                          <br>

                        <label for="location" class="col-md-4 control-label">Buscá y dale click a tu zona</label>

                        <div class="col-md-6">

                            {!!$map['html']!!} <br><br>

                        </div>

                        <div class="form-group{{ $errors->has('latitud') ? ' has-error' : '' }}">
                        <label for="latitud" class="col-md-4 control-label">Coordenadas seleccionadas</label>

                          <div class="col-md-6">

                                <input id="latitud" type="text" class="form-control" name="latitud" value="{{ old('latitud') }}" readonly>
                                <input id="longitud" type="text" class="form-control" name="longitud" value="{{ old('longitud') }}" readonly>

                                @if ($errors->has('latitud'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitud') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
            </div>
        </div>
</div>
@endsection
