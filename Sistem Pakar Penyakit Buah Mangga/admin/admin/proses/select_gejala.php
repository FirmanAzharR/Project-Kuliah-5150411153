<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$select = mysqli_query($koneksi,"SELECT*FROM gejala WHERE id_gejala ='$id'");

$data = $select->fetch_assoc();

?>

<div>
	<input type="hidden" name="kode" id="kode" class="form-control" value="<?php echo $data['id_gejala'] ?>">
	<div class="form-groub">
		<input type="text" name="gejala" id="gejala" class="form-control" value="<?php echo $data['nama_gejala'] ?>">
	</div>
</div>