<div style="padding: 25px" class="animated fadeIn">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Daftar Berita</h6>
		</div>
		<div class="col-md-6">
			<button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-edit"></i>&nbsp;&nbsp;Tulis Berita</button>
		</div>
	</div>
	<hr>
	<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
		<thead>
			<tr align="center">
				<th>No</th>
				<th>Jenis</th>
				<th>Judul Berita</th>
				<th>Tanggal</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php $tampil=$data->view_berita() ?>
			<?php foreach ($tampil as $key => $value) : ?>
				<tr align="center">
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['jenis'] ?></td>
					<td style="width: 40%"><?php echo $value['judul'] ?></td>
					<td><?php echo $value['tgl'] ?></td>
					<td align="center" width="15%" >
						<a data-toggle="popover" title="Detail" data-content="Baca Berita " href="index.php?halaman=detailberita&id=<?php echo $value['id_berita'] ?>" style="color: white; margin:1px" class="btn btn-info btn-sm" role="button" title="Detail"><i class="fa fa-eye"></i></a>
						<a data-toggle="popover" title="Edit" data-content="Edit Berita " href="index.php?halaman=editberita&id=<?php echo $value['id_berita'];?>" style="color: white; margin:1px" class="btn btn-warning btn-sm" role="button" title="Edit"><i class="fa fa-edit"></i></a>
						<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deleteberita&id=<?php echo $value['id_berita'];?>" style="margin: 1px" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>	
	</div>

	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tulis Berita</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-8">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa  fa-asterisk"></i></span>
									</div>
									<select name="jenis" class="form-control" aria-describedby="basic-addon1" required="">
										<option value="" disabled selected>Jenis Berita</option>
										<option value="Pendidikan">Pendidikan</option>
										<option value="Musik">Musik</option>
										<option value="Olahraga">Olahraga</option>
										<option value="Teknologi">Teknologi</option>
										<option value="Umum">Umum</option>
										<option value="Politik">Politik</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="file" name="img" class="form-control" accept="image/png, image/jpeg">
								</div>
							</div>
						</div>
						<div class="input-group mb-6">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
							</div>
							<input type="text" autocomplete="off" name="title" class="form-control" placeholder="Judul Berita" aria-label="nama" aria-describedby="basic-addon1" required="">
						</div>

						<hr>
						<textarea required class="form-control" id="editor" name="editor"></textarea>
						<div style="margin-top: 30px;" align="right">
							<button name="save" class="btn btn-primary"><i class="fa fa-share-alt"></i>&nbsp;&nbsp;Publikasi</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>

					</form>
					<?php if (isset($_POST['save'])) {
						$img = ($_FILES["img"]);
						$title = trim($_POST["title"]);
						$body = ($_POST["editor"]);
						$jenis = ($_POST["jenis"]);
						$date = date("d M, Y H:i:s");
						$data->save_berita($jenis,$title,$body,$date,$img);
					} ?>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		CKEDITOR.replace("editor");
	</script>

	<script type="text/javascript">
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );
	</script>

	<script type="text/javascript">
		$('[data-toggle=confirmation]').confirmation({
			rootSelector: '[data-toggle=confirmation]',});
		</script>



		<script>
			$(document).ready(function(){
				$('[data-toggle="popover"]').popover({
					placement : 'top',
					trigger : 'hover'
				});
			});
		</script>