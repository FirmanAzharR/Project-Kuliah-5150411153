<?php 

include '../../config/koneksi.php';

	$id_ktg = $_POST['ktg'];
	$vaksin = $_POST['vaksin'];
	$harga = $_POST['harga'];

	$add = mysqli_query($koneksi,"INSERT INTO vaksin(id_kategori_hewan,nama_vaksin,harga) VALUES('$id_ktg','$vaksin','$harga')");

	if ($add) {
		echo "berhasil";
	}else{
		echo "gagal";
	}
?>