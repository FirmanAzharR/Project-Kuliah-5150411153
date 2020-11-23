<?php 

include '../../config/koneksi.php';

	$id = $_POST['id'];
	$jenis = $_POST['jns'];

	$add = mysqli_query($koneksi,"INSERT INTO jenis_hewan(id_kategori_hewan,nama_jenis_hewan) VALUES('$id','$jenis')");

	if ($add) {
		echo "berhasil";
	}else{
		echo "gagal";
	}
?>