<?php include '../../config/koneksi.php'; ?>
<table class="myTable table table-hover table-bordered">
	<thead class="thead-light">
		<tr align="center">
			<td>No</td>
			<td>Nama Pengirim</td>
			<td>Email</td>
			<td>isi</td>
			<td>Opsi</td>
		</tr>
	</thead>
	<tbody>
		<?php $data = mysqli_query($koneksi,"SELECT*FROM kritik_saran ORDER BY(id_pengaduan) DESC") ?>
		<?php foreach ($data as $key => $value): ?>
			<tr align="center">
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['nama']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['isi_aduan']; ?></td>
				<td><button data-role='kritik' data-id="<?php echo $value['id_pengaduan'] ?>" class="btn btn-sm btn-info">lihat</button></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Kritik dan Saran</h4>
			</div>
			<div class="modal-body">

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('.myTable').DataTable();

		$(document).on('click','button[data-role=kritik]',function(){
			var id = $(this).data('id');

			$.post('view/detail_kritik_saran.php', { id: id },  function(data, status) {
				$('.modal-body').html(data);
				$('#myModal').modal('toggle');
			});

		});	

		// $(document).on('click','button[data-role=cetak_kartu]',function(){

		// });
	})
</script>