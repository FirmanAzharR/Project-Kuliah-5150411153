<?php
include '../../config/koneksi.php';

$tgl = $_POST['tgl'];
$namapasien = $_POST['namapasien'];
$namakk = $_POST['namakk'];
$jenkel = $_POST['jenkel'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$tempatlahir = $_POST['tempatlahir'];
$tgllahir = $_POST['tgllahir'];
$agama = $_POST['agama'];

$insert_pasien = mysqli_query($koneksi,"INSERT INTO pasien(tanggal_daftar,nama_pasien,jenis_kelamin,nama_kk,pekerjaan,alamat,tempat_lahir,tanggal_lahir,agama) VALUES('$tgl','$namapasien','$jenkel','$namakk ','$pekerjaan','$alamat','$tempatlahir','$tgllahir','$agama')");
if ($insert_pasien) {
	header("location:../index.php?halaman=pasien");
}
else{
	echo "eror";
}

?>
