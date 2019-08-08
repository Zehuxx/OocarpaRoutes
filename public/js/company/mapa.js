if ($('#mapid').length) {
    var mymap = L.map('mapid',{
          center: [14.10555, -87.204483],
          zoom: 15,
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
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', { foo: 'bar', attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>' }).addTo(mymap);

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
        $('#editar').modal('show');
        mymap.on('click', onMapClick);
      }
      

