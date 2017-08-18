<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ilprofe</title>
  </head>
  <body>

<?php


 ?>

  <h2>Instrumentos<h2>

  <ul>

  @foreach ($instrumentos as $tipo)
    <li>{{ $tipo->name }}</li>
  @endforeach
  </ul>


  </body>
</html>
