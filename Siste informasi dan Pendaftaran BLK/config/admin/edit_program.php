<div class="row">
	<div class="col-lg-12">
		<h4 class="page-header">Edit Program</h4>
		<hr>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">

			</div>
			<div class="panel-body">
				<?php $prog=$data->select_prog($_GET['id']) ?>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Pilih Sub Kejuruan</label>
						<select class="form-control" id="sub" name="sub" class="form-group" required>
							<option value="">Pilih Sub Kejuruan</option>
							<?php $sub=$data->tampil_sub()?>
							<?php foreach ($sub as $key => $value): ?>
								<?php echo"<option value='".$value['id_sub']."'"?> 
								<?php 
								if ($value['id_sub']==$prog['id_sub']) {
									echo"selected";
								}?> <?php echo ">"; ?><?php echo $value['nama_sub']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<label>Nama Program</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
						</div>
						<input type="text" class="form-control" name="prog" placeholder="Kejuruan" aria-label="Kejuruan" aria-describedby="basic-addon1" value="<?php echo $prog['nama_program'] ?>" autofocus>
					</div>
					<hr>
					<button name="edit" type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;Simpan</button>
					<a href="index.php?halaman=prog" class="btn btn-danger btn-sm"><i class="fa fa-close"></i>&nbsp;Batal</a>
					<?php 
					if (isset($_POST['edit'])) {
						$data->edit_prog($_GET['id'],$_POST['sub'],$_POST['prog']);
					}
					?>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		
	</div>
</div>