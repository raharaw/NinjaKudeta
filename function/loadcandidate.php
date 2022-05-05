<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    table.table td a.delete {
        color: #F44336;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.view {
        color: #03A9F4;
    }
</style>
<div class="card-body">
    <table id="example1" class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>ID</th>
                <th>Token</th>
                <th>Onigiri</th>
                <th>Device</th>
                <th>Macro</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("koneksi.php");
        
            $query = "SELECT * FROM candidate ORDER BY id DESC";
            $result = mysqli_query($connect, $query);
    
      $count = 1;
      while($row = mysqli_fetch_array($result))
      {
          ?>
 
                <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo $row["nick"]; ?></td>
                    <td><?php echo $row["charid"]; ?></td>
                    <td><?php echo number_format($row["token"]); ?> <img src="dist/img/token.png" width="15px"> </td>
                    <td><?php echo number_format($row["onigiri"]); ?> <img src="dist/img/onigiri.png" width="15px"> </td>
                    <td><?php echo $row["pchp"]; ?></td>
                    <td><?php echo $row["macro"]; ?></td>
                
                    <td>
                        <a href="#" name="view" id="<?php echo $row["id"]; ?>" value="Lihat Detail" class="view view_data" title="Detail" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>&nbsp;
                        <a href="#" id="<?php echo $row["id"]; ?>" class="edit edit_data" name="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>&nbsp;
                        <a href="#deleteEmployeeModal" id="<?php echo $row["id"]; ?>" value="Hapus" name="delete" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></ </td>

                </tr>
                <?php
      $count=$count+1;
      }
      ?>
        </tbody>
    </table>
</div>
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Anda Yakin Akan Menghapus Data? </p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="delete" value="Hapus" class="btn btn-danger hapus_data" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    $(document).on('click', '.sync-data', function() {
        $.ajax({
            url: "function/sync_data.php",
            method: "POST",
            success: function(data) {
                alert(data);
                $("#loadTable").load("function/loadtable.php");
            }
        });
    });

    $(document).on('click', '.delete', function() {
        debugger;
        var id = $(this)[0].id;
        $('.hapus_data').attr('id',id);
    });
</script>