<?php 
include '../function/koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysqli_query($connect,"select * from login where username='$username' and password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:../member.php");
}else{
	$message = "Username dan Password Salah";
echo "<script type='text/javascript'>alert('$message');
window.location.href='index.php';
</script>";


}

?>