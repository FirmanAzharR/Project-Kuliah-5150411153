<?php 
session_start();

include '../config/koneksi.php';

$username = $_POST['usr'];
$u = mysqli_real_escape_string($koneksi,$username);
$password = $_POST['pass'];
$p = mysqli_real_escape_string($koneksi,$password);

$query=mysqli_query($koneksi,"SELECT COUNT(nama) as cek FROM user WHERE username='$u' AND password='$p';");
$data = $query->fetch_assoc();
if ($data['cek']>0) {
	$_SESSION['username'] = $u;
	$_SESSION['status'] = "login";
	header("location:../index.php?pesan=berhasil");
} else {
	header("location:../index.php?pesan=gagal");
}
?>