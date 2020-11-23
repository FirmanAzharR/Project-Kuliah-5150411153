<?php 
include '../../config/koneksi.php';
$norm = $_GET['norm'];

$ambilantrian = mysqli_query($koneksi, "SELECT no_rm, jenis_kelamin, nama_pasien, year(curdate())-year(tanggal_lahir)as umur, pekerjaan, alamat  FROM pasien WHERE no_rm='".$norm."'");
while ($anggota = mysqli_fetch_array($ambilantrian)) {
	$nomorrekmed = $anggota['no_rm'];
	$kelamin = $anggota['jenis_kelamin'];
	$nama = $anggota['nama_pasien'];
	$umur = $anggota['umur'];
	$pekerjaan = $anggota['pekerjaan'];
	$alamat = $anggota['alamat'];
}

?>