@extends('layouts.app')
@section('css_js_mapa')
 
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
  <link rel="stylesheet" type="text/css" href="{{asset('css/mapa.css')}}">
  <!-- Leaflet Routing -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
  integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
  crossorigin=""></script>
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

@endsection
@section('body class', 'sidebar-fixed  sidebar-lg-show breadcrumb-fixed')

@section('navbar')
    {{-- controles para el sidebar --}}
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    {{-- controles para el login --}}
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-bell-o"></i> Updates
                    <span class="badge badge-info">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-envelope-o"></i> Messages
                    <span class="badge badge-success">42</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-shield"></i> Lock Account
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-lock"></i> Logout
                </a>
            </div>
        </li>
    </ul>    
@endsection

@section('body')	
    <!-- side bar left -->            
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                @yield('sidebar elements')    
            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <!-- ./side bar left -->
    
    <main class="main">

        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            @yield('route')
        </ol>

        <!-- contenedores centrales -->
        <div class="container-fluid">
            <div class="animated fadeIn">
                <!-- /.card-->
                @yield('cards') {{-- Seccion para mostrar el contenido --}}
            </div>
        
            <!-- /.mapa-->
           
        </div>
            @yield('div_principal') {{-- Seccion para mostrar el contenido --}}
        </div>
        <!-- contenedores centrales -->
    </main>
        <!-- ./main -->
@endsection


@section('js_mapa')
<!-- Mapa -->
  <script>
     if( $('#mapid').length ){
        //var mymap = L.map('mapid').setView([51.505, -0.09], 13);
 // [latitud,logintud],[vertical, horizontal]
    var mymap = L.map('mapid').setView([14.10555, -87.204483], 20);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'}).addTo(mymap);
var myLines = [{
    "type": "LineString",
       // [logintud,latitud],[ horizontal,vertical]
    "coordinates": [
      [-87.2039,14.10548],
      [-87.20397,14.10452],
      [-87.2042,14.10448],
      [-87.20466,14.10452]
    ]
}];
// [latitud,logintud],[vertical, horizontal]
//var marker = L.marker([14.10548, -87.2039]).addTo(mymap);
// var marker = L.marker([14.10452, -87.20397]).addTo(mymap);
// var marker = L.marker([14.10448, -87.2042]).addTo(mymap);
//var marker = L.marker([14.10452, -87.20466]).addTo(mymap);
//var myLayer = L.geoJSON(myLines).addTo(mymap);
//myLayer.addData(myLines);
var temp=[];
// Marca utilizada al iniciar una nueva ruta
  var marker1;
  // Marca y Circulo usados al presionar el boton de user location
  var marker = L.marker([0,0]).bindPopup('Estas aquí');
    var circle = L.circle([0,0]);
  function onMapClick(e) {
      if (temp.length<2){
        temp.push([e.latlng.lat,e.latlng.lng]);
        if (temp.length==1) {
          marker1 = L.marker([e.latlng.lat,e.latlng.lng],{title:1}).addTo(mymap);
        }else{
          marker1.remove();
          route=L.Routing.control({
            waypoints: temp,
            createMarker: function(i, wp, nWps) {
              if (i === 0 || i === nWps - 1) {
                   return L.marker(wp.latLng, {title:i+1,draggable:true});
              } else {
                  return L.marker(wp.latLng, {title:i+1,draggable:true});
              }
            },
            fitSelectedRoutes:'smart',
            lineOptions: {
          styles: [{color: 'red', weight: 6}]}
          //show:false
          }).addTo(mymap);
        }
        
      }
      
    }
  mymap.on('click', onMapClick);
        }
    
  </script>
@endsection