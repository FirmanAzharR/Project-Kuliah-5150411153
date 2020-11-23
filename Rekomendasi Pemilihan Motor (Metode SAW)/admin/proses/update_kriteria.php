<?php 
include '../../config/koneksi.php';

$kode=$_POST['kode'];
$nama=$_POST['nama'];
$atribut=$_POST['atribut'];
$bobot=$_POST['bobot'];

$update = mysqli_query($koneksi,"UPDATE data_kriteria SET nama_kriteria='$nama', atribut='$atribut', bobot='$bobot' WHERE kode_kriteria='$kode'");

if ($update) {
	echo "updated";
}else{
	echo "fail";
}

?>