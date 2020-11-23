<?php 
	include '../../config/koneksi.php';

	$id = $_POST['id'];

	$dl = mysqli_query($koneksi,"DELETE FROM login WHERE id_login = $id");

 ?>