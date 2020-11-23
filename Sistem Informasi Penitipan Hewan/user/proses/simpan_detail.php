<?php 

include '../../config/koneksi.php';
error_reporting(0);
$ktg = $_POST['ktg'];
$jns = $_POST['jns'];
$mkn = $_POST['food'];
$id_trx = $_POST['trx'];
$grooming = $_POST['jwb'];
$ukuran = $_POST['ukuran'];
$obat = $_POST['obat'];
$vaksin = $_POST['vaksin'];
$bayar = $_POST['hrg'];
$kode = $_POST['kode'];

$update = mysqli_query($koneksi,"UPDATE transaksi SET kode_trans='$kode' WHERE id_transaksi='$id_trx'");

if ($ktg==1) {
	$nama = 'kucing';
}else{
	$nama = 'anjing';
}

if ($grooming==1) {

	$query = mysqli_query($koneksi,"INSERT INTO detail_transaksi(id_transaksi,id_kategori,id_jenis,makanan,ukuran_hewan,obat,vaksin,bayar) VALUES('$id_trx','$ktg','$jns','$mkn','$ukuran','$obat','$vaksin','$bayar')");

	if($query){
		$select = mysqli_query($koneksi,"SELECT id_detail FROM detail_transaksi WHERE id_transaksi='$id_trx' ORDER BY(id_detail) DESC LIMIT 1");
		$id_detail = $select->fetch_assoc();
		$query = mysqli_query($koneksi,"UPDATE stok_kandang SET sisa=(sisa-1) WHERE nama='$nama'");
		echo $id_detail['id_detail'];
	}else{
		echo "gagal";
	}

}else{

	$query = mysqli_query($koneksi,"INSERT INTO detail_transaksi(id_transaksi,id_kategori,id_jenis,makanan,bayar) VALUES('$id_trx','$ktg','$jns','$mkn','$bayar')");

	if($query){
		$select = mysqli_query($koneksi,"SELECT id_detail FROM detail_transaksi WHERE id_transaksi='$id_trx' ORDER BY(id_detail) DESC LIMIT 1");
		$id_detail = $select->fetch_assoc();
		$query = mysqli_query($koneksi,"UPDATE stok_kandang SET sisa=(sisa-1) WHERE nama='$nama'");

		echo $id_detail['id_detail'];

	}else{

		echo "gagal";

	}
}

?>