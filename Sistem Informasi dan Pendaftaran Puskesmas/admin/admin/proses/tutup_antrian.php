<?php 
	include '../../config/koneksi.php';

	mysqli_query($koneksi,"update status_antrian set status_antrian='Berhenti'");
	mysqli_query($koneksi,"update dokter set status='0'");
	
?>