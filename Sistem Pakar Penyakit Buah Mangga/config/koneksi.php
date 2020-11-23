<?php 
	$koneksi = mysqli_connect("127.0.0.1","root","","manggaa_db");

	if ($koneksi) {
		
	}else{
		echo "<script>alert('koneksi gagal , cek database')</script>";
	}
?>
