var mymap = L.map('mapid').setView([14.0889, -87.210535], 22);
//lat 14.08333
//lng -87.21667

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', { foo: 'bar', attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>' }).addTo(mymap);

var marker = L.marker([14.0889, -87.210535]).addTo(mymap);

/*function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}

mymap.on('click', onMapClick);*/