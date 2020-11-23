<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM obat_peliharaan WHERE id_obat ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}
?>