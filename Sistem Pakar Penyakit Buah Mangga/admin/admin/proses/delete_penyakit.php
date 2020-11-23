<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM penyakit WHERE id_penyakit ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}

?>