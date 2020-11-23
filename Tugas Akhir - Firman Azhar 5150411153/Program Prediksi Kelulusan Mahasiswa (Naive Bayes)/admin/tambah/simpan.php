<?php 

include '../../config/koneksi.php';
$pilih = $_POST['pilih'];
$nim = $_POST['nim'];
$jenkel = $_POST['jenkel'];
$sks1 = $_POST['sks1'];
$sks2 = $_POST['sks2'];
$sks3 = $_POST['sks3'];
$sks4 = $_POST['sks4'];
$ipk1 = $_POST['ipk1'];
$ipk2 = $_POST['ipk2'];
$ipk3 = $_POST['ipk3'];
$ipk4 = $_POST['ipk4'];
$keterangan = $_POST['keterangan'];

if ($pilih=='data_latih') {

	$query = mysqli_query($koneksi,"INSERT INTO data_latih(nim,jenkel,sks1,sks2,sks3,sks4,ipk1,ipk2,ipk3,ipk4,keterangan) VALUES('$nim','$jenkel','$sks1','$sks2','$sks3','$sks4','$ipk1','$ipk2','$ipk3','$ipk4','$keterangan')")or die(mysqli_error($koneksi));
	if ($query) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

}else{
	$query = mysqli_query($koneksi,"INSERT INTO data_uji(nim,jenkel,sks1,sks2,sks3,sks4,ipk1,ipk2,ipk3,ipk4,keterangan) VALUES('$nim','$jenkel','$sks1','$sks2','$sks3','$sks4','$ipk1','$ipk2','$ipk3','$ipk4','$keterangan')")or die(mysqli_error($koneksi));
	if ($query) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

}

?>