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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="<?= base_url('Home') ?>" class="navbar-brand">
          <img src="<?= base_url('') ?>/foto/muhammadiyah.png" class="me-2" style="opacity: .8" height="45px" width="60px">

        </a>
        <h7><b><?= $web['nama_web'] ?></b></h7>
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
            <li class="nav-item">
              <a href="<?= base_url('Admin') ?>" class="nav-link">Daftar Sekolah</a>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Jenjang</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <?php foreach ($jenjang as $key => $value) { ?>
                  <li><a href="<?= base_url('Home/Jenjang/' . $value['id_jenjang']) ?>" class="dropdown-item"><?= $value['jenjang'] ?> </a></li>
                <?php } ?>
                <li class="dropdown-divider"></li>
              </ul>
            </li>
            <!-- Wilayah Dropdown Menu -->
            <!-- <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Wilayah</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <?php foreach ($wilayah as $key => $value) { ?>
                  <li><a href="<?= base_url('Home/Wilayah/' . $value['id_wilayah']) ?>" class="dropdown-item"><?= $value['nama_wilayah'] ?> </a></li>
                <?php } ?>
                <li class="dropdown-divider"></li>
              </ul>
            </li> -->
            <!-- Jenjang Dropdown Menu -->



          </ul>


        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <div class="dropdown-divider"></div>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth/Login') ?>">
              <i class="fas fa-sign-in-alt"></i>login
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('') ?>" class="brand-link">
        <img src="<?= base_url('') ?>/logo/muhammadiyah.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GIS Sekolah</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

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

            <li class="nav-item ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                  Wilayah
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php foreach ($wilayah as $key => $value) { ?>
                  <li class="nav-item">
                    <a href="<?= base_url('Home/Wilayah/' . $value['id_wilayah']) ?>" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?= $value['nama_wilayah'] ?></p>
                    </a>
                  </li>
                <?php } ?>

              </ul>
            </li>
            <li class="nav-item ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-swimming-pool"></i>
                <p>
                  Jenjang
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php foreach ($jenjang as $key => $value) { ?>
                  <li class="nav-item">
                    <a href="<?= base_url('Home/Jenjang/' . $value['id_jenjang']) ?>" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?= $value['jenjang'] ?></p>
                    </a>
                  </li>
                <?php } ?>

              </ul>
            </li>
          </ul>
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
            <div>
              <div class="float-right d-none d-sm-inline" style="position: fixed; right: 200px;">
                <?php $no = 1;
                foreach ($jenjang as $key => $value) { ?>
                  <tr>
                    <td class="text-center"><?= $value['jenjang'] ?></td>
                    <td class="text-center"><img src="<?= base_url('marker/' . $value['marker']) ?>" width="30px"></td>
                  </tr>
                <?php } ?>
              </div>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="row">
          <!-- isi koonten-->
          <?php if ($page) {
            echo view($page);
          } ?>

          <!-- isi koonten-->
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
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('AdminLTE') ?>dist/js/demo.js"></script>
</body>

</html>