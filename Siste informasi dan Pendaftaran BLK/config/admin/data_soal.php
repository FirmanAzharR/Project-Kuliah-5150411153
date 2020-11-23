<div style="margin-left: 15px;margin-right: 15px;color: black">
	<div class="row">
		<div class="col-md-6">
			<h4>Daftar Soal</h4>
		</div>
		<div class="col-md-6">
			<button data-toggle="modal" data-target="#myModal" style="float: right;" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Soal</button>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div>
		<table class="table table-bordered table-striped table-hover" id="myTable">
			<thead style="text-align: center;" class="thead-light">
				<th>No</th>
				<th>Soal</th>
				<th>Opsi</th>
			</thead>
			<tbody>
				<?php $peserta=$data->tampil_soal(); ?>
				<?php foreach ($peserta as $key => $value): ?>
					<tr>
						<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
						<td style="text-align: center; width: 600px"><?php echo $value['soal']; ?></td>
						<td style="text-align: center; width: 100px">
							<a role="button" data-toggle="popover" title="Detail" data-content=" Detail Soal" href="index.php?halaman=detailsoal&id=<?php echo $value['id_soal']; ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
							<a role="button" data-toggle="popover" title="Edit" data-content=" Edit Soal" href="index.php?halaman=editsoal&id=<?php echo $value['id_soal']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
							<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deletesoal&id=<?php echo $value['id_soal']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<!--end of warper-->
</div>

<!--Tambah-->
<div class="modal" id="myModal">
	<div class="modal-lg modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Soal</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<label style="font-weight: bold">Untuk Kejuruan</label>
					<div class="form-group">
						<label>Kejuruan</label>
						<select class="form-control" id="kejuruan" name="kejuruan" class="form-group" required>
							<option value="">Pilih Kejuruan</option>
							<?php $kejuruan=$data->tampil_kejuruan()?>
							<?php foreach ($kejuruan as $key => $value): ?>
								<?php echo "<option value='".$value['id']."'>";?><?php echo $value['nama']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label style="font-weight: bold">Soal</label>
						<textarea class="form-control" name="soal"></textarea>
					</div>
					<hr>
					<label style="font-weight: bold">Opsi Soal</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><label style="font-weight: bold"><input type="radio" name="jawab" value="a" required>&nbsp;a</label></span>
						</div>
						<input autocomplete="off" type="text" name="a" class="form-control" placeholder="Opsi Jawaban A" aria-label="a" aria-describedby="basic-addon1" required="">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><label style="font-weight: bold"><input type="radio" name="jawab" value="b">&nbsp;b</label></span>
						</div>
						<input autocomplete="off" type="text" name="b" class="form-control" placeholder="Opsi Jawaban B" aria-label="a" aria-describedby="basic-addon1" required="">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><label style="font-weight: bold"><input type="radio" name="jawab" value="c">&nbsp;c</label></span>
						</div>
						<input autocomplete="off" type="text" name="c" class="form-control" placeholder="Opsi Jawaban C" aria-label="a" aria-describedby="basic-addon1" required="">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><label style="font-weight: bold"><input type="radio" name="jawab" value="d">&nbsp;d</label></span>
						</div>
						<input autocomplete="off" type="text" name="d" class="form-control" placeholder="Opsi Jawaban B" aria-label="a" aria-describedby="basic-addon1" required="">
					</div>
					<hr>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
					<?php 
					if (isset($_POST['simpan'])) {
						$data->tambah_soal($_POST['kejuruan'],$_POST['soal'],$_POST['a'],$_POST['b'],$_POST['c'],$_POST['d'],$_POST['jawab']);
					}
					?>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

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
