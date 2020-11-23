<div style="margin-left: 15px;margin-right: 15px">
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Daftar Berita</h4>
		</div>
		<div class="col-md-6">
			<a href="index.php?halaman=tambahberita" class="btn btn-sm btn-primary" style="float: right"><i class="fa fa-plus"></i>&nbsp;Tambah berita</a>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<table class="table table-bordered table-striped table-hover" id="myTable">
			<thead style="text-align: center;" class="thead-light">
				<th>No</th>
				<th>Judul</th>
				<th>Tanggal</th>
				<th>Opsi</th>
			</thead>
			<tbody>
				<?php $peserta=$data->tampil_berita(); ?>
				<?php foreach ($peserta as $key => $value): ?>
					<tr>
						<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
						<td style="text-align: center; width: 300px"><?php echo $value['judul']; ?></td>
						<td style="text-align: center; width: 60px"><?php echo $value['tgl'];  ?></td>
						<td style="text-align: center; width: 200px">
							<a role="button" data-toggle="popover" title="Detail" data-content=" Detail Peserta" href="index.php?halaman=detailberita&id=<?php echo $value['id_berita']; ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
							<a role="button" data-toggle="popover" title="Edit" data-content=" Edit Berita" href="index.php?halaman=editberita&id=<?php echo $value['id_berita']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
							<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deleteberita&id=<?php echo $value['id_berita']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
