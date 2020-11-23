<?php 
include '../class.php';

$pend=$data->tampil_pendidikan();
?>

<option value="" disabled selected>Pilih Pendidikan</option>
<?php foreach ($pend as $key => $value): ?>
	<option value="<?php echo $value['id_pendidikan'] ?>" nama="<?php echo $value['nama_pendidikan']; ?>"><?php echo $value['nama_pendidikan']; ?></option>
<?php endforeach ?>