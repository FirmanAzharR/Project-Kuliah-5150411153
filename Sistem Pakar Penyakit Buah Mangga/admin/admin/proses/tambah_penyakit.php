<?php 
include '../../config/koneksi.php';

$nama = $_POST['nama'];
$definisi = $_POST['definisi'];
$solusi = $_POST['solusi'];


$kode = "SELECT max(id_penyakit) as kode FROM penyakit";

$carikode = mysqli_query($koneksi,$kode);
$tm_cari = mysqli_fetch_array($carikode);
$kd=substr($tm_cari['kode'],2,4);

$tambah=$kd+1;
if($tambah<10){
	$kode="P00".$tambah;
	$x = $kode;
}else{
	$kode="P0".$tambah;
	$x = $kode;
}


$update = mysqli_query($koneksi,"INSERT INTO penyakit(id_penyakit,nama_penyakit,definisi,solusi) VALUES('$x','$nama','$definisi','$solusi')");

if ($update) {
	echo "berhasil";
}else{
	echo "gagal";
}




?>