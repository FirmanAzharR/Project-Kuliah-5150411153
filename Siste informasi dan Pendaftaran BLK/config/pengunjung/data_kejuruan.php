<?php 
include '../class.php';

$kejuruan=$data->tampil_kejuruan();
?>

<option value="" disabled selected>Pilih Kejuruan</option>
<?php foreach ($kejuruan as $key => $value):?>
	<option value="<?php echo $value['id']; ?>" nama="<?php echo $value['nama']; ?>"><?php echo $value['nama']; ?></option>
<?php endforeach ?>