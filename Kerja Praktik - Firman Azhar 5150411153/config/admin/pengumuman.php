<div style="padding: 25px" class="animated fadeIn">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Daftar Pengumuman</h6>
		</div>
		<div class="col-md-6">
			<?php if ($_SESSION['hak_akses']=='admin'): ?>
			<button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-edit"></i>&nbsp;&nbsp;Tulis Pengumuman</button>
		<?php endif ?>
		</div>
	</div>
	<hr>
	<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm ">
		<thead class="thead-light">
			<tr align="center">
				<th>No</th>
				<th>Tujuan</th>
				<th>Judul</th>
				<th>Tanggal</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php $tampil=$data->view() ?>
			<?php foreach ($tampil as $key => $value) : ?>
				<tr align="center">
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['jenis'] ?></td>
					<td style="width: 40%"><?php echo $value['judul'] ?></td>
					<td style="width: 30%"><?php echo $value['tgl'] ?></td>
					<td align="center" width="20%" >
						<a data-toggle="popover" title="Detail" data-content="Baca Pengumuman " href="index.php?halaman=detailpengumuman&id=<?php echo $value['id_pengumuman'] ?>" style="color: white; margin:1px" class="btn btn-info btn-sm" role="button" title="Detail"><i class="fa fa-eye"></i></a>
						<?php if ($_SESSION['hak_akses']=='admin'): ?>
						<a data-toggle="popover" title="Edit" data-content="Edit Pengumuman " href="index.php?halaman=editpengumuman&id=<?php echo $value['id_pengumuman'];?>" style="color: white; margin:1px" class="btn btn-warning btn-sm" role="button" title="Edit"><i class="fa fa-edit"></i></a>
						<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deletepengumuman&id=<?php echo $value['id_pengumuman'];?>" style="margin: 1px" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
					<?php endif ?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>	
	</div>

	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tulis Pengumuman</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa  fa-asterisk"></i></span>
									</div>
									<select name="jenis" class="form-control" aria-describedby="basic-addon1" required="">
										<option value="" disabled selected>Jenis Pengumuman</option>
										<option value="siswa">Siswa</option>
										<option value="guru">Guru</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<input type="file" id="files" name="img" class="form-control" accept="image/png, image/jpeg">
							</div>
						</div>
						<div class="input-group mb-6">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
							</div>
							<input autocomplete="off" type="text" name="title" class="form-control" placeholder="Judul Pengumuman" aria-label="nama" aria-describedby="basic-addon1" required="">
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
						$jenis = ($_POST["jenis"]);
						$title = trim($_POST["title"]);
						$body = ($_POST["editor"]);
						$date = date("d M, Y H:i:s");
						$data->save($jenis,$title,$body,$date,$img);
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