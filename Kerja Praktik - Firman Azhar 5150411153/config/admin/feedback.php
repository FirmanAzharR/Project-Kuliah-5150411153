<div style="padding: 25px" class="animated fadeIn">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Daftar Feedback</h6>
		</div>
	</div>
	<hr>
	<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
		<thead  class="thead-light" >
			<tr align="center">
				<th>No</th>
				<th>Nama Pengirim</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Pesan</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php $tampil=$data->view_feed(); ?>
			<?php foreach ($tampil as $key => $value) : ?>
				<tr align="center">
					<td><?php echo $key+1 ?><input type="hidden" name="id" value="<?php echo $value['id_feedback'] ?>"></td>
					<td style="width: 30%"><?php echo $value['nama_pengirim'] ?></td>
					<td style="width: 20%"><?php echo $value['email_pengirim'] ?></td>
					<td><?php echo $value['subject'] ?></td>
					<td><?php echo substr($value['pesan'],0,50) ?></td>
					<td align="center" width="10%" >
						<a data-toggle="popover" title="Detail" data-content="Baca Feedback " href="index.php?halaman=detailfeed&id=<?php echo $value['id_feedback'] ?>" style="color: white; margin:1px" class="btn btn-info btn-sm" role="button" title="Detail"><i class="fa fa-eye"></i></a>
						<?php if ($_SESSION['hak_akses']=='admin'): ?>
						<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deletefeed&id=<?php echo $value['id_feedback'];?>" style="margin: 1px" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a><?php endif ?>
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
								<input type="file" id="files" name="img" class="form-control">
							</div>
						</div>
						<div class="input-group mb-6">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
							</div>
							<input type="text" name="title" class="form-control" placeholder="Judul Pengumuman" aria-label="nama" aria-describedby="basic-addon1" required="">
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