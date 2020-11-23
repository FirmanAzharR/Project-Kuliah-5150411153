<?php 
session_start();

include '../config/koneksi.php';

$username = $_POST['username'];
$u = mysqli_real_escape_string($koneksi,$username);
$password = $_POST['password'];
$p = mysqli_real_escape_string($koneksi,$password);
$captcha = $_POST['captcha'];

$select = mysqli_query($koneksi,"SELECT posisi FROM login WHERE username='$u' AND password='$p';");
$data = $select->fetch_assoc();
$level = $data['posisi'];

$query=mysqli_query($koneksi,"SELECT*FROM login WHERE username='$u' AND password='$p' AND posisi = '$level';");
$login=mysqli_num_rows($query);
if ($login>0) {
	$_SESSION['username'] = $u;
	$_SESSION['level'] = $level;
	$_SESSION['status'] = "login";
	
	if ($level==1) {
		header("location:../index.php?pesan=admin");
	}
	elseif($level==2){
		header("location:../index.php?pesan=pemanggil_bp_umum");
	}
	elseif($level==3){
		header("location:../index.php?pesan=pemanggil_bp_gigi");
	}
	elseif($level==4){
		header("location:../index.php?pesan=kepala");
	}

} else {
	
	header("location:../index.php?pesan=gagal");
}
?>