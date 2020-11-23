<?php 
include '../../config/koneksi.php';
$data=$_POST['tipe'];
$sql=mysqli_query($koneksi,"DELETE FROM ".$data."")or die(mysqli_error($koneksi));
if ($data=='data_latih') {
	echo '<div style="text-align: center;color: #DC3545;">
	<i class="fa fa-close"></i>&nbsp;Data Latih
	</div>';
}
elseif ($data=='data_latih') {
	echo '<div style="text-align: center;color: #DC3545;">
	<i class="fa fa-close"></i>&nbsp;Data Uji
	</div>';
}
else{
echo '<div style="text-align: center;color: #DC3545;">
	<i class="fa fa-close"></i>&nbsp;Data Prediksi
	</div>';
}
?>