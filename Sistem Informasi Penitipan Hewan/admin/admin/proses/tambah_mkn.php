<?php 

include '../../config/koneksi.php';

	$id_ktg = $_POST['ktg'];
	$ket = $_POST['ket'];
	$harga = $_POST['harga'];

	$add = mysqli_query($koneksi,"INSERT INTO makanan(id_kategori_hewan,keterangan,harga) VALUES('$id_ktg','$ket','$harga')");

	if ($add) {
		echo "berhasil";
	}else{
		echo "gagal";
	}
?>