<?php 
$koneksi = mysqli_connect('localhost','root','','manggaa_db');

// Check
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>