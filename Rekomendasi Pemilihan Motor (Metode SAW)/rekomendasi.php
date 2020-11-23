<?php include 'config/koneksi.php'; ?>
<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
<h3>Rekomendasi Motor</h3>
<hr>
<div id="saw">
	<form method="post">
		<table class="myTable table table-hover table-bordered">
			<thead class="thead-light">
				<tr>
					<th width="20px">Pilih</th>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Nama Motor</th>
					<th style="text-align: center">Merk</th>
					<th style="text-align: center">Harga Motor</th>
					<th style="text-align: center">Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 

				$data = mysqli_query($koneksi,"SELECT*FROM `data_motor` INNER JOIN `spesifikasi_motor` ON  `spesifikasi_motor`.`kode_motor`=`data_motor`.`kode_motor`");

				?>
				<?php foreach ($data as $key => $value): ?>
					<tr style="text-align: center" id="<?php echo $value['kode_motor'] ?>">
						<td>
							<input type="checkbox" name="pilih[]" id="pilih" value="<?php echo $value['kode_motor'] ?>">
						</td>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['nama_motor'] ?></td>
						<td><?php echo $value['merk_motor'] ?></td>
						<td><?php echo rupiah($value['harga']); ?></td>
						<td>
							<button id="<?php echo $value['kode_motor']; ?>" data-role="detail" data-id="<?php echo $value['kode_motor'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>&nbsp;Lihat Motor</button>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<hr>
		<div align="right">
			<button type="button" class="btn btn-success" id="btn-submit"><i class="lnr lnr-sync"></i>&nbsp; Proses</button>
		</div>
	</form>
</div>
<!-- modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Informasi Lengkap Motor</h4>
			</div>
			<div class="modal-body">

			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready( function () {
		var table = $('.myTable').DataTable();

		$('#btn-submit').on('click', function(e){
			e.preventDefault();

			$.ajax({
				url: 'perhitungan.php',
				type:'POST',
				data: table.$('input[type="checkbox"]').serialize(),
				success:function(r){
					console.log(r);
					$('#saw').load('hasil_perhitungan.php');

				}
			})
		});

	});

	$(document).on('click','button[data-role=detail]',function(e){
		e.preventDefault();
		var kode = $(this).data('id');
		$.post('informasi_motor.php', { kode: kode },  function(data, status) {
			$('.modal-body').html(data);
			$('#myModal').modal('toggle');
		});
	});



</script>

