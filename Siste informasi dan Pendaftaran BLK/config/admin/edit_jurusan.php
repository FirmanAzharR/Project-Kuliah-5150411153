<div class="row">
	<div class="col-lg-12">
		<h4 class="page-header">Edit Jurusan</h4>
		<hr>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">

			</div>
			<div class="panel-body">
				<?php $jurusan=$data->select_jurusan($_GET['id']) ?>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Pilih Kejuruan</label>
						<select class="form-control" name="pendidikan" class="form-group" required>
							<option value="">Pilih Pendidikan</option>
							<?php $pend=$data->tampil_pendidikan()?>
							<?php foreach ($pend as $key => $value): ?>
								<?php echo "<option value='".$value['id_pendidikan']."'"?> 
								<?php 
								if ($value['id_pendidikan']==$jurusan['id_pendidikan']) {
									echo "selected";
								}?> <?php echo ">"; ?><?php echo $value['nama_pendidikan']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<label>Nama Jurusan</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
						</div>
						<input type="text" class="form-control" name="nama" placeholder="Jurusan" aria-label="Kejuruan" aria-describedby="basic-addon1" value="<?php echo $jurusan['nama_jurusan'] ?>" autofocus>
					</div>
					<hr>
					<button name="edit" type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;Simpan</button>
					<a href="index.php?halaman=jurusan" class="btn btn-danger btn-sm"><i class="fa fa-close"></i>&nbsp;Batal</a>
					<?php 
					if (isset($_POST['edit'])) {
						$data->edit_jurusan($_GET['id'],$_POST['pendidikan'],$_POST['nama']);
					}
					?>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		
	</div>
</div>