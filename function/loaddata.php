<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <?php
include("koneksi.php");
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
                    <span class="info-box-icon  elevation-1"><img src="dist/img/trophy.png" width="60%"></span>

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
                    <span class="info-box-icon elevation-1"><img src="dist/img/rep.png" width="60%"></i></span>

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
                    <span class="info-box-icon elevation-1"><img src="dist/img/token.png" width="60%"></span>

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
                    <span class="info-box-icon  elevation-1"><img src="dist/img/gold.png" width="60%"></span>

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
                            <tbody>
                                <?php
                                
                                $query = "SELECT * FROM member ORDER BY id DESC";
                                $result = mysqli_query($connect, $query);


                                while ($row = mysqli_fetch_array($result)) {
                                    $clanDataFromDB[] = $row;
                                }

                                $clanDataAPI = $response['json']['members'];
                                $clanDataAPI = array_map(function ($clanDataAPI) {
                                    return array(
                                        'id' => $clanDataAPI['char_id'],
                                        'name' => $clanDataAPI['char_name'],
                                        'level' => $clanDataAPI['char_level'],
                                        'rank' => $clanDataAPI['char_rank'],
                                        'reputation' => $clanDataAPI['reputation'],
                                        'gold_donate' => $clanDataAPI['gold_donated'],
                                        'token_donate' => $clanDataAPI['token_donated'],
                                        'join_date' => $clanDataAPI['join_date'],
                                    );
                                }, $clanDataAPI);
                                $clanDataFromDB = array_map(function ($clanDataFromDB) {
                                    return array(
                                        'id' => $clanDataFromDB['charid'],
                                        'reputation_db' => $clanDataFromDB['reputation'],
                                    );
                                }, $clanDataFromDB);

                                // $dataToBeInserted = array_uintersect_uassoc($clanDataAPI, $clanDataFromDB, function($a, $b){
                                //     return strcasecmp($a['id'], $b['id']);
                                // }, function($a, $b){
                                //     return (int) [$a, $b] == ['id', 'id'];
                                // });

                                // $dataToBeInserted = array_intersect_key(array_replace($clanDataAPI, $clanDataFromDB), $clanDataAPI);
                                // $dataToBeInserted = array_uintersect($clanDataAPI, $clanDataFromDB);

                                $matchesArray = []; // array which will contains matches
                                foreach ($clanDataAPI as &$cdAPI) { // loop through the elements
                                    foreach ($clanDataFromDB as &$cdDB) { // loop through the elements
                                        if($cdAPI['id'] == $cdDB['id']){
                                            $newArray = array(
                                                'id' => $cdAPI['id'],
                                                'name' => $cdAPI['name'],
                                                'level' => $cdAPI['level'],
                                                'rank' => $cdAPI['rank'],
                                                'reputation' => $cdAPI['reputation'],
                                                'gold_donate' => $cdAPI['gold_donate'],
                                                'token_donate' => $cdAPI['token_donate'],
                                                'join_date' => $cdAPI['join_date'],
                                                'reputation_db' => $cdDB['reputation_db']
                                            );
                                            array_push($matchesArray, $newArray);
                                        }
                                    }
                                }

                                foreach ($matchesArray as $k => $r) {
                                    $no = $k + 1;
                                    $id = $r['id'];
                                    $name = $r['name'];
                                    $level = $r['level'];
                                    $rank = $r['rank'];
                                    $reputation = $r['reputation'];
                                    $gold_donate = $r['gold_donate'];
                                    $token_donate = $r['token_donate'];
                                    $join_date = $r['join_date'];
                                    $reputation_db = $r['reputation_db'];

                                    echo "<tr>";
                                    echo "<td>" . $no . "</td>";
                                    echo "<td>" . $name . " <b>(" . $id . ")</b></td>";
                                    echo "<td>" . $level . " </td>";
                                    echo "<td>" . number_format($reputation) . "</td>";
                                    echo "<td>" . number_format($gold_donate) . "</td>";
                                    echo "<td>" . number_format($token_donate) . "</td>";
                                    echo "<td>" . number_format($reputation_db) . "</td>";
                                    echo "<td>" . number_format($reputation - $reputation_db) . "</td>";
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
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>