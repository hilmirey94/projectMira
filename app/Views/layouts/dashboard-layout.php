<?php 
$session = session();
$name = $session->get('name');
$image = $session->get('image');
$user_type = $session->get('user_type');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= (isset($pageTitle)) ? $pageTitle :'Document'; ?></title>
  <base href="/">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Datatables styles -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
  <!-- daterange picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
  <?= $this->renderSection('css'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="" src="assets/img/Aries.gif" alt="Logo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-chevron-circle-down"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets/img/Logo.png" alt="Project Logo" class="brand-image rounded elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= SITE_NAME; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            if ($image != null){
              echo '<img src="data:image/png;base64,'.base64_encode($image).'" class="img-circle elevation-2" alt="User Image">';
            }
            else {
              echo '<img src="assets/img/avatar.png" class="img-circle elevation-2" alt="User Image">';
            }
          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= (isset($name)) ? $name :'User Fullname'; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">USER</li>
          <li class="nav-item">
            <a href="<?php echo site_url('home');?>" class="nav-link">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="<?php echo site_url('report');?>" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Report (Self)
              </p>
            </a>
          </li>
          <?php
          if ($user_type == 'staff' || $user_type == 'admin') {
              echo '<li class="nav-header">STAFF</li>
              <li class="nav-item">
                <a href="'. site_url('manage-report') .'" class="nav-link">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Manage Report
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="'. site_url('manage-user') .'" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>
                    Manage User
                  </p>
                </a>
              </li>';}
          ?>

          <?php
          if ($user_type == 'admin') {
              echo '<li class="nav-header">ADMIN</li>
              <li class="nav-item">
              <a href="';
              echo site_url('logs');
              echo '" class="nav-link">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Logs
                  </p>
                </a>
              </li>
              <li class="nav-item bg-secondary">
                <a href="';
              echo site_url('manage-web');
              echo '" class="nav-link">
                  <i class="nav-icon fas fa-laptop-code"></i>
                  <p>
                    Manage Web
                  </p>
                </a>
              </li>';}
          ?>

          <li class="nav-header">EXTRA</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                User Detail
              </p>
            </a>
          </li>
          <span class="pt-4"></span>
          <div id="logout-button" class="p-3">
            <button type="button" onclick="location.href='<?php echo base_url();?>/'" class="btn btn-danger btn-block shadow">
              <i class="fas fa-sign-out-alt"></i>
              Logout
            </button>
          </div>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-white shadow mb-3" style="height: 55px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><?= (isset($pageTitle)) ? $pageTitle :'Document'; ?></li>
              <li class="breadcrumb-item active"><?= SITE_NAME; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?= $this->renderSection('content'); ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>PSM Project 2021-2022 <a href="<?= base_url(); ?>">Hilmi Abdul Halim</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>

<?= $this->renderSection('script'); ?>
<script>

      $(document).ready(function() {

          // Table with export function
          $('#reportTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
              { extend: 'copy', className: 'btn btn-primary glyphicon glyphicon-duplicate', text: 'Copy <i class="fas fa-copy"></i>' },
              { extend: 'csv', className: 'btn btn-secondary glyphicon glyphicon-save-file', text: 'CSV <i class="fas fa-file-csv"></i>' },
              { extend: 'excel', className: 'btn btn-success glyphicon glyphicon-list-alt', text: 'Excel <i class="fas fa-file-excel"></i>' },
              { extend: 'pdf', className: 'btn btn-danger glyphicon glyphicon-file', text: 'PDF <i class="fas fa-file-pdf"></i>' },
              { extend: 'print', className: 'btn btn-primary glyphicon glyphicon-print', text: 'Print <i class="fas fa-print"></i>' }
            ],
            "order": [[0, 'desc']]
          });
          
          // Table with minimal function
          $('#dashboardTable').DataTable({
            "lengthChange": false,
            "searching": false,
            "pageLength": 10,
            "order": [[0, 'desc']]
          });

          // Table with default function
          $('#myTable').DataTable();
          
          
      } );
    </script>
    
</body>
</html>
