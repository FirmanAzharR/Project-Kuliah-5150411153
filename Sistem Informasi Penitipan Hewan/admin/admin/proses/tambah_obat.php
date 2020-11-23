<?php 

include '../../config/koneksi.php';

	$id_ktg = $_POST['ktg'];
	$obat = $_POST['obat'];
	$harga = $_POST['hrg'];

	$add = mysqli_query($koneksi,"INSERT INTO obat_peliharaan(id_hewan,nama_obat,harga) VALUES('$id_ktg','$obat','$harga')");

	if ($add) {
		echo "berhasil";
	}else{
		echo "gagal";
	}
?>