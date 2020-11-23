<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM jenis_hewan WHERE id_jenis_hewan ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}
?>