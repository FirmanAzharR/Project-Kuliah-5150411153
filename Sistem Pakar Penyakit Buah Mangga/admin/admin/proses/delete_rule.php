<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM rule WHERE id_rule ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}

?>