<?php 
include '../../config/koneksi.php';
$norm = $_GET['norm'];

$update = mysqli_query($koneksi,"UPDATE pasien_berobat SET status='Gagal' WHERE  no_rm='$norm' AND tanggal_berobat=CURDATE() AND tujuan='bpumum'");

header("Location:../index.php?halaman=tunda");

?>