<?php 
$koneksi = mysqli_connect('localhost','root','','penitipan_hewan');

// Check
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>