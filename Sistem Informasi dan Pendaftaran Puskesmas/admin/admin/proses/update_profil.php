<?php 
	include '../../config/koneksi.php';
	$usr = $_POST['usr'];
	$nama = $_POST['nama'];
	$pass = $_POST['pass'];
	$id = $_POST['id'];

	$qry = mysqli_query($koneksi,"UPDATE login SET nama='$nama',username = '$usr', password = '$pass' WHERE id_login='$id'");
?>