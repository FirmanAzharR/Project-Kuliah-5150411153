<?php 

	include '../../config/koneksi.php';

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$delete = mysqli_query($koneksi,"UPDATE user SET nama='$nama', alamat='$alamat',no_telp='$telepon',email='$email',username='$user',password='$pass' WHERE id_user ='$id'");

	if ($delete) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

?>