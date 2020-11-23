<div style="padding: 25px" class="animated fadeIn">
	<?php $select=$data->detail_pengumuman($_GET['id']); ?>
	<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa  fa-users"></i></span>
					</div>
					<select name="jenis" class="form-control" aria-describedby="basic-addon1" required="">
						<option value="" disabled selected>Jenis Pengumuman</option>
						<option value="siswa" <?php if ($select['jenis']=="siswa") {
							echo "selected";
						} ?>>Siswa</option>
						<option value="guru" <?php if ($select['jenis']=="guru") {
							echo "selected";
						} ?>>Guru</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-3"><img style="width: 70px;" align="right" src="foto/<?php echo $select['img']?>" class="card-img-top img-thumbnail"></div>
					<div class="col-md-9"><input type="file" id="files" name="img" class="form-control" accept="image/png, image/jpeg"></div>
				</div>
			</div>
		</div>
		<div class="input-group mb-6">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
			</div>
			<input style="font-weight:bold; " type="text" name="title" class="form-control" placeholder="Judul Pengumuman" aria-label="nama" aria-describedby="basic-addon1" required="" value="<?php echo $select['judul'] ?>">
		</div>
		<hr>
		<textarea required class="form-control" id="editor" name="editor"><?php echo $select['isi'] ?></textarea>
		<div style="margin-top: 30px;" align="right">
			<a style="margin-right: 30px" href="index.php?halaman=pengumuman" class="btn btn-danger" ><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
			<button name="update" class="btn btn-success"><i class="fa fa-edit"></i>&nbsp;&nbsp;Update</button>
		</div>
		<?php
		if (isset($_POST['update'])) {
			$img = ($_FILES["img"]);
			$jenis = ($_POST["jenis"]);
			$title = trim($_POST["title"]);
			$body = ($_POST["editor"]);
			$date = date("d M, Y H:i:s"); 
			$id = $_GET['id'];
			$data->update_pengumuman($id,$jenis,$title,$body,$date,$img);
		} 
		?>
	</form>
</div>

<script type="text/javascript">
	CKEDITOR.replace("editor");
</script>


<script>
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({
			placement : 'top',
			trigger : 'hover'
		});
	});
</script>
