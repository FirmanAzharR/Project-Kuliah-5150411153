<?php 
include '../../config/koneksi.php';

$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,"UPDATE user SET nama='$nama',telepon='$telepon',email='$email',password='$password' WHERE id_user=1");

if ($query) {
	echo "berhasil";
}else{
	echo "gagal";
}

?>