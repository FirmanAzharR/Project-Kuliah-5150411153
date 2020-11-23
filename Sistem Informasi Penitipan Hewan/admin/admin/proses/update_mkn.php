<?php 

	include '../../config/koneksi.php';

	$id = $_POST['id'];
	$ktg = $_POST['ktg'];
	$ket = $_POST['ket'];
	$hrg = $_POST['hrg'];

	$update = mysqli_query($koneksi,"UPDATE makanan SET id_kategori_hewan='$ktg', keterangan='$ket',harga='$hrg' WHERE id_makanan ='$id'");

	if ($update) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

?>