<?php 
include '../class.php';

$prog=$data->tampil_prog_adv($_POST['id']);
echo "<pre>";
print_r($_POST);
echo "</pre>";

?>

<option value="" disabled selected>Pilih Program</option>
<?php foreach ($prog as $key => $value): ?>
	<option value="<?php echo $value['id_program'] ?>" nama_prog="<?php echo $value['nama_program']; ?>"><?php echo $value['nama_program']; ?></option>
<?php endforeach ?>