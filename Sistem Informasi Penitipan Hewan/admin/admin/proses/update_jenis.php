<?php 

	include '../../config/koneksi.php';

	$id = $_POST['id'];
	$ktg = $_POST['ktg'];
	$jns = $_POST['jns'];

	$update = mysqli_query($koneksi,"UPDATE jenis_hewan SET id_kategori_hewan='$ktg', nama_jenis_hewan='$jns' WHERE id_jenis_hewan ='$id'");

	if ($update) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

?>