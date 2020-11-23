<?php 
include '../class.php';

$jur=$data->tampil_jurusan_adv($_POST['id']);
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>

<option value="" disabled selected>Pilih Sub Kejuruan</option>
<?php foreach ($jur as $key => $value): ?>
	<option value="<?php echo $value['id_jurusan'] ?>" nama="<?php echo $value['nama_jurusan']; ?>"><?php echo $value['nama_jurusan']; ?></option>
<?php endforeach ?>