<div class="container">
	<?php $date = date("Y-m-d"); ?>
	<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="page-header">Tambah Berita</h4>
				<hr>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Judul</label>
					<input autocomplete="off" type="text" name="judul" class="form-control" placeholder="Judul Berita">
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="gambar" class="form-control" value="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Tanggal</label>
							<input readonly type="text" name="tgl" class="form-control" value="<?php echo $date ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<textarea name="content" id="editor">
			
		</textarea>	
		<hr>
		<button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;Simpan</button>
		<?php 
		if (isset($_POST['simpan'])) {
			$data->tambah_berita($_POST['tgl'],$_POST['judul'],$_POST['content'],$_FILES['gambar']);
		}
		?>
	</form>
</div>

<script>
	ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.then( editor => {
		console.log( editor );
	} )
	.catch( error => {
		console.error( error );
	} );
</script>