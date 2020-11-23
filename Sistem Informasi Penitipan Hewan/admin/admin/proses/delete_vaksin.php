<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM vaksin WHERE id_vaksin ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}
?>