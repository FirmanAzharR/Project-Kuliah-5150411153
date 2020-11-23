<div style="margin-left: 15px;margin-right: 15px">
	<div class="row">
		<div class="col-md-4" style="border-right: 1px solid black">
			<h4 id="judul">Edit Tanggal Wawancara</h4>
			<?php $a=$data->tempat_tanggal(); ?>
		</div>
		<div class="col-md-8">
			<form method="post">
				<div class="row">
					<div class="col-md-4">
						<label style="font-weight: bold">Tgl yang diubah : </label> <br>
						<input type="date" name="date_all" class="form-control" value="" required>
						<label style="font-weight: bold">Tempat</label>
						<input autocomplete="off" type="text" name="tempat" class="form-control" value="<?php echo $a['tempat']; ?>" required>
					</div>
					<div class="col-md-4">
						<label style="font-weight: bold">Ke : </label> <br>
						<input type="date" name="date_x" class="form-control" required>
						<label style="font-weight: bold">Waktu</label>
						<input autocomplete="off" type="time" name="waktu" class="form-control" value="<?php echo $a['jam']; ?>" required>
					</div>
					<div class="col-md-4">
						<label>Update:</label><br>
						<button class="btn btn-info" name="update_all">Update</button>
						<?php 
						if (isset($_POST['update_all'])) {

							$select=$data->notif($_POST['date_all']);
							require '../pengunjung/PHPmailer/class.phpmailer.php';
							$mail = new PHPMailer;

							foreach ($select as $key => $value) {

								$mail->isSMTP(true);
								$mail->Host = 'smtp.gmail.com';
								$mail->SMTPAuth = true;
								$mail->Username = 'firmanazhar14@gmail.com';
								$mail->Password = 'Far040396';
								$mail->SMTPSecure = 'tls';
								$mail->Port = 587;

								$mail->setFrom('firmanazhar14@gmail.com','Admin');
								$mail->addReplyTo('firmanazhar14@gmail.com','Admin');

								$mail->addAddress($value['email']);
								$mail->Subject = 'BLK Kulonprogo : Pemberitahuan Pendaftaran';

								$mail->isHTML(true);

								$mailContent= "
								Dari : BLK Kulonprogo <br/>
								Pesan: <br/>
								Nama : ".$value['nama_peserta']." <br/><br/>  Jadwal test wawancara anda telah diubah, silahkan check jadwal wawancara di website kami pada menu pengumuman dan cari nama anda pada tabel daftar peserta test wawancara.<br/>Diharapkan datang tepat waktu sesuai jadwal.<br/><br/>
								Terimakasih<br/>
								";
								$mail->Body = $mailContent;

								if(!$mail->send()){
									echo "<div class='alert alert-danger' role='alert'>
									Gagal Mengirim , '".$mail->ErrorInfo."'
									</div>";
								}
							}

							$data->update_tempat($_POST['tempat'],$_POST['waktu']);

							$data->update_tgl_all($_POST['date_x'],$_POST['date_all']);

						}
						?>
					</div>
				</div>
			</form>
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
					<th>Tanggal</th>
					<th>Tanggal Wawancara</th>
				</thead>
				<tbody>
					<?php error_reporting(0); ?>		
					<?php $peserta=$data->tampil_peserta_lengkap_edit_tgl(); ?>		
					<?php foreach ($peserta as $key => $value): ?>
						<tr>
							<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
							<td style="text-align: center; width: 200px"><input type="hidden" name="id_peserta[]" value="<?php echo $value['id_peserta'] ?>"><?php echo $value['nama_peserta']; ?></td>
							<td style="text-align: center; width: 150px"><?php echo $value['nama_program'];  ?></td>
							<td style="text-align: center; width: 80px"><?php echo $value['tanggal_wawancara'];  ?></td>
							<td style="text-align: center; width: 30px"><input type="date" name="tgl[]" class="form-control" value="<?php echo $value['tanggal_wawancara'] ?>"></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<center><button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button></center>
			<?php 
			$data->tanggal_wawancara_edit();
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
