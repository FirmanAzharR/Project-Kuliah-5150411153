<?php 
include '../class.php';

$sub=$data->tampil_sub_adv($_POST['id']);
?>

<option value="" disabled selected>Pilih Sub Kejuruan</option>
<?php foreach ($sub as $key => $value): ?>
	<option value="<?php echo $value['id_sub'] ?>" nama_sub="<?php echo $value['nama_sub']; ?>"><?php echo $value['nama_sub']; ?></option>
<?php endforeach ?>