<?php 
$session = session();
$name = $session->get('name');
$image = $session->get('image');
$user_type = $session->get('user_type');
$id = $session->get('id');
?>
<style>
.nav-button-log a:hover {
  background-color: red;
}

@media only screen and (max-width: 600px) {
  .btn-tables {
    float: left !important;
    margin-right: 10px;
  }

  .dataTables_filter{
    float: left !important;
  }
  .dataTables_filter input{
      width: 232px;
  }
}
@media only screen and (min-width: 600px) {
  .btn-tables {
    float: right !important;
    margin-left: 10px;
  }

  .dataTables_filter{
    float: left !important;
    margin-left: 10px;
  }
  .dataTables_filter input{
    width: 300px;
  }
}


</style>
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
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/dist/css/adminlte.min.css">
  <!-- Datatables styles -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
  <!-- daterange picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
  <!-- Logout Modal -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/logoutmodal.css">
  <!-- Taskbar Icon -->
  <link rel="icon" href="<?php echo base_url()?>/public/assets/favicon/favicon.ico" type="image/gif">
  <?= $this->renderSection('css'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="" src="<?php echo base_url(); ?>/public/assets/img/Aries.gif" alt="Logo" height="60" width="60">
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
  <?php echo base_url(); ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('home');?>" class="brand-link">
      <img src="<?php echo base_url(); ?>/public/assets/img/Logo-sm.png" alt="Project Logo" class="brand-image rounded elevation-3 bg-white" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= SITE_NAME; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            if ($image != null){
              echo '<img src="'. base_url().'/uploads/'.$image.'" class="img-circle elevation-2" alt="User Image" style="height:40px;width:40px;">';
            }
            else {
              echo '<img src="'. base_url().'/public/assets/img/avatar.png" class="img-circle elevation-2" alt="User Image" style="height:40px;width:40px;">';
            }
          ?>
        </div>
        <div class="info">
          <a href="<?php echo site_url('home');?>" class="d-block"><?= (isset($name)) ? $name :'User Fullname'; ?></a>
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
          <li class="nav-item">
            <a href="<?php echo site_url('analysis');?>" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Analysis (Self)
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
              <li class="nav-item">
                <a href="';
              echo site_url('manage-web');
              echo '" class="nav-link">
                  <i class="nav-icon fas fa-laptop-code"></i>
                  <p>
                    Reading Adjustment
                  </p>
                </a>
              </li>';}
          ?>

          <li class="nav-header">EXTRA</li>
          <li class="nav-item">
            <a href="<?php echo site_url('user-detail/').$id;?>" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                User Detail
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('about');?>" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                About
              </p>
            </a>
          </li>
          <span class="pt-5"></span>
          <li class="nav-item nav-button-log">
            <a href="#logModal" class="nav-link trigger-btn btn btn-danger btn-logout btn-block" data-toggle="modal" data-id="<?php echo $id; ?>">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
            Logout
            </p>
          </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-4">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-white shadow mb-3">
      <div class="container-fluid">
        <div class="row">
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
    <section class="content pb-5">
      <div class="container-fluid w-100">
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

  <!-- Modal HTML -->
  <div id="logModal" class="modal fade"> 
    <div class="modal-dialog modal-confirm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header flex-column">
          <div class="icon-box">
                      <i class="fas fa-sign-out-alt"></i>
          </div>						
          <h4 class="modal-title w-100">Comfirm Logout.</h4>	
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do you really want to logout?.</p>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary btn-modal " data-dismiss="modal" onClick="window.location.reload();">Cancel</button>
          <a id="logId" name="logId" href="<?php echo site_url('logout');?>" class="btn btn-danger btn-modal text-white">Logout</a>
        </div>
      </div>
    </div>
  </div> 
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong><?= SITE_NAME; ?> 2021-2022 <a href="<?= base_url(); ?>"><?= SITE_CREATOR; ?></a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> <?= SITE_VERSION; ?>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/public/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>/public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>/public/plugins/chart.js/Chart.min.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/public/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>/public/dist/js/pages/dashboard2.js"></script>
<!-- Chart JS Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<!-- Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?= $this->renderSection('script'); ?>
<script>
    $(function () {
        $(".btn-logout").click(function () {
            var id = $(this).data('id');
            document.getElementById('dispId').innerHTML = id;
            document.getElementById('logId').href = '<?php echo site_url('/logout');?>';
        })
    });
</script>
<script>

      $(document).ready(function() {

          // Table with export function
          $('#reportTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
              { extend: 'excel', className: 'btn btn-success glyphicon glyphicon-list-alt btn-tables', text: 'Excel <i class="fas fa-file-excel"></i>' },
              { extend: 'pdf', className: 'btn btn-danger glyphicon glyphicon-file btn-tables', text: 'PDF <i class="fas fa-file-pdf"></i>' },
              { extend: 'print', className: 'btn btn-primary glyphicon glyphicon-print btn-tables', text: 'Print <i class="fas fa-print"></i>' }
            ],
            "order": [[0, 'desc']],
            "searching": true
          });
          
          // Table with minimal function
          $('#dashboardTable').DataTable({
            "lengthChange": false,
            "searching": false,
            "pageLength": 10,
            "order": [[0, 'desc']]
          });

          // Table with simple design
          $('#simpleTable').DataTable({
            "lengthChange": false,
            "searching": false,
            "pageLength": 7,
            "order": [[0, 'ASC']],
            "paging":   false,
            "ordering": false,
            "info":     true
          });

          // Table with default function
          $('#myTable').DataTable();


      } );
    </script>
    
</body>
</html>
