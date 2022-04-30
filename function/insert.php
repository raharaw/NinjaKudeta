<?php
include("koneksi.php");
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
  $finalday = mysqli_real_escape_string($connect, $_POST["finalday"]);
  $warn = mysqli_real_escape_string($connect, $_POST["warn"]);
    $rep = 0;
  $query = "
    INSERT INTO member(nick, charid, discord, token,nowa,onigiri,pchp,macro,finalday,warn,reputation)  
     VALUES('$nick', '$charid', '$discord', '$token','$nowa','$onigiri','$player','$macro','$finalday','$warn','$rep')
    ";
  if (mysqli_query($connect, $query)) {
    $output .= 'Data Berhasil Disimpan';
  } else {
    $output .= mysqli_error($connect);
  }
  echo $output;
}
?>