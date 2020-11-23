<?php 
include '../class.php';

$peserta=$_POST['peserta'];

if (isset($_POST['peserta'])) {
$data->autosave($peserta);
}
?>