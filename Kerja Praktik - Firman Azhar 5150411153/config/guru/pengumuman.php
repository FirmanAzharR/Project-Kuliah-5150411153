<div style="padding: 25px" class="animated fadeIn">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Daftar Pengumuman</h6>
		</div>
	</div>
	<hr>
	<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm ">
		<thead class="thead-light">
			<tr align="center">
				<th>No</th>
				<th>Judul</th>
				<th>Tanggal</th>
				<th>isi</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php $jenis="guru";$tampil=$user->view_guru() ?>
			<?php foreach ($tampil as $key => $value) : ?>
				<tr align="center">
					<td><?php echo $key+1 ?></td>
					<td style="width: 30%"><?php echo $value['judul'] ?></td>
					<td style="width: 20%"><?php echo $value['tgl'] ?></td>
					<td style="width: 40%"><?php echo substr($value['isi'], 0,60) ?></td>
					<td style="width: 10%"><a data-toggle="popover" title="Detail" data-content="Baca Pengumuman " href="index.php?halaman=detailpengumuman&id=<?php echo $value['id_pengumuman'] ?>" style="color: white; margin:1px" class="btn btn-info btn-sm" role="button" title="Detail"><i class="fa fa-eye"></i></a></td>
				<?php endforeach ?>
			</tbody>
		</table>	
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