<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Reputation</th>
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
            $connect = mysqli_connect("localhost", "root", "", "ninjakudeta");
            $query = "SELECT * FROM member ORDER BY id DESC";
            $result = mysqli_query($connect, $query);
            function curl($url, $headers = [], $postFields = [])
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                if (count($postFields) > 0) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
                }

                if (count($headers) > 0) {
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                }
                $result = curl_exec($ch);
                curl_close($ch);
                return [
                    'txt' => json_encode($result),
                    'json' => json_decode($result, 1)
                ];
            }


            while ($row = mysqli_fetch_array($result)) {
                $clanDataFromDB[] = $row;
            ?>
                <tr>
                    <td><?php echo $row["nick"]; ?></td>
                    <td><?php echo $row["charid"]; ?></td>
                    <td><?php echo number_format($row["reputation"]); ?></td>
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
</script>