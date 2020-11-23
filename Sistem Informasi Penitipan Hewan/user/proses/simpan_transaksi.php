<?php 

include '../../config/koneksi.php';

$titip = $_POST['tgl_titip'];
$ambil = $_POST['tgl_ambil'];

$id = $_POST['id'];

if ($titip==''||$ambil=='') {
	echo "

	<div class='alert alert-warning'>
	Lengkapi Tanggal Transaksi.
	</div>

	";
}
else{
	$query=mysqli_query($koneksi,'INSERT INTO transaksi(id_user,tgl_titip,tgl_ambil) VALUES("'.$id.'","'.$titip.'","'.$ambil.'")');
	
	if ($query) {

		$get_trx = mysqli_query($koneksi,"SELECT id_transaksi FROM transaksi WHERE id_user = $id ORDER BY(id_transaksi) DESC LIMIT 1;");
		$d_trx = $get_trx->fetch_assoc();
		$id_trx = $d_trx['id_transaksi'];
		echo $id_trx;
	}
	else{

		echo "0";
	}
}

?>