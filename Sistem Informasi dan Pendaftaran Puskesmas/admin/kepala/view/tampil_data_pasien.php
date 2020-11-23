<?php include '../../config/koneksi.php'; ?>
<table class="myTable table table-hover table-bordered">
	<thead class="thead-light">
		<tr>
			<th>No</th>
			<th>No RM</th>
			<th>Tgl Daftar</th>
			<th>Nama Pasien</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = mysqli_query($koneksi,"SELECT*FROM pasien ORDER BY(tanggal_daftar) DESC") ?>
		<?php foreach ($data as $key => $value): ?>
			<tr data-role="detail_pasien" data-id="<?php echo $value['no_rm'] ?>">
				<td><?php echo $key+1; ?></td>
				<td data-target="norm"><?php echo $value['no_rm'] ?></td>
				<td data-target="tgl_daftar"><?php echo $value['tanggal_daftar'] ?></td>
				<td data-target="nama"><?php echo $value['nama_pasien'] ?></td>
				<td data-target="jenkel"><?php echo $value['jenis_kelamin'] ?></td>
				<td data-target="alamat"><?php echo $value['alamat']; ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Pasien</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 10px">Close</button>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('.myTable').DataTable();

		$(document).on('click','tr[data-role=detail_pasien]',function(){
			var norm = $(this).data('id');

			$.post('view/detail_pasien.php', { norm: norm },  function(data, status) {
				$('.modal-body').html(data);
				$('#myModal').modal('toggle');
			});

		});
	})


</script>