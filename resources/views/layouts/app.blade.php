<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Estilos barra lateral y contenedor de mapa -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/estilos_barra.css')}}">
  <!-- Iconos -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Leafleat css -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
  <!-- Leaflet Routing -->
  @yield("librarymap")
</head>
<body>
  <!-- Bootstrap NavBar -->
<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img src="{{ asset('img/Xmaphn.png')}}" width="100" height="50" class="d-inline-block align-top" alt="">


    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

            <!-- This menu is hidden in bigger devices with d-sm-none.
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
            <li class="nav-item dropdown d-sm-block d-md-none">
                <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    @yield('Menu')
                </div>
            </li>
            <!-- Smaller devices menu END -->

        </ul>
    </div>
    <div class="profile">
      <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="{{ asset('img/user.jpg')}}"  id="circle">
        <span class="color_nombre">Bruce Wayne</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Mi perfil</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Cerrar Sesión</a>
      </div>
    </div>

</nav>
<!-- NavBar END -->


<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group sticky-top sticky-offset">
        	@yield('Items_sidebar')
        </ul>
        <!-- List Group END-->
        @yield('banner')
    </div>
    <!-- sidebar-container END -->

<div class="col py-3">
  @yield('Marco')
</div>

</div>
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Mapa -->
  <script src="{{ asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap js -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script>
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
//var marker = L.marker([14.10000038147, -87.216697692871]).addTo(mymap);
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
  </script>
</body>
</html>
