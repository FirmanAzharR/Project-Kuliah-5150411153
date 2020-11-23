<?php 

include '../../config/koneksi.php';

	$id = $_POST['id'];

	$select = mysqli_query($koneksi,"SELECT id_kategori FROM detail_transaksi WHERE `detail_transaksi`.`id_transaksi`='$id'");
	foreach ($select as $key => $value) {
		
		if ($value['id_kategori']==1) {
			$update_stok = mysqli_query($koneksi,"UPDATE stok_kandang SET sisa=sisa+1 WHERE nama='kucing'");
		}else{
			$update_stok = mysqli_query($koneksi,"UPDATE stok_kandang SET sisa=sisa+1 WHERE nama='anjing'");
		}
	}

	$update = mysqli_query($koneksi,"UPDATE transaksi SET status=2 WHERE id_transaksi='$id'");

	if ($update) {
		echo "berhasil";
	}else{
		echo "gagal";
	}
?>