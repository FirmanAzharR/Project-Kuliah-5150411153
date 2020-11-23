<?php 
include '../class.php';

$prog=$data->tampil_prog_adv($_POST['id_sub']);
?>

<option value="" disabled selected>Pilih Program</option>
<?php foreach ($prog as $key => $value): ?>
	<?php echo "<option value='".$value['id_program']."'"?> 
	<?php 
	if ($value['id_program']==$_POST['id_prog']) {
		echo "selected";
	}?> <?php echo ">"; ?><?php echo $value['nama_program']; ?></option>
<?php endforeach ?>