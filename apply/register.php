<?php
include("../function/koneksi.php");
if (!empty($_POST)) {
	$output = '';
	$nick = mysqli_real_escape_string($connect, $_POST["nick"]);
	$charid = mysqli_real_escape_string($connect, $_POST["charid"]);
	$token = mysqli_real_escape_string($connect, $_POST["token"]);
	$onigiri = mysqli_real_escape_string($connect, $_POST["onigiri"]);
	$discord = mysqli_real_escape_string($connect, $_POST["discord"]);
	$nowa = mysqli_real_escape_string($connect, $_POST["nowa"]);
	$player = mysqli_real_escape_string($connect, $_POST["pchp"]);
	$macro = mysqli_real_escape_string($connect, $_POST["macro"]);
	$query = "
    INSERT INTO candidate(nick, charid, discord, token,nowa,onigiri,pchp,macro, status)  
     VALUES('$nick', '$charid', '$discord', '$token','$nowa','$onigiri','$player','$macro','pending')
    ";
	if (mysqli_query($connect, $query)) {
		$output .= 'Registrasi Berhasil';
	} else {
		$output .= mysqli_error($connect);
	}
	echo $output;
}
?>
