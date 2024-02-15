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

  <?php foreach ($wilayah as $key => $value) { ?>
    L.geoJSON(<?= $value['geojson'] ?>, {
        fillColor: '<?= $value['warna'] ?>',
        fillOpacity: 0.3,
      })
      .bindPopup("<b><?= $value['nama_wilayah'] ?></b>")
      .addTo(map);
  <?php } ?>

  <?php foreach ($sekolah as $key => $value) { ?>
    var Icon = L.icon({
      iconUrl: '<?= base_url('marker/' . $value['marker']) ?>',
      iconSize: [20, 25], // size of the icon
    });

    L.marker([<?= $value['coordinat'] ?>], {
        icon: Icon
      })
      .bindPopup("<img src='<?= base_url('foto/' . $value['foto']) ?>' width='210px' height='150px'><br>" +
        "<b><?= $value['nama_sekolah'] ?></b><br>" +
        "Akreditasi <?= $value['akreditasi'] ?><br>" +
        "<?= $value['status'] ?><br><br>" +
        "<a href='<?= base_url('Home/DetailSekolah/' . $value['id_sekolah']) ?>' class='btn btn-primary btn-xs text-white'>Detail</a>" +
        " <a href='https://www.google.com/maps/dir/?api=1&destination=<?= $value['coordinat'] ?>' class='btn btn-primary btn-xs text-white' target='_blank'>Rute</a>")
      .addTo(map);
  <?php } ?>
</script>