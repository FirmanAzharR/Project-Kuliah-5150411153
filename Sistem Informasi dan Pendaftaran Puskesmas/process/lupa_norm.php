<?php
include '../config/koneksi.php';

$nama = $_POST['nama'];
$tgl = $_POST['tgl'];

$cek = mysqli_query($koneksi,"SELECT*FROM pasien WHERE nama_pasien='$nama' AND `tanggal_lahir` = '$tgl'");
$antrian=$cek->fetch_assoc();

if ($cek) {
	echo $antrian['no_rm'];
}else{
	echo "tidak";
}

?>
