<?php
set_time_limit(0);

if (isset($_GET["type"])) {
    if (!empty($_GET["type"])) {
        getClanInfo($_GET["type"]);
    }
} else {
    exit();
}


function getClanInfo($type)
{
    rollback:
    $clandata = curlreq("https://ninjasage.id/leaderboards/clan/ajax/144?_token%20=%20Y09ev6Ys3hEXh4xIVdwkjVWt6LyF7CoCtSsODjGN", ['X-Requested-With: XMLHttpRequest']);
    $info = json_decode($clandata, true);

    if ($info["status"] != true) {
        goto rollback;
    }

    switch ($type)
    {
        case 'rank': echo getClanRank("NINJA KUDETA"); break;
        case 'reputation': echo number_format($info["clan"]["reputation"]); break;
        case 'token/gold': echo number_format($info["clan"]["tokens"])." / ".number_format($info["clan"]["golds"]); break;
        case 'totalmember': echo count($info["members"]) . " Ninjas"; break;

        case 'memberdata':

            $data = sort_array($info["members"], "reputation");
            $no = 1;
            $data_arr = array("data" => array());
            foreach ($data as $chardata) {
                $gained = $chardata["reputation"]-getMemberData($chardata["char_id"])["reputation"];
                array_push($data_arr["data"],
                    array(
                        $no,
                        $chardata["char_name"].' <b>('.$chardata["char_id"].')</b>',
                        $chardata["char_level"],
                        number_format($chardata["reputation"]),
                        number_format($chardata["gold_donated"]),
                        number_format($chardata["token_donated"]),
                        number_format(getMemberData($chardata["char_id"])["reputation"]),
                        number_format($gained),
                        $chardata["join_date"]
                    )
                );
                $no++;
            }
            header("Content-Type: application/json; charset=utf-8");
            echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
        break;

        default: echo ""; break;
    }

    return false;
}

function getClanRank($name)
{
    $curl = curlreq("https://ninjasage.id/leaderboards/clan?season=2");
    $data = str_ireplace("\n", "", $curl);
    $data = preg_replace("/<tr id=.*?>/", "\n", $data);
    preg_match_all("/.*".$name.".*/", $data, $match);
    $result = explode("</td>", explode("<td>", $match[0][0])[1])[0];

    return $result;
}

function curlreq($url, $header = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip, deflate");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

function sendquery($query)
{
    $host = 'localhost';
    $name = 'ninjakudeta_web';
    $user = 'ninjakudeta_web';
    $pass = 'Peler999!!!';

    if ($connect = mysqli_connect($host, $user, $pass, $name)) {
        return mysqli_query($connect, $query);
    } else {
        return false;
    }
}

function getMemberData($charid)
{
    $query = sendquery("SELECT * FROM member ORDER BY id DESC");
    while ($row = mysqli_fetch_array($query)) {
        $memberdata[] = $row;
    }

    $memberdata_final = [];
    foreach ($memberdata as $key) {
        $memberdata_final[$key["charid"]] = $key;
    }

    return $memberdata_final[$charid];
}

function sort_array($array, $kind)
{
    $data = array_column($array, $kind);
    array_multisort($data, SORT_DESC, $array);

    return $array;
}