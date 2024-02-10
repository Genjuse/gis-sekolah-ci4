<div id="map" style="width: 100%; height: 800px;"></div>

<script>
  var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  });


  var peta2 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    attribution: 'Map data &copy; <a href="https://www.google.com/maps">Google Maps</a>',
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
  });



  var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  });

  var peta4 = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
    attribution: 'Map data &copy; <a href="https://carto.com/attributions">CartoDB</a>',
  });

  // var map = L.map('map').setView([-0.8971600935330516, 100.3764066301208], 12);

  // var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  //   attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  // }).addTo(map);

  var map = L.map('map', {
    center: [<?= $web['coordinat_wilayah'] ?>],
    zoom: <?= $web['zoom_view'] ?>,
    layers: [peta3]
  });

  var baseMaps = {
    'OpenStreetMap': peta1,
    'Satellite': peta2,
    'Streets': peta3,
    'Night': peta4,
  };

  var layerControl = L.control.layers(baseMaps).addTo(map);


  var wilayah = L.geoJSON(<?= $detailwilayah['geojson'] ?>, {
      fillColor: '<?= $detailwilayah['warna'] ?>',
      fillOpacity: 0.5,
    }).addTo(map)
    .bindPopup("<b><?= $detailwilayah['nama_wilayah'] ?></b>")
    .openPopup();


  map.fitBounds(wilayah.getBounds());
</script>