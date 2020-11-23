<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$select = mysqli_query($koneksi,"SELECT*FROM rule_detail WHERE id ='$id'");

$data = $select->fetch_assoc();

?>

<div>
	<input type="hidden" name="kode" id="kode" class="form-control" value="<?php echo $data['id'] ?>">
	<select class="form-control" id="id_rule_x">
		<?php $variable = mysqli_query($koneksi,"SELECT*FROM rule") ?>
		<?php foreach ($variable as $key => $value): ?>
			<option value="<?php echo $value['id_rule'] ?>" <?php 
				if ($value['id_rule']==$data['id_rule'] ) {
					echo "selected";
				}
			 ?>><?php echo $value['nama_rule']; ?></option>
		<?php endforeach ?>
	</select>
	<br>
	<select class="form-control" id="id_gejala_x">
		<?php $variable = mysqli_query($koneksi,"SELECT*FROM gejala") ?>
		<?php foreach ($variable as $key => $value): ?>
			<option value="<?php echo $value['id_gejala'] ?>" <?php 
				if ($value['id_gejala']==$data['id_gejala'] ) {
					echo "selected";
				}
			 ?>>(&nbsp;<?php echo $value['id_gejala'] ?>&nbsp;) - <?php echo $value['nama_gejala']; ?></option>
		<?php endforeach ?>
	</select>
	
</div>