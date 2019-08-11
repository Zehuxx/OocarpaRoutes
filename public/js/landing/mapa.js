if ($('#mapid').length) {
  //variables a usar no borrar --juan--
  var geo=false;

  $(document).ready(function (){
        $("#locate-position").show();
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
    Lapiz = L.tileLayer('https://api.tiles.mapbox.com/v4/mapbox.pencil/{z}/{x}/{y}.png?access_token='+info['access_token'],
    {
        attribution: info['attribution'],
        id: 'mapbox.pencil',
        maxZoom: 18,
        accessToken: info['access_token']
      });

    var mymap = L.map('mapid',{
          center: [14.10555, -87.204483],
          zoom: 15,
          layers: [Lapiz,CallesSatelite,Calles],
          contextmenu: true,
          contextmenuWidth: 140,
          contextmenuItems: [{
              text: 'Crear ruta',
              callback: addRoute
          },{
              text: 'Show coordinates', 
              callback: showCoordinates
          }, {
              text: 'Center map here',
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
    'Lapiz':Lapiz,
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
        if (temp.length < 2) {
            temp.push([e.latlng.lat, e.latlng.lng]);
            if (temp.length == 1) {
                var icon = new L.NumberedDivIcon({ number: 1, color: 'red' });
                marker1 = L.marker([e.latlng.lat, e.latlng.lng], { icon: icon, draggable: true }).addTo(mymap);
            } else {
                marker1.remove();
                route = L.Routing.control({
                    waypoints: temp,
                    createMarker: function(i, wp, nWps) {
                        var icon = new L.NumberedDivIcon({ number: i+1, color: 'red' });
                        if (i === 0 || i === nWps - 1) {
                            //alert(wp.latLng);
                            return L.marker(wp.latLng, { icon: icon, draggable: true });
                        } else {
                            return L.marker(wp.latLng, { icon: icon, draggable: true });
                        }
                    },
                    fitSelectedRoutes: 'smart',
                    lineOptions: {
                        styles: [{ color: 'red', weight: 6 }]
                    }
                    //show:false
                }).addTo(mymap);
            }
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

      function addRoute(e){
        //alert("haz click sobre el mapa y crea los marcadores de referencia");
        mymap.on('click', onMapClick);
      }
      // se encarga de la geolocalizacion del usuario
      $('#locate-position').on('click', function(){
          userlocation();   
      });

      function userlocation(){
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
              $('#locate-position').css('color','blue');
              mymap.stopLocate(); //deja de lacalizar el usuario
            })
            .on('locationerror', function(e){
              marker.remove();
              circle.remove(); 
              $('#locate-position').css('color','');
              console.log(e);
              alert("Acceso a localización denegada.");
            });
      }
  

