<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM gejala WHERE id_gejala ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}

?>