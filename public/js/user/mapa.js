if ($('#mapid').length) {
    var mymap = L.map('mapid').setView([14.10555, -87.204483], 20);
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
                marker1 = L.marker([e.latlng.lat, e.latlng.lng], { title: 1 }).addTo(mymap);
                marker1.on(function(event) {
                    marker1 = event.target;
                    var pos = marker1.getLatlng();
                    console.log(`la posicion del marcador es: ${pos}`);
                    //alert(`la posicion del marcador es: ${pos}`);
                });
            } else {
                marker1.remove();
                route = L.Routing.control({
                    waypoints: temp,
                    createMarker: function(i, wp, nWps) {
                        if (i === 0 || i === nWps - 1) {
                            alert(wp.latLng);
                            return L.marker(wp.latLng, { title: i + 1, draggable: true });
                        } else {
                            return L.marker(wp.latLng, { title: i + 1, draggable: true });
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
    mymap.on('click', onMapClick);
}