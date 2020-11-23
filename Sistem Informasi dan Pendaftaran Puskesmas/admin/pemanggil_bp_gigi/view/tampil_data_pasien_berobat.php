<?php include '../../config/koneksi.php'; ?>
<table class="myTable table table-hover table-bordered">
	<thead class="thead-light">
		<tr>
			<th>No</th>
			<th>No RM</th>
			<th>Tgl Berobat</th>
			<th>Nama Pasien</th>
			<th>Tujuan</th>
			<th>Antrian</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $data = mysqli_query($koneksi,"SELECT*FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi'") ?>
		<?php foreach ($data as $key => $value): ?>
			<tr data-role="detail_pasien" data-id="<?php echo $value['no_rm'] ?>">
				<td><?php echo $key+1; ?></td>
				<td data-target="norm"><?php echo $value['no_rm'] ?></td>
				<td data-target="tgl_berobat"><?php echo $value['tanggal_berobat'] ?></td>
				<td data-target="nama"><?php echo $value['nama_pasien'] ?></td>
				<td data-target="tujuan"><?php echo $value['tujuan'] ?></td>
				<td data-target="antrian"><?php echo $value['no_antrian']; ?></td>
				<td data-target="status"><?php echo $value['status']; ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<hr>
<label>BP Umum ( Status : Selesai ) : 
	<?php 
	$x = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND status='Selesai'");
	echo mysqli_num_rows($x); 
	?> Pasien
</label><br>
<label>BP Umum ( Status : Belum Selesai ) : 
	<?php 
	$x = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND status='Belum Selesai'");
	echo mysqli_num_rows($x); 
	?> Pasien
</label>

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

			$.post('view/detail_pasien_berobat.php', { norm: norm },  function(data, status) {
				$('.modal-body').html(data);
				$('#myModal').modal('toggle');
			});

		});
	})


</script>