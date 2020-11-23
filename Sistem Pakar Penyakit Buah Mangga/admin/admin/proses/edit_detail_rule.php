<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];
$id_rule = $_POST['id_rule'];
$id_gejala = $_POST['id_gejala'];

$upd = mysqli_query($koneksi,"UPDATE rule_detail SET id_rule='$id_rule', id_gejala='$id_gejala' WHERE id ='$id'");
if ($upd) {
	echo "berhasil";
}else {
	echo "gagal";
}

?>