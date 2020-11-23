<div style="margin-left: 15px;margin-right: 15px">
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Daftar Nilai Peserta</h4>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<table class="table table-bordered table-striped table-hover" id="myTable">
			<thead style="text-align: center;" class="thead-light">
				<th>No</th>
				<th>Nama</th>
				<th>Program</th>
				<th>Test</th>
				<th>Wawancara</th>
				<th>Keterangan</th>
			</thead>
			<tbody>
				<?php error_reporting(0); ?>		
				<?php $peserta=$data->tampil_peserta_nilai(); ?>		
				<?php foreach ($peserta as $key => $value): ?>
					<tr>
						<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
						<td style="text-align: center; width: 200px"><input type="hidden" name="id_peserta[]" value="<?php echo $value['id_peserta'] ?>"><?php echo $value['nama_peserta']; ?></td>
						<td style="text-align: center; width: 150px"><?php echo $value['nama_program'];  ?></td>
						<td style="text-align: center; width: 80px"><?php echo $value['nilai'];  ?></td>
						<td style="text-align: center; width: 80px"><?php echo $value['nilai_wawancara'];  ?></td>
						<td style="text-align: center; width: 80px"><?php
							$total=($value['nilai']+$value['nilai_wawancara']);
							$hasil=$total/2;

							if ($hasil>=70) {
								echo "<i class='fa fa-check' style='color: #4CB963'></i>&nbsp;&nbsp;Lulus";
							}
							else{
								echo "<i class='fa fa-close' style='color: red'></i>&nbsp;&nbsp;Tidak Lulus";
							}
						 ?></td>
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
