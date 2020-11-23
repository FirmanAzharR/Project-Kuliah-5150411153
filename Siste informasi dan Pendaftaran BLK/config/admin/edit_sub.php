<div class="row">
	<div class="col-lg-12">
		<h4 class="page-header">Edit Sub Kejuruan</h4>
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
				<?php $sub=$data->select_sub($_GET['id']) ?>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Pilih Kejuruan</label>
						<select class="form-control" id="kejuruan" name="kejuruan" class="form-group" required>
							<option value="">Pilih Kejuruan</option>
							<?php $kejuruan=$data->tampil_kejuruan()?>
							<?php foreach ($kejuruan as $key => $value): ?>
								<?php echo "<option value='".$value['id']."'"?> 
								<?php 
								if ($value['id']==$sub['id_kejuruan']) {
									echo "selected";
								}?> <?php echo ">"; ?><?php echo $value['nama']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<label>Nama Sub Kejuruan</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
						</div>
						<input type="text" class="form-control" name="nama_sub" placeholder="Kejuruan" aria-label="Kejuruan" aria-describedby="basic-addon1" value="<?php echo $sub['nama_sub'] ?>" autofocus>
					</div>
					<hr>
					<button name="edit" type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;Simpan</button>
					<a href="index.php?halaman=sub" class="btn btn-danger btn-sm"><i class="fa fa-close"></i>&nbsp;Batal</a>
					<?php 
					if (isset($_POST['edit'])) {
						$data->edit_sub($_GET['id'],$_POST['kejuruan'],$_POST['nama_sub']);
					}
					?>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		
	</div>
</div>