<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];
$id_penyakit = $_POST['penyakit'];
$nama_rule = $_POST['rule'];
$cf_pakar = $_POST['cf'];

$upd = mysqli_query($koneksi,"UPDATE rule SET id_penyakit='$id_penyakit', nama_rule='$nama_rule', cf_pakar='$cf_pakar' WHERE id_rule ='$id'");
if ($upd) {
	echo "berhasil";
}else {
	echo "gagal";
}

?>