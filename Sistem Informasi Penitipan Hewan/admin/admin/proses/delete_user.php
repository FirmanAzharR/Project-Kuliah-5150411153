<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM user WHERE id_user ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}
?>