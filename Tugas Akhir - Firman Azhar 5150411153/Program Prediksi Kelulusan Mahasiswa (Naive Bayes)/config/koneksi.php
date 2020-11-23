<?php 
$koneksi = mysqli_connect('localhost','root','','prediksi_kelulusan');

// Check
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>