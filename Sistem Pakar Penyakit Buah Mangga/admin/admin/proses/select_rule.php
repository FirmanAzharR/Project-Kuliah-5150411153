<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$select = mysqli_query($koneksi,"SELECT*FROM rule WHERE id_rule ='$id'");

$data = $select->fetch_assoc();

?>

<div>
	<input type="hidden" name="kode" id="kode" class="form-control" value="<?php echo $data['id_rule'] ?>">
	<div class="form-groub">
		<input type="text" name="rules" id="rules" class="form-control" value="<?php echo $data['nama_rule'] ?>">
	</div>
	<br>
	<select class="form-control" id="nama_penyakitx">
		<?php $variable = mysqli_query($koneksi,"SELECT*FROM penyakit") ?>
		<?php foreach ($variable as $key => $value): ?>
			<option value="<?php echo $value['id_penyakit'] ?>" <?php 
				if ($value['id_penyakit']==$data['id_penyakit'] ) {
					echo "selected";
				}
			 ?>><?php echo $value['nama_penyakit']; ?></option>
		<?php endforeach ?>
	</select>
	<br>
	<div class="form-groub">
		<input type="number" name="cf_value" id="cf_value" class="form-control" value="<?php echo $data['cf_pakar'] ?>">
	</div>
</div>