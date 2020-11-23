<?php 
// include '../../config/koneksi.php';

// $id = $_POST['id_trx']; 

// //cek_jumlah detail
// $detail=mysqli_query($koneksi,"SELECT*FROM detail_transaksi WHERE id_transaksi = '$id'");
// $jml=$detail->num_rows;

// //pembatalan
// $delete_detail=mysqli_query($koneksi,"DELETE FROM detail_transaksi WHERE id_transaksi = '$id'");

// $delete_transaksi=mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_transaksi = '$id'");


// if ($delete_detail&$delete_transaksi) {
// 	$update_kandang=mysqli_query($koneksi,"UPDATE stok_kandang SET jumlah_stok = jumlah_stok+'$jml'");
// 	echo "berhasil";
// }
// else{
// 	echo "gagal";
// }

?>

<?php 

include '../../config/koneksi.php';

	$id = $_POST['id_trx'];

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