<!-- ./col -->
<div class="col-lg-6 col-6">
  <!-- small box -->
  <div class="small-box bg-warning">
    <div class="inner">
      <h3><?= $jmlsekolah ?></h3>

      <p>Sekolah</p>
    </div>
    <div class="icon">
      <i class="fas fa-school"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- Small boxes (Stat box) -->
<div class="col-lg-6 col-6">
  <!-- small box -->
  <div class="small-box bg-indigo">
    <div class="inner">
      <h3><?= $jmlwilayah ?></h3>

      <p>Wilayah</p>
    </div>
    <div class="icon">
      <i class="fas fa-layer-group"></i>
    </div>
    <a href="<?= base_url('Sekolah') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>

<?php
$db = \Config\Database::connect();
foreach ($jenjang as $key => $value) {
  $jml = $db->table('tbl_sekolah')->where('id_jenjang', $value['id_jenjang'])->countAllResults();
?>
  <!-- ./col -->
  <div class="col-lg-3 col-3">
    <!-- small box -->
    <div class="small-box <?php if ($value['id_jenjang'] == 1) {
                            echo 'bg-success';
                          } elseif ($value['id_jenjang'] == 2) {
                            echo 'bg-danger';
                          } elseif ($value['id_jenjang'] == 3) {
                            echo 'bg-primary';
                          } else {
                            echo 'bg-info';
                          } ?>">
      <div class="inner">
        <h3><?= $jml ?></h3>

        <p><?= $value['jenjang'] ?></p>
      </div>
      <div class="icon">
        <i class="fas fa-school"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<?php } ?>