<?php
include("koneksi.php");
if (isset($_POST["employee_id"])) {
  $output = '';
  $query = "
    DELETE from candidate where id = '" . $_POST["employee_id"] . "'
    ";
  if (mysqli_query($connect, $query)) {
    $output .= 'Data Berhasil Dihapus';
  } else {
    $output .= mysqli_error($connect);
  }
  echo $output;
}
