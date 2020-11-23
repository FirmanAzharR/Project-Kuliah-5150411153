<?php
include '../config/koneksi.php';

$norm = $_POST['norm'];

$cek = mysqli_query($koneksi,"SELECT COUNT(no_rm) as cek FROM pasien_berobat WHERE no_rm='$norm' AND `tanggal_berobat` = CURDATE() AND STATUS='Belum Selesai'");
$antrian=$cek->fetch_assoc();

if ($antrian['cek']==1) {
	echo "ada";
}else{
	echo "tidak";
}

?>
