<?php 
	include '../../config/koneksi.php';

	$update = mysqli_query($koneksi,"update status_antrian set status_antrian='Berhenti'");
	
?>