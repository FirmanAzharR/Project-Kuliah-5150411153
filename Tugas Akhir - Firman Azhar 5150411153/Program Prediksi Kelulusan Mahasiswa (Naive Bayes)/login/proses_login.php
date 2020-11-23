<?php 
session_start();

include '../config/koneksi.php';

$username = $_POST['username'];
$u = mysqli_real_escape_string($koneksi,$username);
$password = $_POST['password'];
$p = mysqli_real_escape_string($koneksi,$password);
$captcha = $_POST['captcha'];

$query=mysqli_query($koneksi,"SELECT*FROM akun WHERE email='$u' AND password='$p';");
$login=mysqli_num_rows($query);
if ($login>0) {
	$_SESSION['username'] = $u;
	$_SESSION['status'] = "login";
	header("location:../index.php?pesan=berhasil");
} else {
	header("location:../index.php?pesan=gagal");
}
?>