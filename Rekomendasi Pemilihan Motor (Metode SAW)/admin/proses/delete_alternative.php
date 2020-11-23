<?php 
include '../../config/koneksi.php';

$kode = $_POST['kode'];

$query = mysqli_query($koneksi,"SELECT gambar FROM data_motor WHERE kode_motor='$kode'");
$data_lama = $query->fetch_assoc();
$foto_lama = $data_lama['gambar'];

$spek = mysqli_query($koneksi,"DELETE FROM spesifikasi_motor WHERE kode_motor='$kode'");
if($spek){
	$motor = mysqli_query($koneksi,"DELETE FROM data_motor WHERE kode_motor='$kode'");

	if(file_exists("../img/$foto_lama")){
		unlink("../img/$foto_lama");
	}

	echo "berhasil";
}else{
	echo "gagal";
}

?>