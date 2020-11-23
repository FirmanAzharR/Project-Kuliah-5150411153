<?php 

include '../../config/koneksi.php';

$id = $_POST['id'];

$cek = mysqli_query($koneksi,"SELECT tgl_titip FROM transaksi WHERE id_transaksi='$id'");
$tgl = $cek->fetch_assoc();

$date_now = date("Y-m-d");

if ($tgl['tgl_titip']==$date_now) {

	$update = mysqli_query($koneksi,"UPDATE transaksi SET status=1 WHERE id_transaksi='$id'");

	if ($update) {
		echo "berhasil";
	}else{
		echo "gagal";
	}
}
else{
	echo "tanggal";
}
?>