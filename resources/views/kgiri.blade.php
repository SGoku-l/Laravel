<!DOCTYPE html>
<html>
<head>
  <title>Krishnagiri Route Map</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>#map { height: 100vh; }</style>
</head>
<body>
  <div id="map"></div>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    var map = L.map('map').setView([12.5192, 78.2136], 10); // Krishnagiri center

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Example marker
    L.marker([12.5192, 78.2136]).addTo(map)
      .bindPopup('Krishnagiri District')
      .openPopup();

    // Example route (line) from Krishnagiri to Hosur
    var route = L.polyline([
      [12.5192, 78.2136],  // Krishnagiri
      [12.7405, 77.8253]   // Hosur
    ], {color: 'blue'}).addTo(map);
  </script>

<h1>Hii By Branch</h1>
<h2>New Commit</h2>

</body>
</html>

