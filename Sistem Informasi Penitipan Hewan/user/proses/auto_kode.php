<?php
include '../../config/koneksi.php';
$kode = "SELECT max(kode_trans) as kode FROM transaksi";

$carikode = mysqli_query($koneksi,$kode);
$tm_cari = mysqli_fetch_array($carikode);
$kd=substr($tm_cari['kode'],2,4);

$tambah=$kd+1;
if($tambah<10){
  $kode="TR00".$tambah;
  echo $kode;
}else{
  $kode="M0".$tambah;
  echo $kode;
}
?>
