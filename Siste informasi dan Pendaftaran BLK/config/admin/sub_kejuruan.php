<div style="margin-left: 15px;margin-right: 15px">
	<div class="row">
		<div class="col-md-6">
			<h4>Sub Kejuruan</h4>
		</div>
		<div class="col-md-6">
			<button class="btn btn-sm btn-primary" style="float: right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>&nbsp;&nbsp;Sub Kejuruan</button>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div>
		<table class="table table-bordered table-striped table-hover" id="myTable">
			<thead style="text-align: center;" class="thead-light">
				<th>No</th>
				<th>Kejuruan</th>
				<th>Sub Kejuruan</th>
				<th>Opsi</th>
			</thead>
			<tbody>
				<?php $kejuruan=$data->tampil_sub(); ?>
				<?php foreach ($kejuruan as $key => $value): ?>
					<tr>
						<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
						<td style="text-align: center; width: 300px"><?php echo $value['nama']; ?></td>
						<td style="text-align: center; width: 300px"><?php echo $value['nama_sub']; ?></td>
						<td style="text-align: center;">
							<a role="button" data-toggle="popover" title="Edit" data-content=" Edit Sub Kejuruan" href="index.php?halaman=editsub&id=<?php echo $value['id_sub']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
							<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deletesub&id=<?php echo $value['id_sub']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>
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
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
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
					<label>Nama Sub Kejuruan</label>
					<input autofocus type="text" name="sub" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
					<?php 
					if (isset($_POST['simpan'])) {
						$data->tambah_sub($_POST['kejuruan'],$_POST['sub']);
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
