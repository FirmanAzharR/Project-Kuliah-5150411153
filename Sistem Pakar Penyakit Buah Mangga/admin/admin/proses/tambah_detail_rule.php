
<?php 
include '../../config/koneksi.php';

$id_rule = $_POST['id_rule'];
$id_gejala = $_POST['id_gejala'];

$s = mysqli_query($koneksi,"INSERT INTO rule_detail(id_rule,id_gejala) VALUES('$id_rule','$id_gejala')");


?>