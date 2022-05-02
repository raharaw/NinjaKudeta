<?php
//index.php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ninja Kudeta | Candidate</title>
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

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer">
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
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="member.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Member
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="candidate.php" class="nav-link active">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Candidate
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="function/logout.php" class="nav-link">
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Candidate</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Candidate</li>
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
                                    <h5 class="card-title">Candidates Data</h5>

                                   
                                </div>
                                <!-- /.card-header -->
                                <div id="loadTable"></div>
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
                        <div class="form-row">
                            <div class="form-group col-xs-8">
                                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                 
                    <h4 class="modal-title">Detail Data Candidate</h4>
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
                    <h4 class="modal-title">Edit Data Candidate</h4>
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
            $("#loadTable").load("function/loadcandidate.php");
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
                            alert(data);
                            $("#loadTable").load("function/loadcandidate.php");
                        }
                    });
                }
            });
            //END Aksi Insert

            //Begin Tampil Detail Karyawan
            $(document).on('click', '.view_data', function() {
                var employee_id = $(this).attr("id");
                $.ajax({
                    url: "function/select_candidate.php",
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
                    url: "function/edit_candidate.php",
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
                    url: "function/delete_candidate.php",
                    method: "POST",
                    data: {
                        employee_id: employee_id
                    },
                    success: function(data) {
                        alert(data);
                        $("#loadTable").load("function/loadcandidate.php");
                    }
                });
            });
        });
        //End Aksi Delete Data
    </script>
</body>

</html>