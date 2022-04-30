<?php
function sync_data()
{
    include("koneksi.php");
  
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
    }

    $response = curl('https://ninjasage.id/leaderboards/clan/ajax/144?_token%20=%20Y09ev6Ys3hEXh4xIVdwkjVWt6LyF7CoCtSsODjGN', ['X-Requested-With: XMLHttpRequest']);
    $clanDataAPI = $response['json']['members'];
    $output = '';
    $clanDataAPI = array_map(function ($clanDataAPI) {
        return array(
            'id' => $clanDataAPI['char_id'],
            'reputation_api' => $clanDataAPI['reputation'],
        );
    }, $clanDataAPI);
    $clanDataFromDB = array_map(function ($clanDataFromDB) {
        return array(
            'id' => $clanDataFromDB['id']
        );
    }, $clanDataFromDB);
    // $clanDataAPI[0]['reputation_api'] = 1996;
    $dataToBeInserted = array_intersect_key(array_replace($clanDataFromDB, $clanDataAPI), $clanDataFromDB);


    foreach ($dataToBeInserted as $id => $content) {
        $data_id = $content['id'];
        $data_rep = $content['reputation_api'];
        $query2 = "UPDATE member SET reputation = '$data_rep' WHERE charid = '$data_id'";
        if (mysqli_query($connect, $query2)) {
            $output = 'Data Berhasil Disimpan';
        } else {
            $output = mysqli_error($connect);
        }
    }

    echo $output;
}
sync_data();
?>
