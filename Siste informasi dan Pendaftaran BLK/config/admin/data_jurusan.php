<?php 
include '../class.php';

$jur=$data->tampil_jurusan_adv($_POST['id_pend']);
?>

<option value="" disabled selected>Pilih Sub Kejuruan</option>
<?php foreach ($jur as $key => $value): ?>
	<?php echo "<option value='".$value['id_jurusan']."'"?> 
	<?php 
	if ($value['id_jurusan']==$_POST['id_jrsn']) {
		echo "selected";
	}?> <?php echo ">"; ?><?php echo $value['nama_jurusan']; ?></option>
<?php endforeach ?>