<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <?php
      if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('pesan');
        echo '</h5></div>';
      }

      ?>

      <?php echo form_open('Admin/UpdateSetting') ?>



      <div class="row">
        <div class="col-sm-7">
          <div class="form-group">
            <label>Nama Website</label>
            <input name="nama_web" value="<?= $web['nama_web'] ?>" class="form-control" placeholder="Nama Website" required>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Coordinat Wilayah</label>
            <input name="coordinat_wilayah" value="<?= $web['coordinat_wilayah'] ?>" class="form-control" placeholder="Coordinat Wilayah" required>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Zoom View</label>
            <input type="number" value="<?= $web['zoom_view'] ?>" name="zoom_view" min="1" max="20" class="form-control" placeholder="Zoom View" required>
          </div>
        </div>
      </div>


      <button class="btn btn-primary" type="submit">Simpan</button>




      <?php echo form_close() ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>


<div class="col-md-12">
  <div id="map" style="width: 100%; height: 800px;"></div>
</div>


<script src="//unpkg.com/@sjaakp/leaflet-search/dist/leaflet-search.js"></script>
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



  // map.addControl(L.control.search());
</script>