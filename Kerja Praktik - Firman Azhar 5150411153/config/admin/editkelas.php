<div id="area" style="padding: 20px" class="animated fadeIn">
	<?php $select=$data->one_select($_GET['id']); ?>
	<form method="post">
		<div class="form-group">
			<label>Kelas</label>
			<select name="kelas" class="form-control" required="">
				<option value="">Pilih Kelas</option>
				<option value="X" <?php if ($select['nama_kelas']=="X") {
					echo "selected";
				} ?> >X</option>
				<option value="XI" <?php if ($select['nama_kelas']=="XI") {
					echo "selected";
				} ?>>XI</option>
				<option value="XII" <?php if ($select['nama_kelas']=="XII") {
					echo "selected";
				} ?>>XII</option>
			</select>
		</div>
		<div class="form-group">
			<label>Jurusan</label>
			<select name="jurusan" class="form-control" required="">
				<option value="">Pilih Kelas</option>
				<?php $jurusan=$data->select_jurusan()?>
				<?php foreach ($jurusan as $key => $value): ?>
					<?php echo "<option value='".$value['id_jurusan']."'"?> 
					<?php 
					if ($value['nama_jurusan']==$select['nama_jurusan']) {
						echo "selected";
					}?> <?php echo ">"; ?><?php echo $value['nama_jurusan']; ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<label>Wali Kelas</label>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
			</div>
			<select name="kode_guru" class="form-control kode_guru" aria-label="kg" aria-describedby="basic-addon1" required="">
				<option value="" disabled selected>Pilih Guru</option>
				<?php $wali=$data->select_walikelas()?>
				<?php foreach ($wali as $key => $value): ?>
					<?php echo "<option value='".$value['kode_guru']."'"?> 
					<?php 
					if ($value['nama']==$select['nama']) {
						echo "selected";
					}?> <?php echo ">"; ?><?php echo $value['nama']; ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<hr>
		<div class="form-group">
			<input type="submit" name="ubah" value="Ubah" class="btn btn-success"/>
			<?php 
			if(isset($_POST['ubah']))
			{
				$data->update_kelas($_GET['id'],$_POST['kelas'],$_POST['jurusan'],$_POST['kode_guru']);
				echo "<script>setTimeout(function () { 
					swal({
						title: 'Update Berhasil',
						type: 'success',
						showConfirmButton: false,
						timer: 800,
						});  
						},10); 
						window.setTimeout(function(){ 
							window.location.replace('index.php?halaman=kelas');
						} ,800); </script>";
					}
					?>
					<a class="btn btn-danger" href="index.php?halaman=kelas">Batal</a>
				</div>
			</form>
		</div>