<?php

error_reporting(0);
set_time_limit(0);

getClanInfo("rank");
echo "\r\n";
getClanInfo("reputation");
echo "\r\n";
getClanInfo("token/gold");
echo "\r\n";
getClanInfo("totalmember");
echo "\r\n";
getClanInfo("memberdata");
echo "\r\n";


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
		case 'reputation': echo $info["clan"]["reputation"]; break;
		case 'token/gold': echo $info["clan"]["tokens"]."/".$info["clan"]["golds"]; break;
		case 'totalmember': echo count($info["members"]); break;

		case 'memberdata':

			$data = sort_array($info["members"], "reputation");
			$no = 1;
			foreach ($data as $chardata) {
				$gained = $chardata["reputation"]-getMemberData($chardata["char_id"])["reputation"];
				echo ' 	<tr>
		                	<td>'.$no.'</td>
		                	<td>'.$chardata["char_name"].' <b>('.$chardata["char_id"].')</b>
		                	</td>
		                	<td>'.$chardata["char_level"].'</td>
		                	<td>'.$chardata["reputation"].'</td>
		                	<td>'.$chardata["gold_donated"].'</td>
		                	<td>'.$chardata["token_donated"].'</td>
		                	<td>'.getMemberData($chardata["char_id"])["reputation"].'</td>
		                	<td>'.$gained.'</td>
		                	<td>'.$chardata["join_date"].'</td>
	                	</tr>';
	            $no++;
			}

		break;
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