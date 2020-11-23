<?php 
$hasil=$data->delete_siswa($_GET['id']);
if ($hasil=="delete") {
	$data->delete_user($_GET['nis']);
}
?>

