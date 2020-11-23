<?php 
include '../class.php';

$sub=$data->tampil_sub_adv($_POST['id_kejuruan']);
?>

<option value="" disabled selected>Pilih Sub Kejuruan</option>
<?php foreach ($sub as $key => $value): ?>
	<?php echo "<option value='".$value['id_sub']."'"?> 
	<?php 
	if ($value['id_sub']==$_POST['id_subkejuruan']) {
		echo "selected";
	}?> <?php echo ">"; ?><?php echo $value['nama_sub']; ?></option>
<?php endforeach ?>