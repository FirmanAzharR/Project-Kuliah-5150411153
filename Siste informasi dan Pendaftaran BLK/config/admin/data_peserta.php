<div style="margin-left: 15px;margin-right: 15px">
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Daftar Peserta</h4>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<table class="table table-bordered table-striped table-hover" id="myTable">
			<thead style="text-align: center;" class="thead-light">
				<th>No</th>
				<th>Nama Peserta</th>
				<th>Kelamin</th>
				<th>Agama</th>
				<th>Alamat</th>
				<th>Opsi</th>
			</thead>
			<tbody>
				<?php $peserta=$data->tampil_peserta(); ?>
				<?php foreach ($peserta as $key => $value): ?>
					<tr>
						<td style="text-align: center; width: 40px"><?php echo $key+1; ?>
							<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
						</td>
						<td style="text-align: center; width: 300px"><?php echo $value['nama_peserta']; ?></td>
						<td style="text-align: center; width: 60px"><?php echo $value['jenkel'];  ?></td>
						<td style="text-align: center; width: 60"><?php echo $value['agama']; ?></td>
						<td style="text-align: center; width: 500px"><?php echo $value['alamat']; ?></td>
						<td style="text-align: center; width: 200px">
							<a role="button" data-toggle="popover" title="Detail" data-content=" Detail Peserta" href="index.php?halaman=detailpeserta&id=<?php echo $value['id_peserta']; ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
							<a role="button" data-toggle="popover" title="Edit" data-content=" Edit Peserta" href="index.php?halaman=editpeserta&id=<?php echo $value['id_peserta']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
							<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deletepeserta&id=<?php echo $value['id_peserta']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<!--end of warper-->
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
