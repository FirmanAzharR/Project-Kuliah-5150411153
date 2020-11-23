<?php 

include '../../config/koneksi.php';

$id = $_POST['id_mhs'];
$dt = $_POST['dt'];

if ($dt=='data_latih'){

	$query = mysqli_query($koneksi,"DELETE FROM data_latih WHERE id='$id'");

	if ($query) {
		echo "berhasil";
	}else{
		echo "gagal";
	}
}
elseif($dt=='data_uji'){
	$query = mysqli_query($koneksi,"DELETE FROM data_uji WHERE id='$id'");
}
else{
	$query = mysqli_query($koneksi,"DELETE FROM data_prediksi WHERE id='$id'");
}

?>