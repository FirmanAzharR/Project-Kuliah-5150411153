<div style="margin-left: 15px;margin-right: 15px">
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Edit Nilai Wawancara</h4>
		</div>
		<div class="col-md-6">
			<a href="index.php?halaman=inputnilai" class="btn btn-sm btn-primary" style="float: right"><i class="fa fa-plus"></i>&nbsp;Input Nilai Wawancara</a>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<form method="post">
			<table class="table table-bordered table-striped table-hover" id="myTable">
				<thead style="text-align: center;" class="thead-light">
					<th>No</th>
					<th>Nama</th>
					<th>Program</th>
					<th>Tanggal Wawancara</th>
					<th>Nilai</th>
				</thead>
				<tbody>
					<?php error_reporting(0); ?>		
					<?php $peserta=$data->tampil_peserta_edit_wawancara(); ?>		
					<?php foreach ($peserta as $key => $value): ?>
						<tr>
							<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
							<td style="text-align: center; width: 200px"><input type="hidden" name="id_peserta[]" value="<?php echo $value['id_peserta'] ?>"><?php echo $value['nama_peserta']; ?></td>
							<td style="text-align: center; width: 150px"><?php echo $value['nama_program'];  ?></td>
							<td style="text-align: center; width: 80px"><?php echo $value['tanggal_wawancara'];  ?></td>
							<td style="text-align: center; width: 30px"><input type="number" name="nilai[]" class="form-control" value="<?php echo $value['nilai_wawancara']; ?>" required></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<center><button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button></center>
			<?php 
				$data->nilai_wawancara_edit();
			?>
		</form>
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
