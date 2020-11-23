<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];
$hrg = $_POST['harga'];

$upd = mysqli_query($koneksi,"UPDATE ukuran_hewan SET harga_ukuran='$hrg' WHERE id_ukuran ='$id'");

if ($upd) {
	echo "berhasil";
}else{
	echo "gagal";
}
?>