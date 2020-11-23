<style type="text/css">
	.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.6;
  pointer-events: none;
}
</style>

<div style="margin-left: 15px;margin-right: 15px">
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Cetak Sertifikat</h4>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<table class="table table-bordered table-striped table-hover" id="myTable">
			<thead style="text-align: center;" class="thead-light">
				<th>No</th>
				<th>Nama</th>
				<th>Program</th>
				<th>Keterangan</th>
				<th width="30px">Konfirmasi</th>
			</thead>
			<tbody>
				<?php error_reporting(0); ?>		
				<?php $peserta=$data->sertifikat(); ?>		
				<?php foreach ($peserta as $key => $value): ?>
					<tr>
						<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
						<td style="text-align: center; width: 200px"><input type="hidden" name="id_peserta[]" value="<?php echo $value['id_peserta'] ?>"><?php echo $value['nama_peserta']; ?></td>
						<td style="text-align: center; width: 150px"><?php echo $value['nama_program'];  ?></td>
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
						 <td style="text-align: center;">
						 	<?php
							$status=$value['status_cetak'];
							$id_skor=$value['id_skor'];

							if ($status==0) {
								echo "
									<a href='index.php?halaman=statuscetak&id=$id_skor&x=1' id='x' class='btn btn-sm btn-success'>Yes</a>
								";

								echo "
									<a href='index.php?halaman=statuscetak&id=$id_skor&x=0' id='x' style='color:white' class='btn btn-sm btn-danger isDisabled'>No</a>
								";
							}
							else{
								echo "
									<a href='index.php?halaman=statuscetak&id=$id_skor&x=1' id='x' class='btn btn-sm btn-success isDisabled'>Yes</a>
								";

								echo "
									<a href='index.php?halaman=statuscetak&id=$id_skor&x=0' id='x' style='color:white' class='btn btn-sm btn-danger'>No</a>
								";
							}
						 	?>
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
