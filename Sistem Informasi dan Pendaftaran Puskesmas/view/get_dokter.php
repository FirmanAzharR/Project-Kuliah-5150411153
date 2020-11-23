<?php 
	include '../config/koneksi.php';

	$data = $_POST['data'];

	if ($data) {
		$select = mysqli_query($koneksi,"SELECT*FROM dokter where id_loket='$data' and status=1");
	}
?>
<br>
<label>Dokter</label>
<select class="form-control" id="dokter-x" name="dokterx">
	<option value="" disabled selected>Pilih Dokter</option>
	<?php foreach ($select as $key => $value): ?>
		<option value="<?php echo $value['nama_dokter'] ?>"><?php echo $value['nama_dokter']; ?></option>
	<?php endforeach ?>
</select>