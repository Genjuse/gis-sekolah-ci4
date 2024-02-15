<div id="map" style="width: 100%; height: 800px;"></div>

<script>
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/satellite-v9'
    });


    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    });
    // const map = L.map('map').setView([-7.801384, 110.373908], 13);

    // const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    // }).addTo(map);

    const map = L.map('map', {
        center: [<?= $web['coordinat_wilayah'] ?>],
        zoom: <?= $web['zoom_view'] ?>,
        layers: [peta3] //masih menggunakan peta 3
    });

    const baseMaps = {
        // 'OpenStreetMap': peta1,
        // 'satellite': peta2,
        'Streets': peta3,
        // 'night': peta4
    };
    var layerControl = L.control.layers(baseMaps).addTo(map);

    //masih eror di bagian wilayah

    <?php if (!empty($wilayah)) : ?>
        <?php foreach ($wilayah as $key => $value) : ?>
            L.geoJSON(<?= $value['geojson'] ?>, {
                    fillColor: '<?= $value['warna'] ?>',
                    fillOpacity: 0.5,
                })
                .bindPopup("<b><?= $value['nama_wilayah'] ?></b>.")
                .addTo(map);
        <?php endforeach; ?>
    <?php else : ?>
        // Handle the case when $wilayah is empty or undefined
        console.log('No data available for wilayah.');
    <?php endif; ?>


    <?php if (!empty($sekolah)) : ?>
        <?php foreach ($sekolah as $key => $value) : ?>
            <?php
            $greenIcon = base_url('marker/' . $value['marker']); // Assuming $value['marker'] contains the marker image filename
            // Assuming $value['coordinat'] is a string in the format "lat,lng"
            list($lat, $lng) = explode(',', $value['coordinat']);
            ?>
            L.marker([<?= $lat ?>, <?= $lng ?>], {
                    icon: L.icon({
                        iconUrl: '<?= $greenIcon ?>',
                        iconSize: [35, 50], // size of the icon
                    })
                })
                .bindPopup("<img src='<?= base_url('foto/' . $value['foto']) ?>' width='210px' height='150px'><br>" +
                    "<b><?= $value['nama_sekolah'] ?></b><br>" +
                    "Akreditasi <?= $value['akreditasi'] ?><br>" +
                    "<?= $value['status'] ?><br><br>" +
                    "<a href='<?= base_url('Home/DetailSekolah/' . $value['id_sekolah']) ?>' class='btn btn-primary btn-xs text-white'>Detail</a>" +
                    " <a href='https://www.google.com/maps/dir/?api=1&destination=<?= $value['coordinat'] ?>' class='btn btn-primary btn-xs text-white' target='_blank'>Rute</a>")
                .addTo(map);
        <?php endforeach; ?>
    <?php else : ?>
        // Handle the case when $sekolah is empty or undefined
        console.log('No data available for sekolah.');
    <?php endif; ?>
</script>