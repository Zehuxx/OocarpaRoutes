if ($('#mapid').length) {
  //variables a usar no borrar --juan--
  var route= null;
  var geo=false;

  $(document).ready(function (){
        $("#locate-position").show();
  });
  // se encarga del guardado de una sucursal
    $('#route-save').on('click', function(){
        $("#guardar-sucursal").modal("show");
    });
  // Derechos de autor, token de acceso a mapas de Mapbox
  info={
    'access_token':'pk.eyJ1IjoiemVodXh4IiwiYSI6ImNqd3UxZXhjZzAxeXY0YW1odnI2MW1weHQifQ.ujnaRa5lFM-Bh0laXJu3sQ',
    'attribution':'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
  };

  // Mapas disponibles
    var Calles = L.tileLayer('https://api.tiles.mapbox.com/v4/mapbox.streets/{z}/{x}/{y}.png?access_token='+info['access_token'], 
      {
        attribution: info['attribution'], 
        id: 'mapbox.streets', 
        maxZoom: 18,
        accessToken: info['access_token'] 
      }),
      CallesSatelite  = L.tileLayer('https://api.tiles.mapbox.com/v4/mapbox.streets-satellite/{z}/{x}/{y}.png?access_token='+info['access_token'], 
      {
        id: 'mapbox.streets-satellite', 
        attribution:info['attribution'],
        maxZoom: 18,
        accessToken: info['access_token'] 
      });

    var mymap = L.map('mapid',{
          center: [14.10555, -87.204483],
          zoom: 15,
          layers: [CallesSatelite,Calles],
          contextmenu: true,
          contextmenuWidth: 140,
          contextmenuItems: [{
              text: 'Agregar sucursal',
              callback: addBranch
          },{
              text: 'Mostrar coordenadas', 
              callback: showCoordinates
          }, {
              text: 'Centrar mapa aquí',
              callback: centerMap
          }, '-', {
              text: 'Zoom in',
              icon: base_url + '/map_imgs/zoom-in.png',
              callback: zoomIn
          }, {
              text: 'Zoom out',
              icon: base_url + '/map_imgs/zoom-out.png',
              callback: zoomOut
      }]
    });
    // Mapeo clave valor de mapas y su nombre id
  var baseMaps = {
    'CallesSatelite':CallesSatelite,
    'Calles': Calles
  };
  // Opciones de capas en el mapa
  L.control.layers(baseMaps).addTo(mymap);
    var temp = [];
    // Marca utilizada al iniciar una nueva ruta
    var marker1;
    // Marca y Circulo usados al presionar el boton de user location
    var marker = L.marker([0, 0]).bindPopup('Estas aquí');
    var circle = L.circle([0, 0]);

    function onMapClick(e) {
        if (temp.length < 1) {
            temp.push([e.latlng]);
            var icon = new L.icon({iconUrl:base_url+'/markers/marcador-defecto.png',iconSize:[38, 55]});
            marker1 = L.marker([e.latlng.lat, e.latlng.lng], { icon: icon, draggable: true }).addTo(mymap);
            $("#route-save").show();
            
        }
    }
    
}

      function showCoordinates (e) {
          alert(e.latlng);
      }

      function centerMap (e) {
          mymap.panTo(e.latlng);
      }

      function zoomIn (e) {
          mymap.zoomIn();
      }

      function zoomOut (e) {
          mymap.zoomOut();
      }

      function addBranch(e){
        //alert("haz click sobre el mapa y crea los marcadores de referencia");
        mymap.on('click', onMapClick);
      }
      // se encarga de la geolocalizacion del usuario
      $('#locate-position').on('click', function(){
          userlocation();

      });

      function userlocation(){
        if ($('#locate-position').hasClass('colordefault')) {
          mymap.locate(
          {setView: true, // equivalente a un focus en html (enfoca el punto de ubicacion del usuario)
            watch: true}) // hace seguimiento en caso de que el usuario se mueva
            .on('locationfound', function(e){
                marker.setLatLng([e.latitude, e.longitude]).addTo(mymap);
                circle.setLatLng([e.latitude, e.longitude], e.accuracy/2, {
                weight: 1,
                color: 'blue',
                fillColor: '#cacaca',
                fillOpacity: 0.2
            }).addTo(mymap);
              $('#locate-position').removeClass('colordefault')
              $('#locate-position').css('color','blue');
              mymap.stopLocate(); //deja de localizar el usuario
            })
            .on('locationerror', function(e){
              $('#locate-position').addClass('colordefault')
              marker.remove();
              circle.remove(); 
              $('#locate-position').css('color','');
              alert("Acceso a localización denegada.");
            });
        }else{
              $('#locate-position').addClass('colordefault')
              marker.remove();
              circle.remove(); 
              $('#locate-position').css('color','');
              mymap.setView([14.089628, -87.199173],13);
        }
        
      }

    function getpoints(){
      if (temp!=null) {
        var routeArray = new Array();
          routeArray = marker1.getLatLng();
          item=[routeArray.lat,routeArray.lng];
          return JSON.stringify(item);
      }
      return null;
    } 
  
    function DibujarMarcador(waypoints) {
        if (waypoints) {
          temp.push(waypoints);
          var icon = new L.icon({iconUrl:base_url+'/markers/marcador-defecto.png',iconSize:[38, 55]});
          marker1 = L.marker(waypoints, { icon: icon, draggable: true }).addTo(mymap);
        }
    }

    function DibujarMarcadores(locations,empresa) {
        if (locations.length>0){
          for (var i = 0; i<locations.length; i++) {
            var icon = new L.icon({iconUrl:base_url+'/markers/'+locations[i].img,iconSize:[38, 55], color: 'red' });
            L.marker(locations[i].coordinates, { icon: icon, draggable: false }).addTo(mymap).bindPopup('<strong>Empresa: '+JSON.parse(empresa[i]).name+'</strong><br>'+'<strong>Sucursal: '+locations[i].name+'</strong>');
          }
          mymap.setView(locations[0].coordinates,14);
        }
    }

