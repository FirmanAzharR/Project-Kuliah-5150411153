<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM makanan WHERE id_makanan ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}
?>