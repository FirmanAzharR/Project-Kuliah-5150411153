<?php include '../../config/koneksi.php'; ?>
<table class="myTable table table-hover table-bordered">
	<thead class="thead-light">
		<tr align="center">
			<td>No</td>
			<td>No RM</td>
			<td>Tgl Daftar</td>
			<td>Nama Pasien</td>
			<td>Alamat</td>
			<td >Opsi</td>
		</tr>
	</thead>
	<tbody>
		<?php $data = mysqli_query($koneksi,"SELECT*FROM pasien ORDER BY(tanggal_daftar) DESC") ?>
		<?php foreach ($data as $key => $value): ?>
			<tr align="center">
				<td><?php echo $key+1; ?></td>
				<td data-target="norm"><?php  echo 'RM00';echo $value['no_rm']; ?></td>
				<td data-target="tgl_daftar"><?php echo date('d F Y', strtotime($value['tanggal_daftar'])); ?></td>
				<td data-target="nama"><?php echo $value['nama_pasien'] ?></td>
				<td data-target="alamat"><?php echo $value['alamat']; ?></td>
				<td>
					<button class="btn btn-info btn-sm" id="detail_pasien" data-role="detail_pasien" data-id="<?php echo $value['no_rm'] ?>"><i class="fa fa-eye"></i></button>

					<button class="btn btn-warning btn-sm" id="edit_pasien" data-role="edit_pasien" data-id="<?php echo $value['no_rm'] ?>"><i class="fa fa-edit"></i></button>

					<!-- <button class="btn btn-success" id="cetak_kartu" data-role="cetak_kartu" data-id="<?php echo $value['no_rm'] ?>"><i class="fa fa-print"></i></button> -->
					<a class="btn btn-success" target="_BLANK"  href="view/cetak_kartu.php?&norm=<?php echo $value['no_rm'] ?>"><i class="fa fa-print"></i></a>
				</td>
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
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('.myTable').DataTable();

		$(document).on('click','button[data-role=detail_pasien]',function(){
			var norm = $(this).data('id');

			$.post('view/detail_pasien.php', { norm: norm },  function(data, status) {
				$('.modal-body').html(data);
				$('#myModal').modal('toggle');
			});

		});

		$(document).on('click','button[data-role=edit_pasien]',function(){
			var norm = $(this).data('id');

			$.post('view/edit_pasien.php', { norm: norm },  function(data, status) {
				$('.modal-body').html(data);
				$('#myModal').modal('toggle');
			});

		});		

		// $(document).on('click','button[data-role=cetak_kartu]',function(){

		// });
	})
</script>