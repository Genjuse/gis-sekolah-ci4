<div class="col-sm-6">
  <div id="map" style="width: 100%; height: 500px;"></div>
</div>

<div class="col-sm-6">
  <img src="<?= base_url('foto/' . $sekolah['foto']) ?>" width="100%" height="500px">
</div>

<div class="col-sm-12">
  <table class="table table-bordered table-sm">
    <tr>
      <th width="180px">Nama Sekolah</th>
      <th width="50px" class="text-center">:</th>
      <td><?= $sekolah['nama_sekolah'] ?></td>
    </tr>
    <tr>
      <th>Jenjang Sekolah</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['jenjang'] ?></td>
    </tr>
    <tr>
      <th>Akreditasi Sekolah</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['akreditasi'] ?></td>
    </tr>
    <tr>
      <th>Status Sekolah</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['status'] ?></td>
    </tr>
    <tr>
      <th>Alamat Sekolah</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['alamat'] ?>,Prov. <?= $sekolah['nama_provinsi'] ?>, Kab. <?= $sekolah['nama_kabupaten'] ?>, Kec. <?= $sekolah['nama_kecamatan'] ?></td>
    </tr>
    <tr>
      <th>NPSN</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['npsn'] ?></td>
    </tr>
    <tr>
      <th>Kurikulum</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['kurikulum'] ?></td>
    </tr>
    <tr>
      <th>SK Pendirian Sekolah</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['sk_pendirian_sekolah'] ?></td>
    </tr>
    <tr>
      <th>Tanggal SK Pendirian</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['tgl_sk_pendirian'] ?></td>
    </tr>
    <tr>
      <th>SK Izin Operasional</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['sk_izin_operasional'] ?></td>
    </tr>
    <tr>
      <th>Tanggal SK Izin Operasi</th>
      <th class="text-center">:</th>
      <td><?= $sekolah['tgl_sk_izin_operasi'] ?></td>
    </tr>

  </table>
</div>


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


  var map = L.map('map', {
    center: [<?= $sekolah['coordinat'] ?>],
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

  L.marker([<?= $sekolah['coordinat'] ?>]).addTo(map)
</script>