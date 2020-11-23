<?php 

	include '../../config/koneksi.php';

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];

	$delete = mysqli_query($koneksi,"UPDATE kategori_hewan SET nama_kategori_hewan='$nama', harga='$harga' WHERE id_kategori_hewan ='$id'");

	if ($delete) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

?>