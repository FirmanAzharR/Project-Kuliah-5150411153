<?php 
//include '../config/koneksi.php';
$select = mysqli_query($koneksi,"SELECT no_antrian FROM status_antrian WHERE loket_antrian='bpgigi'");
$antrian = mysqli_fetch_object($select);

?>