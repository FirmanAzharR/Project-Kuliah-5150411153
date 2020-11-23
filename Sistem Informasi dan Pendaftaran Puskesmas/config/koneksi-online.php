<?php 
$koneksi = mysqli_connect('localhost','sipkesm1_pradit','JagungBakar123','sipkesm1_db_sipkesmas');

// Check
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>