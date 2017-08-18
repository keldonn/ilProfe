@extends('layouts.default')

@section('content')

<div class="container" style="margin-top:130px; margin-bottom:60px; ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ofrecer una clase</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/post">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Instrumento</label>

                            <div class="col-md-6">


                              <select name="type_id" class="form-control" required autofocus>
                              @foreach($types as $type)
                                 <option value="{{ $type->id }}">{{ $type->name }}</option>
                              @endforeach
                              </select>


                                @if ($errors->has('type_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Nivel</label>

                            <div class="col-md-6">
                              <select name="level" class="form-control" required autofocus>
                                 <option value="Principiantes">Principiantes</option>
                                 <option value="Intermedio">Principiantes, Intermedios</option>
                                 <option value="Avanzado">Principiantes, Intermedios, Avanzados</option>
                              </select>

                                @if ($errors->has('level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="" cols="40" rows="10" required autofocus></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Precio</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                            <input id="free_trial" type="hidden" name="free_trial" value="1">
<br>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ofrecer mi clase
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
