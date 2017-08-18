@extends('layouts.app')

@section('content')

@if ( app('request')->input('error') == 'unauthorized')
<p>Ups, no puedes editar ese post :)</p>
@endif

<div class="container">
  <h1>Lista de Clases</h1>
  <hr>

  <div class="table-responsive">
    @if($posts)
      <table class="table">
        <thead>
          <tr>
            <td>Nivel</td>
            <td>Descripcion</td>
            <td>Precio</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $row)
          <tr>
            <td>{{ $row->level }}</td>
            <td>{{ $row->description }}</td>
            <td>{{ $row->price }}</td>
            <td></td>
          </tr>
        </tbody>
        @endforeach
      </table>
      {{ $posts->links() }}
      @endif
    </div>
  </div>

  @endsection
