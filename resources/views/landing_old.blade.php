@extends('layouts.app')

@section('body class', 'sidebar-fixed  breadcrumb-fixed')

@section('css_js_mapa')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css"/>
  <link rel="stylesheet" type="text/css" href="{{asset('css/mapa_landing.css')}}">
  <!-- Leaflet Routing -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <link rel="stylesheet" href="{{asset('css/leaflet.contextmenu.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/leaflet-number-icon.css')}}" />

  <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <link rel="stylesheet" href="{{asset('fontawesome-free-5.7.1-web/css/all.css')}}" >
  <link href="{{asset('fontawesome-free-5.7.1-web/js/all.js')}}" >
  <style type="text/css">
    @media (max-width: 750px){ 

      .res{
        display: none!important;
      }

      .sh{
        display: block!important;
      }
    }
  </style>
@endsection

@section('navbar')
    {{-- controles para el sidebar --}}
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto sh" style="display: none;" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" style="display: none;" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto res">
      <li class="nav-item px-3">
        <a class="nav-link" href="{{route("login")}}">Iniciar sesión</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="{{route("registro")}}">Registrarse</a>
      </li>
      <li class="nav-item px-3">
      </li>
    </ul>
@endsection



@section('body')
    <!-- side bar left -->
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav"> 
                <li class="nav-title">Bienvenido</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("login")}}">
                        <i class="nav-icon icon-login"></i>Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("registro")}}">
                        <i class="nav-icon icon-people"></i>Registrarse</a>
                </li>
            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <!-- ./side bar left -->

    <main class="main" style="padding: 0px">
      <div style="background-image: url('{{ asset('img/banners/'.$banner) }}'); height: 60px"></div>
      <div>
        <table>
            <tr>
                <td >
                    <form method="get">
                        <input type="text" id="search" value="{{ isset($search) ? $search : ''}}" autofocus="" name="search" placeholder="Filtrar..." style="width: auto;">
                        <input type="submit" style="display: none" />
                    </form>
                </td> 
            </tr>
        </table>

      </div>
      <div>
        <div id="mapid">
          <button id="locate-position" class="colordefault" style="display: none"><i class="eye fas fa-globe-americas fa-lg"></i></button>
        </div>
      </div>
       
        <!-- contenedores centrales -->
    </main>
        <!-- ./main -->
@endsection

@section('js_mapa')
<!-- Mapa -->
    <script src="{{ asset('js/leaflet.contextmenu.js') }}"></script>
    <script> var base_url = "{{asset('img')}}"; </script> <!-- variable para iconos del mapa juan* -->
    <script src="{{asset('js/leaflet-number-icon.js')}}"></script>
    <script src="{{asset('js/landing/mapa.js') }}"></script>

@endsection




