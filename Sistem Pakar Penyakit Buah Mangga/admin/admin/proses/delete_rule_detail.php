<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$delete = mysqli_query($koneksi,"DELETE FROM rule_detail WHERE id ='$id'");

if ($delete) {
	echo "berhasil";
}else{
	echo "gagal";
}

?>