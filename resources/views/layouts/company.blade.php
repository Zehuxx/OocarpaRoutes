@extends('layouts.users')

@section('css_js_mapa')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css"/>
  <link rel="stylesheet" type="text/css" href="{{asset('css/mapa_company.css')}}">
  <!-- Leaflet Routing -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <link rel="stylesheet" href="{{asset('css/leaflet.contextmenu.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/leaflet-number-icon.css')}}" />
  
  <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <link rel="stylesheet" href="{{asset('fontawesome-free-5.7.1-web/css/all.css')}}" >
  <link href="{{asset('fontawesome-free-5.7.1-web/js/all.js')}}" >
@endsection

@section('sidebar elements')
    <li class="nav-title">Bienvenido</li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('company home')}}">
            <i class="nav-icon fa fa-info-circle"></i> Información</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('company location')}}">
            <i class="nav-icon fa fa-map-marker"></i> Ubicación</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('company plan')}}">
            <i class="nav-icon fa fa-money"></i> Plan</a>
    </li>
    <!--<li class="nav-item">
        <a class="nav-link" href="#">
            <i class="nav-icon fa fa-cog"></i> Configuraciones</a>
    </li>-->
@endsection

@section('route')
@endsection

