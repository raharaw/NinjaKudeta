<?php
//index.php
// include_once("koneksi.php");
$connect = mysqli_connect("localhost", "root", "", "ninjakudeta");
$query = "SELECT * FROM member ORDER BY id DESC";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ninja Kudeta | Dashboard</title>

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
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
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
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="member.php" class="nav-link active">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Member
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
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Member</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Member</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Member Data</h5>

                  <div class="card-tools" style="padding-right: 1rem;">
                    <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#add_data_Modal" style="margin: 0 0.5rem">Add Member
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Token</th>
                        <th>Onigiri</th>
                        <th>Device</th>
                        <th>Macro</th>
                        <th>Final Day</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($row = mysqli_fetch_array($result)) {
                      ?>
                        <tr>
                          <td><?php echo $row["nick"]; ?></td>
                          <td><?php echo $row["charid"]; ?></td>
                          <td><?php echo number_format($row["token"]); ?> <img src="dist/img/token.png" width="15px"> </td>
                          <td><?php echo number_format($row["onigiri"]); ?> <img src="dist/img/onigiri.png" width="15px"> </td>
                          <td><?php echo $row["pchp"]; ?></td>
                          <td><?php echo $row["macro"]; ?></td>
                          <td><?php echo $row["finalday"]; ?></td>
                          <td>
                            <input type="button" name="view" value="Lihat Detail" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" />&nbsp;
                            <input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-xs edit_data" /> &nbsp;
                            <input type="button" name="delete" value="Hapus" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs hapus_data" />
                          </td>

                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
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
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="https://ninjasage.id">Ninja Kudeta</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>
  </div>

  <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Input Data Member</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="insert_form">
            <div class="form-row">
              <div class="form-group col-xs-4">
                <label>Nickname</label>
                <input type="text" name="nick" id="nick" class="form-control" placeholder="Nickname" />

              </div>
              <div class="form-group col-xs-2">
                <label>ID Char</label>
                <input type="text" name="charid" id="charid" class="form-control" placeholder="Char ID" />
              </div>

              <div class="form-group col-xs-2">
                <label>Token <img src="dist/img/token.png" width="15px"></label>
                <input type="text" name="token" id="token" class="form-control" />
              </div>

              <div class="form-group col-xs-2">
                <label>Onigiri <img src="dist/img/onigiri.png" width="15px"></label>
                <input type="text" name="onigiri" id="onigiri" class="form-control" />
              </div>
            </div>

            <div class="form-row">

              <div class="form-group col-xs-6">
                <label for="discord">Discord <img src="dist/img/discord.png" width="15px"></label>
                <input type="text" class="form-control" id="discord" name="discord" placeholder="Discord">
              </div>

              <div class="form-group col-xs-6">
                <label for="nowa">Whatsapp <img src="dist/img/wa.png" width="15px"></label>
                <input type="text" class="form-control" id="nowa" name="nowa" placeholder="Nomor Whatsapp">
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-xs-4">
                <label>Player</label>
                <select name="pchp" id="pchp" class="form-control">
                  <option value="PC">PC User</option>
                  <option value="Android">Android</option>
                  <option value="Unknown Player">Unknown Player</option>
                </select>
              </div>

              <div class="form-group col-xs-4">
                <label>Macro</label>
                <select name="macro" id="macro" class="form-control">
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                  <option value="Unknown Macro">Unknown Macro</option>
                </select>
              </div>

              <div class="form-group col-xs-4">
                <label>Final Day</label>
                <select name="finalday" id="finalday" class="form-control">
                  <option value="Attend">Attend</option>
                  <option value="Not Attend">Not Attend</option>
                  <option value="Unknown Attend">Unknown Attend</option>
                </select>
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-xs-12">
                <label for="warn">Warn User <img src="dist/img/warn.png" width="15px"></label>
                <textarea name="warn" id="warn" class="form-control" placeholder="Masukan List Warn" rows="5"></textarea>
              </div>
            </div>

            <label>
            </label>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br><br>
            <br>
            <br>
            <br><br>
            <br><br>
            <div class="form-row">
              <div class="form-group col-xs-8">
                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <br>
            <br>

          </form>

        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  </div>


  <div id="dataModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Data Member</h4>
        </div>
        <div class="modal-body" id="detail_karyawan">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div id="editModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Member</h4>
        </div>
        <div class="modal-body" id="form_edit">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
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
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      // Begin Aksi Insert
      $('#insert_form').on("submit", function(event) {
        event.preventDefault();
        if ($('#nick').val() == "") {
          alert("Mohon Isi Nickname ");
        } else if ($('#charid').val() == '') {
          alert("Mohon Isi Char ID");
        } else {
          $.ajax({
            url: "function/insert.php",
            method: "POST",
            data: $('#insert_form').serialize(),
            beforeSend: function() {
              $('#insert').val("Inserting");
            },
            success: function(data) {
              $('#insert_form')[0].reset();
              $('#add_data_Modal').modal('hide');
              $('#employee_table').html(data);
            }
          });
        }
      });
      //END Aksi Insert

      //Begin Tampil Detail Karyawan
      $(document).on('click', '.view_data', function() {
        var employee_id = $(this).attr("id");
        $.ajax({
          url: "function/select.php",
          method: "POST",
          data: {
            employee_id: employee_id
          },
          success: function(data) {
            $('#detail_karyawan').html(data);
            $('#dataModal').modal('show');
          }
        });
      });
      //End Tampil Detail Karyawan

      //Begin Tampil Form Edit
      $(document).on('click', '.edit_data', function() {
        var employee_id = $(this).attr("id");
        $.ajax({
          url: "function/edit.php",
          method: "POST",
          data: {
            employee_id: employee_id
          },
          success: function(data) {
            $('#form_edit').html(data);
            $('#editModal').modal('show');
          }
        });
      });
      //End Tampil Form Edit

      //Begin Aksi Delete Data
      $(document).on('click', '.hapus_data', function() {
        var employee_id = $(this).attr("id");
        $.ajax({
          url: "function/delete.php",
          method: "POST",
          data: {
            employee_id: employee_id
          },
          success: function(data) {
            $('#employee_table').html(data);
          }
        });
      });
    });
    //End Aksi Delete Data
  </script>
</body>

</html>