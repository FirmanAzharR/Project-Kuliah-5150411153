
<?php 
include '../../config/koneksi.php';

$nama = $_POST['gejala'];

$kode = "SELECT max(id_gejala) as kode FROM gejala";
$carikode = mysqli_query($koneksi,$kode);
$tm_cari = mysqli_fetch_array($carikode);
$kd=substr($tm_cari['kode'],2,4);
$tambah=$kd+1;
if($tambah<10){
	$kode="G00".$tambah;
	$x = $kode;
}else{
	$kode="G0".$tambah;
	$x = $kode;
}

$s = mysqli_query($koneksi,"INSERT INTO gejala(id_gejala,nama_gejala) VALUES('$x','$nama')");

?>