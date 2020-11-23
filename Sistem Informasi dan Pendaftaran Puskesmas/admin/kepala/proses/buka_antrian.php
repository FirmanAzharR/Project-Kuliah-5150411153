<?php 
	include '../../config/koneksi.php';
	$get_date = date("Y-m-d");
	$update = mysqli_query($koneksi,"update status_antrian set status_antrian='Berjalan', tanggal_mulai='$get_date' WHERE loket_antrian='bpgigi' ");
	$update2 = mysqli_query($koneksi,"update status_antrian set status_antrian='Berjalan', tanggal_mulai='$get_date' WHERE loket_antrian='bpumum' ");
	
?>