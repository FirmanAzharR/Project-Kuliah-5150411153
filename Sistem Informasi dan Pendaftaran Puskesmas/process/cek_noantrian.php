<?php
include '../config/koneksi.php';

$tujuan = $_POST['tujuan'];

$cek = mysqli_query($koneksi,"SELECT no_antrian FROM pasien_berobat WHERE tujuan ='$tujuan' AND `tanggal_berobat` = CURDATE()  ORDER BY `no_antrian` DESC LIMIT 1");
$antrian=$cek->fetch_assoc();

$no = $antrian['no_antrian']+1;	
echo $no;

?>
