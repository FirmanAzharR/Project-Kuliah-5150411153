<?php 
include '../../config/koneksi.php';

$titip = $_POST['titip'];
$ambil = $_POST['ambil'];
$id = $_POST['id'];

//cek pembatalan
$querycek=mysqli_query($koneksi,'SELECT COUNT(`detail_transaksi`.`id_detail`) AS cek FROM detail_transaksi INNER JOIN transaksi 
ON `detail_transaksi`.`id_transaksi` = `transaksi`.`id_transaksi` WHERE id_user="'.$id.'" AND tgl_titip="'.$titip.'" AND tgl_ambil="'.$ambil.'" ');
$count = $querycek->fetch_assoc();
$cek = $count['cek'];

if ($cek!=0) {
	echo "berhasil";
}
else{
	$query=mysqli_query($koneksi,'DELETE FROM transaksi WHERE id_user="'.$id.'" AND tgl_titip="'.$titip.'" AND tgl_ambil="'.$ambil.'" ');
	if ($query) {
		echo "berhasil";
	}else{
		echo "gagal";
	}
}

?>