<?php 
include '../../config/koneksi.php';

$id = $_POST['id'];

$select = mysqli_query($koneksi,"SELECT*FROM penyakit WHERE id_penyakit ='$id'");

$data = $select->fetch_assoc();

?>

<div>
	<input type="hidden" name="kode" id="kode" class="form-control" value="<?php echo $data['id_penyakit'] ?>">
	<div class="form-groub">
		<input type="text" name="penyakit" id="penyakit" class="form-control" value="<?php echo $data['nama_penyakit'] ?>">
	</div>
	<br>
	<textarea class="form-control" name="definisi" id="definisi"><?php echo $data['definisi'] ?></textarea>
	<br>
	<textarea class="form-control" name="solusi" id="solusi"><?php echo $data['solusi'] ?></textarea>
</div>