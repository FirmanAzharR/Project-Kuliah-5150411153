<?php 
include '../../config/koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$akses = $_POST['akses'];

	$update = mysqli_query($koneksi,"update login set username='$user',nama='$nama',password='$pass',posisi='$akses' WHERE id_login='$id'");

?>