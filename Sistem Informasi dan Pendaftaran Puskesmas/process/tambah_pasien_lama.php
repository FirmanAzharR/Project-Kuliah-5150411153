<?php
include '../config/koneksi.php';

$norm = $_POST['norm'];
$tgl = $_POST['tgl'];
$namapasien = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$tempatlahir = $_POST['tempatlahir'];
$tgllahir = $_POST['tgllahir'];
$jpasien = $_POST['jp'];
$tujuan = $_POST['tujuan'];
$dokter=$_POST['dokter'];
$no_jaminan=$_POST['no_jaminan'];


$cek = mysqli_query($koneksi,"SELECT no_antrian FROM pasien_berobat WHERE tujuan ='$tujuan' AND `tanggal_berobat` = CURDATE()  ORDER BY `no_antrian` DESC LIMIT 1");
$antrian=$cek->fetch_assoc();

$no = $antrian['no_antrian']+1;	

$insert_berobat = mysqli_query($koneksi,"INSERT INTO pasien_berobat(no_rm,tanggal_berobat,nama_pasien,jenis_kelamin,tempat_lahir,tanggal_lahir,jenis_pasien,no_jaminan,tujuan,no_antrian,dokter) VALUES('$norm','$tgl','$namapasien','$jenkel','$tempatlahir','$tgllahir','$jpasien','$no_jaminan','$tujuan','$no','$dokter')");

if ($insert_berobat) {
	echo "berhasil";
}else{
	echo "gagal";
}
?>
