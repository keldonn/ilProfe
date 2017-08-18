<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ asset('style/images/favicon.png') }}">

<title>ilProfe.com</title>
<!-- Bootstrap core CSS -->
<link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('style/css/plugins.css') }}" rel="stylesheet">
<link href="{{ asset('style.css') }}" rel="stylesheet">
<link href="{{ asset('style/css/color/green.css') }}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href="{{ asset('style/type/icons.css') }}" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<div id="preloader"><div id="status"><div class="spinner"></div></div></div>


<div class="body-wrapper">

<?php /* <nav class="navbar navbar-default default" {!! (Request::is('/') || Request::is('estilos/*')) ? '' : 'style="background:#2c2c2c url(../../style/images/art/inverse-bg.jpg) repeat;"' !!}>
 */ ?>

  <nav class="navbar navbar-default default" {!! (Request::is('/')) ? '' : 'style="background:#2c2c2c url(../../style/images/art/inverse-bg.jpg) repeat;"' !!}>
    <div class="container">
      <div class="navbar-header">
        <div class="basic-wrapper"> <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
          <div class="navbar-brand"> <a href="{{ route('/') }}">ilProfe</a>
          </div>
          <!-- /.navbar-brand -->
        </div>
        <!-- /.basic-wrapper -->
      </div>
      <!-- /.navbar-header -->
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="current dropdown"><a href="{{ route('/home') }}" class="dropdown-toggle">Mapa</a></li>
          <li><a href="{{ route('/') }}/home#estilos" class="dropdown-toggle">Estilos </a></li>
          <li><a href="{{ route('contacto') }}" class="dropdown-toggle">Contacto </a></li>
        <!-- Authentication Links -->
          @if (Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Registrate</a></li>
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Mi cuenta <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">

                    @if (Auth::user()->is_profe == 1)
                    <li>
                        <a href="{{ route('/') }}/profile#clases">
                            Mis clases
                        </a>
                    </li>
                    @endif

                      <li>
                          <a href="{{ route('/') }}/profile">
                              Mi perfil
                          </a>
                      </li>


                      <li>
                          <a href="/user/{{ Auth::user()->id }}/edit">
                              Editar
                          </a>
                      </li>

                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>


                  </ul>
              </li>
          @endif

        </ul>
        <!-- /.navbar-nav -->
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>
  <!-- /.navbar -->


    @yield('content')

    @extends('layouts.footer')
