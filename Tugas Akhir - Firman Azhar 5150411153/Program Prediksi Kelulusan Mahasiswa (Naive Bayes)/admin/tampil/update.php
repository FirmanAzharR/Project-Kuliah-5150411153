<?php 

include '../../config/koneksi.php';

$id = $_POST['id_mhs'];
$nim = $_POST['nim'];
$jenkel = $_POST['jenkel'];
$sks1 = $_POST['sks1'];
$sks2 = $_POST['sks2'];
$sks3 = $_POST['sks3'];
$sks4 = $_POST['sks4'];
$ipk1 = $_POST['ipk1'];
$ipk2 = $_POST['ipk2'];
$ipk3 = $_POST['ipk3'];
$ipk4 = $_POST['ipk4'];
$ket = $_POST['keterangan'];
$dt = $_POST['dt'];

if ($dt=='data_latih'){

	$query = mysqli_query($koneksi,"UPDATE data_latih SET nim='$nim',jenkel='$jenkel', sks1='$sks1', sks2='$sks2', sks3='$sks3', sks4='$sks4', ipk1='$ipk1' , ipk2='$ipk2', ipk3='$ipk3', ipk4='$ipk4', keterangan='$ket' WHERE id='$id'");
}
elseif($dt=='data_uji'){
	$query = mysqli_query($koneksi,"UPDATE data_uji SET nim='$nim',jenkel='$jenkel', sks1='$sks1', sks2='$sks2', sks3='$sks3', sks4='$sks4', ipk1='$ipk1' , ipk2='$ipk2', ipk3='$ipk3', ipk4='$ipk4', keterangan='$ket' WHERE id='$id'");
}
else{
	$query = mysqli_query($koneksi,"UPDATE data_prediksi SET nim='$nim',jenkel='$jenkel', sks1='$sks1', sks2='$sks2', sks3='$sks3', sks4='$sks4', ipk1='$ipk1' , ipk2='$ipk2', ipk3='$ipk3', ipk4='$ipk4' WHERE id='$id'");
}

?>