<?php
include '../../config/koneksi.php';
$kode = "SELECT max(kode_motor) as kode FROM data_motor";

$carikode = mysqli_query($koneksi,$kode);
$tm_cari = mysqli_fetch_array($carikode);
$kd=substr($tm_cari['kode'],1,3);

$tambah=$kd+1;
if($tambah<10){
  $kode="M00".$tambah;
  echo $kode;
}else{
  $kode="M0".$tambah;
  echo $kode;
}
?>
