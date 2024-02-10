<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GIS Sekolah | <?= $judul ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">

  <!-- leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="<?= base_url('AdminLTE') ?>/index3.html" class="navbar-brand">
          <img src="<?= base_url() ?>/foto/muhammadiyah.png" class="me-2" height="45px">
        </a>
        <h5><b><?= $web['nama_web'] ?></b></h5>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>" class="nav-link">Home</a>
            </li>

            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Wilayah</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <?php foreach ($wilayah as $key => $value) { ?>
                  <li><a href="<?= base_url('Home/Wilayah/' . $value['id_wilayah']) ?>" class="dropdown-item"><?= $value['nama_wilayah'] ?> </a></li>
                <?php } ?>

              </ul>
            </li>

            <?= form_open('Home/Jenjang'); ?>


            <!-- Ganti 'controller/method' dengan URL tujuan yang sesuai -->

            <label for="jenjang">Pilih Jenjang:</label>
            <?= form_dropdown('jenjang', array_column($jenjang, 'jenjang', 'id_jenjang'), '', 'id="jenjang" class="form-control"'); ?>
            <!-- 'jenjang' adalah nama field, array_column digunakan untuk mengambil kolom 'jenjang' dan 'id_jenjang' dari array $jenjang -->
            <input type="hidden" value="" id="id_wilayah_input" name="id_wilayah_input" class="form-control">

            <button type="submit">Submit</button>
            <?= form_close(); ?>

          </ul>


        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">


          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth/Login') ?>">
              <i class="fas fa-sign-in-alt"></i> Login
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url() ?>/logo/pt.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GIS Sekolah</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->




        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('Home') ?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                  Wilayah
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php foreach ($wilayah as $key => $value) { ?>
                  <li class="nav-item">
                    <a href="<?= base_url('Home/Wilayah/' . $value['id_wilayah']) ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?= $value['nama_wilayah'] ?> </p>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-swimming-pool"></i>
                <p>
                  Jenjang
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>


              <select name="cars" id="cars">

                <?php foreach ($jenjang as $key => $value) { ?>
                  <option value="<?= $value['id_jenjang'] ?> "><?= $value['jenjang'] ?> </option>
                <?php } ?>


              </select>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"> <?= $judul ?></h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="row">
          <!-- /.isi konten -->
          <?php
          if ($page) {
            echo view($page);
          }
          ?>
          <!-- /end isi konten -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div>
        <div class="float-right d-none d-sm-inline">
          <H2>LEGENDA</h2>
          <?php $no = 1;
          foreach ($jenjang as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= $value['jenjang'] ?></td>
              <td class="text-center"><img src="<?= base_url('marker/' . $value['marker']) ?>" width="75px"></td>
            </tr>
          <?php } ?>
        </div>
      </div>

    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>

  <script>
    // Menggunakan JavaScript untuk mendapatkan parameter dari URL
    var idWilayah = window.location.pathname.split('/').pop();

    // Set nilai input dengan nilai parameter dari URL
    document.getElementById('id_wilayah_input').value = idWilayah;
  </script>
</body>

</html>