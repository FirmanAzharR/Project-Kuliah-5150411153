<?php
include '../config/koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$isi = $_POST['isi'];
$date = date("Y-m-d");

$insert = mysqli_query($koneksi,"INSERT kritik_saran(nama,email,isi_aduan,tgl_aduan) VALUES('$nama','$email','$isi','$date')");

if ($insert) {
	echo "berhasil";
}else{
	echo "gagal";
}

?>
