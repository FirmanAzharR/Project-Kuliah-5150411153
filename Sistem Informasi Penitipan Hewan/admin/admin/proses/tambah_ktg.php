<?php 

	include '../../config/koneksi.php';

	$nama = $_POST['nama'];
	$harga = $_POST['harga'];

	$id = mysqli_query($koneksi,"SELECT id_kategori_hewan FROM kategori_hewan ORDER BY(id_kategori_hewan) DESC LIMIT 1;");
	$dt= $id->fetch_assoc();
	$id_ktg = $dt['id_kategori_hewan'] + 1;

	$add = mysqli_query($koneksi,"INSERT INTO kategori_hewan(id_kategori_hewan,nama_kategori_hewan,harga) VALUES('$id_ktg','$nama','$harga')");

	if ($add) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

?>