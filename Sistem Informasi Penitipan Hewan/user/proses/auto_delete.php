<?php 
include '../../config/koneksi.php';

//pembatalan
$detail=mysqli_query($koneksi,"SELECT `detail_transaksi`.`id_detail` FROM `detail_transaksi` INNER JOIN `transaksi` ON 
	`detail_transaksi`.`id_transaksi`=`transaksi`.`id_transaksi` WHERE `transaksi`.`tgl_titip`<>CURDATE() AND `transaksi`.`status`=0;");
$jml=$detail->num_rows;
$update_kandang=mysqli_query($koneksi,"UPDATE stok_kandang SET jumlah_stok = jumlah_stok+'$jml'");

$delete=mysqli_query($koneksi,"DELETE `detail_transaksi`,`transaksi` FROM `detail_transaksi` INNER JOIN `transaksi` ON 
	`detail_transaksi`.`id_transaksi`=`transaksi`.`id_transaksi` WHERE `transaksi`.`tgl_titip`<>CURDATE() AND `transaksi`.`status`=0;");

?>