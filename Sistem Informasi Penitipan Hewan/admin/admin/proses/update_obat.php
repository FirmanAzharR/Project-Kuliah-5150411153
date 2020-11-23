<?php 

	include '../../config/koneksi.php';

	$id = $_POST['id'];
	$ktg = $_POST['ktg'];
	$obat = $_POST['obat'];
	$hrg = $_POST['hrg'];

	$update = mysqli_query($koneksi,"UPDATE obat_peliharaan SET id_hewan='$ktg', nama_obat='$obat',harga='$hrg' WHERE id_obat ='$id'");

	if ($update) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

?>