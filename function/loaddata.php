<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <?php

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

            $response = curl('https://ninjasage.id/leaderboards/clan/ajax/144?_token%20=%20Y09ev6Ys3hEXh4xIVdwkjVWt6LyF7CoCtSsODjGN', ['X-Requested-With: XMLHttpRequest']);
            $clanID = $response['json']['clan']['id'];
            $clanName = $response['json']['clan']['name'];
            $clanReputation = $response['json']['clan']['reputation'];
            $clanTokens = $response['json']['clan']['tokens'];
            $clanGolds = $response['json']['clan']['golds'];

            ?>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Clan Rank</span>
                        <span class="info-box-number">
                            <small>#</small>
                            1
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Reputation(s)</span>
                        <span class="info-box-number"><?php echo number_format($clanReputation); ?></span>
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
                    <span class="info-box-icon bg-success elevation-1"><img src="dist/img/token.png" width="60%"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Token(s)</span>
                        <span class="info-box-number"><?php echo number_format($clanTokens); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><img src="dist/img/gold.png" width="60%"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Gold(s)</span>
                        <span class="info-box-number"><?php echo number_format($clanGolds); ?></span>
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

                        <div class="card-tools" style="padding-right: 1rem;">
                            <button type="button" class="btn btn-block btn-outline-primary btn-xs" style="margin: 0 0.5rem">Sync Data
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name (ID)</th>
                                    <th>Level</th>
                                    <th>Reputation(s)</th>
                                    <th>Gold Donated</th>
                                    <th>Token Donated</th>
                                    <th>Join Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($response['json']['members'] as $k => $r) {
                                    $no = $k + 1;
                                    $id = $r['char_id'];
                                    $name = $r['char_name'];
                                    $level = $r['char_level'];
                                    $rank = $r['char_rank'];
                                    $reputation = $r['reputation'];
                                    $gold_donate = $r['gold_donated'];
                                    $token_donate = $r['token_donated'];
                                    $join_date = $r['join_date'];

                                    echo "<tr>";
                                    echo "<td>" . $no . "</td>";
                                    echo "<td>" . $name . " <b>(" . $id . ")</b></td>";
                                    echo "<td>" . $level . " </td>";
                                    echo "<td>" . $reputation . "</td>";
                                    echo "<td>" . $gold_donate . "</td>";
                                    echo "<td>" . $token_donate . "</td>";
                                    echo "<td>" . $join_date . "</td>";
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