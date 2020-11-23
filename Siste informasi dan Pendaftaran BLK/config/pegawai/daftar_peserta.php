<?php $a=$data->tempat_tanggal(); ?>
<!--<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tempat dan Tanggal</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<form method="post">
				<div class="modal-body">
					<label>Tempat</label>
					<input autocomplete="off" type="text" name="tempat" class="form-control" value="<?php echo $a['tempat']; ?>" required>
					<label>Waktu</label>
					<input autocomplete="off" type="time" name="waktu" class="form-control" value="<?php echo $a['jam']; ?>" required>
				</div>

				<div class="modal-footer">
					<button type="submit" name="OK" class="btn btn-success">Simpan</button>
					<?php 
						if (isset($_POST['OK'])) {
							$data->update_tempat($_POST['tempat'],$_POST['waktu']);
						}
					?>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>

		</div>
	</div>
</div> -->

<div style="margin-left: 15px;margin-right: 15px">
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Tanggal Wawancara</h4>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-9">
					<!--<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i>&nbsp;Edit Waktu & Tempat</button>-->
				</div>
				<div class="col-md-3">
					<a href="index.php?halaman=edittanggal" class="btn btn-sm btn-warning" style="float: right;"><i class="fa fa-edit"></i>&nbsp;Edit Tanggal Wawancara</a>
				</div>
			</div>
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
					<th>Nilai Test</th>
					<th>Tanggal Wawancara</th>
				</thead>
				<tbody>
					<?php error_reporting(0); ?>		
					<?php $peserta=$data->tampil_peserta_lengkap(); ?>		
					<?php foreach ($peserta as $key => $value): ?>
						<tr>
							<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
							<td style="text-align: center; width: 200px"><input type="hidden" name="id_peserta[]" value="<?php echo $value['id_peserta'] ?>"><?php echo $value['nama_peserta']; ?></td>
							<td style="text-align: center; width: 150px"><?php echo $value['nama_program'];  ?></td>
							<td style="text-align: center; width: 80px"><?php echo $value['nilai'];  ?></td>
							<td style="text-align: center; width: 30px"><input type="date" name="tgl[]" class="form-control" value=""></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<center><button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button></center>
			<?php 
			$data->tanggal_wawancara();
			?>
		</form>
		<hr>
		<div class="alert alert-info">
			<label style="font-weight: bold">
				Keterangan :
			</label><br>
			Tempat Wawancara : <?php echo $a['tempat']; ?> <br>
			Waktu            : <?php echo $a['jam']; ?> <br>
		</div>
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
