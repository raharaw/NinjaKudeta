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

  $query = "
    update member set nick = '$nick', charid = '$charid', token ='$token', onigiri ='$onigiri',discord ='$discord' ,nowa ='$nowa',pchp ='$player',macro ='$macro', finalday ='$finalday', warn ='$warn' where id = '$_POST[id]'
    ";
  if (mysqli_query($connect, $query)) {
    $output .= 'Data Berhasil Disimpan';
  } else {
    $output .= mysqli_error($connect);
  }
  echo $output;
}
?>