<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ninja Kudeta | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="dist/img/fav.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>
  <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
              <i class="fas fa-bars"></i>
            </a>
          </li>
        </ul>
        <!-- Right navbar links -->
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Ninja Kudeta</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="index.php" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p> Dashboard </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="member.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p> Admin </p>
                </a>
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
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard Clan War Season 2</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">
                    <a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div id="autoData">
          <section class="content">
            <div class="container-fluid">
              <!-- Info boxes -->
              <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon  elevation-1">
                      <img src="dist/img/trophy.png" width="60%">
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Clan Rank</span>
                      <span class="info-box-number">
                        <small>#</small>
                        <span id="rank"></span>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon elevation-1">
                      <img src="dist/img/rep.png" width="60%">
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Reputation(s)</span>
                      <span class="info-box-number" id="reputation"></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon elevation-1">
                      <img src="dist/img/token.png" width="60%">
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Token(s) / Gold(s)</span>
                      <span class="info-box-number" id="tokengold"></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon  elevation-1">
                      <i class="fas fa-users"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Member(s)</span>
                      <span class="info-box-number" id="totalmember"></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Member Reputation</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name (ID)</th>
                            <th>Level</th>
                            <th>Reputation(s) Realtime</th>
                            <th>Gold Donated</th>
                            <th>Token Donated</th>
                            <th>Reputation(s) Before</th>
                            <th>Reputation(s) Gained</th>
                            <th>Join Date</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                    <!-- ./card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!--/. container-fluid -->
          </section>
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="https://ninjasage.id">Ninja Kudeta</a>. </strong> All rights reserved. <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
    $("#rank").load("function/loaddata.php?type=rank");
    $("#reputation").load("function/loaddata.php?type=reputation");
    $("#tokengold").load("function/loaddata.php?type=token/gold");
    $("#totalmember").load("function/loaddata.php?type=totalmember");
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "buttons": ["excel", "pdf", "print"],
      "order":[[7,"desc"]],
        "ajax": {
          url: 'function/loaddata.php?type=memberdata',
          dataSrc: 'data'
        },
      "bDestroy": true
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    setInterval(function() {
      $("#rank").load("function/loaddata.php?type=rank");
      $("#reputation").load("function/loaddata.php?type=reputation");
      $("#tokengold").load("function/loaddata.php?type=token/gold");
      $("#totalmember").load("function/loaddata.php?type=totalmember");
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "buttons": ["excel", "pdf", "print"],
        "order":[[7,"desc"]],
          "ajax": {
            url: 'function/loaddata.php?type=memberdata',
            dataSrc: 'data'
          },
        "bDestroy": true
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    }, 5000);
    </script>
  </body>
</html>