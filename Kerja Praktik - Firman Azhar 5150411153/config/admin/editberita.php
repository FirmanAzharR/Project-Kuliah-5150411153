<div style="padding: 25px" class="animated fadeIn">
	<?php $select=$data->detail_berita($_GET['id']); ?>
	<form method="post" enctype="multipart/form-data">
		<h4>Edit Berita</h4>
		<hr>
		<div class="row">
			<div class="col-md-7">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa  fa-users"></i></span>
					</div>
					<select name="jenis" class="form-control" aria-describedby="basic-addon1" required="">
						<option value="" disabled selected>Jenis Pengumuman</option>
						<option value="Pendidikan" <?php if ($select['jenis']=="Pendidikan") {
							echo "selected";
						} ?>>Pendidikan</option>
						<option value="Musik" <?php if ($select['jenis']=="Musik") {
							echo "selected";
						} ?>>Musik</option>
						<option value="Olahraga" <?php if ($select['jenis']=="Olahraga") {
							echo "selected";
						} ?>>Olahraga</option>
						<option value="Teknologi" <?php if ($select['jenis']=="Teknologi") {
							echo "selected";
						} ?>>Teknologi</option>
						<option value="Umum" <?php if ($select['jenis']=="Umum") {
							echo "selected";
						} ?>>Umum</option>	
						<option value="Politik" <?php if ($select['jenis']=="Politik") {
							echo "selected";
						} ?>>Politik</option>
					</select>
				</div>
			</div>
			<div class="col-md-5">
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
			$title = trim($_POST["title"]);
			$body = ($_POST["editor"]);
			$jenis = ($_POST["jenis"]);
			$date = date("d M, Y H:i:s"); 
			$id = $_GET['id'];
			$data->update_berita($id,$jenis,$title,$body,$date,$img);
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
