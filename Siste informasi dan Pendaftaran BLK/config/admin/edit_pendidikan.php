<div class="row">
	<div class="col-lg-12">
		<h4 class="page-header">Edit Kejuruan</h4>
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
				<?php $pendidikan=$data->select_pend($_GET['id']) ?>
				<form method="post" enctype="multipart/form-data">
					<label>Nama Pendidikan</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
						</div>
						<input type="text" class="form-control" name="nama" placeholder="Pendidikan" aria-label="Kejuruan" aria-describedby="basic-addon1" value="<?php echo $pendidikan['nama_pendidikan'] ?>" autofocus>
					</div>
					<hr>
					<button name="edit" type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;Simpan</button>
					<a href="index.php?halaman=pend" class="btn btn-danger btn-sm"><i class="fa fa-close"></i>&nbsp;Batal</a>
					<?php 
					if (isset($_POST['edit'])) {
						$data->edit_pend($_GET['id'],$_POST['nama']);
					}
					?>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		
	</div>
</div>