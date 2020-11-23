<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM kategori_hewan WHERE id_kategori_hewan ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}
?>