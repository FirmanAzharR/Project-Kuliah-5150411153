<?php 

	include '../../config/koneksi.php';

	$id = $_POST['id'];
	$ktg = $_POST['ktg'];
	$nama = $_POST['nama'];
	$hrg = $_POST['harga'];

	$update = mysqli_query($koneksi,"UPDATE vaksin SET id_kategori_hewan='$ktg', nama_vaksin='$nama',harga='$hrg' WHERE id_vaksin ='$id'");

	if ($update) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

?>