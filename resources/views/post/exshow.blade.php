@extends('layouts.default')

@section('content')

@if ( app('request')->input('error') == 'unauthorized')
<p>Ups, no puedes editar ese post :)</p>
@endif

<div class="container">
  <h1>Clase de {{$user->name}}</h1>
  <hr>

  <div class="table-responsive">
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
          <tr>
            <td>{{ $post->level }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->price }}</td>
            <td></td>
          </tr>
        </tbody>
      </table>

      Promedio: {{ $post->averageRating() }}

  @foreach($post->comments as $comment)
    <table class="table">
      <strong>{{ $comment->created_at->diffForHumans() }}</strong>
    <tr>
      <td>{{ $comment->text }}</td>
      <td>{{ $comment->user_id }}</td>
      <td></td>
    </tr>
  </table>
  @endforeach


@if ($user->id != $post->user_id)
<div class="card">
  <div class="card-block">
    <form method="POST" action="/post/{{ $post->id }}/comment">
      {{ csrf_field() }}
      <input type="hidden" name="post_id" value="{{ $post->id }}">
      <input type="hidden" name="profe_id" value="{{ $post->user_id }}">

      <div class="form-group">
        <textarea name="text" placeholder="Comenta aqui" class="form-control"></textarea>
      </div>

      <div class="form-group" >
        <select name="stars">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Comentar</button>
      </div>
    </form>
  </div>
</div>
@endif

  @endsection
