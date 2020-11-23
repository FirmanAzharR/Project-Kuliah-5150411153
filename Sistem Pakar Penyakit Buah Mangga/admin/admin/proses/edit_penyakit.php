<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$definisi = $_POST['definisi'];
$solusi = $_POST['solusi'];

$update = mysqli_query($koneksi,"UPDATE penyakit SET nama_penyakit ='$nama',definisi='$definisi',solusi='$solusi' WHERE id_penyakit = '$id'");

if ($update) {
	echo "berhasil";
}else{
	echo "gagal";
}

?>