@extends('landing')

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
@endsection



@section('body')
    <main class="main" style="padding: 0px">
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




