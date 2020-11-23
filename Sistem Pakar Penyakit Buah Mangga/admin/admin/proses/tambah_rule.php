
<?php 
include '../../config/koneksi.php';

$nama_rule = $_POST['nama_rule'];
$id_penyakit = $_POST['id_penyakit'];
$cf = $_POST['cf'];

$s = mysqli_query($koneksi,"INSERT INTO rule(id_penyakit,nama_rule,cf_pakar) VALUES('$id_penyakit','$nama_rule','$cf')");


?>