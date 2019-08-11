@extends('layouts.app')

@section('body class', 'footer-fixed')

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
    #locate-position{
  position:absolute;
  top:140px;
  left:10px;
  border:2px solid hsla(0, 3%, 27%, 0.58);
  outline:0;
  z-index: 1000;
  background-color: #fff;
  border-radius: 4px;
}
  </style>
@endsection

@section('navbar')
    <ul class="nav navbar-nav ml-auto"> {{-- no borra: d-md-down-none--}}
        <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('admin home') }}">Administrador</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('company home') }}">Compañia</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('user home') }}">Usuarios</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="main">
        <div id="mapid"></div>

        <button id="locate-position" style="display: none"><i class="eye fas fa-globe-americas fa-lg"></i></button>
    </div>
@endsection
@section('js_mapa')
<!-- Mapa -->
    <script src="{{ asset('js/leaflet.contextmenu.js') }}"></script>
    <script> var base_url = "{{asset('img')}}"; </script> <!-- variable para iconos del mapa juan* -->
    <script src="{{asset('js/leaflet-number-icon.js')}}"></script>
    <script src="{{asset('js/landing/mapa.js') }}"></script>

@endsection
