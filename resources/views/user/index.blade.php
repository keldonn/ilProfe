@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Lista de Usuarios</h1>
  <h4><a href="{{ route('register') }}">Registrar nuevo usuario</a></h4>
  <hr>

  <div class="table-responsive">
    @if($data)
      <table class="table">
        <thead>
          <tr>
            <td>Nombres</td>
            <td>Email</td>
            <td>Creado</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
          <tr>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->created_at }}</td>
            <td></td>
          </tr>
        </tbody>
        @endforeach
      </table>
      @endif
    </div>
  </div>

  @endsection
