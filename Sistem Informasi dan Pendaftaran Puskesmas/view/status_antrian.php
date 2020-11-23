<?php 
include '../config/koneksi.php';

	$norm = $_POST['norm'];
	$data = mysqli_query($koneksi,"SELECT nama_pasien,no_antrian,tujuan FROM pasien_berobat WHERE no_rm ='$norm' AND status='Belum Selesai'");
	$pasien = $data->fetch_assoc();
	$tujuan = $pasien['tujuan'];

?>
<br>
<br>
<br>
<div class="container" align="center">
	<div class="upper-section">
		<h2 align="center">Status Antrian</h2>
		<table align="center">
			<th>
				<td><hr id="hr1"></td>
			</th>
		</table>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4">
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<div class="panel" id="cek">
				<div class="panel-heading" style="background-color:#205E32;">
					<h3 align="center" style="color:white;">Nomor Antrian</h3>
				</div>
				<div class="panel-body">
						<label>Nama : &nbsp;<?php echo $pasien['nama_pasien']; ?></label><br>
						<label>No RM : &nbsp;<?php echo 'RM00'; echo $norm; ?></label><br>
						<b style="font-size:70px;">
							<?php echo $pasien['no_antrian']; ?>
						</b>
					<br>
					
					<?php echo date('d-m-Y', strtotime(date("Y-m-d"))); ?>
					<br>
					Nomor antrian sekarang <div id="antrian_sekarang"></div>
					<label>
					    <?php 
					        if($tujuan=='bpgigi'){
					            echo "BP Gigi";
					        }else{
					            echo "BP Umum";
					        }
					    ?>
					</label>
					<br>

					<table>
						<tr>
							<td>
								<button type="button" class="form-control btn" style="background-color:#205E32; color:white;" id="refresh" name="refresh"><i class="fa fa-refresh"></i> Refresh</button>
							</td>
							<td>&nbsp;</td>
							<td>
								<!-- <button type="button" class="form-control btn" name="cetakantrian" onclick="window.open('cetak/cetakhasilcek.php?rm=<?php //echo $rm ?>')" target="_blank" style="background-color:#205E32; color:white;" id="cetakantrian">&nbsp;<i class="fa fa-print"></i> Cetak&nbsp;&nbsp;</button> -->
							</td>
						</tr>
					</table>
					<br>
							<label style="font-family:Arial; font-style: italic;">Silahkan Screenshoot Halaman ini Sebagai Bukti Pendaftaran Pasien Berobat</label>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		var tujuan = '<?php echo $tujuan ?>';
		$.post('process/antrian_sekarang.php',{ tujuan:tujuan },function(data, status) {
			$('#antrian_sekarang').html(data);
		});

		$('#refresh').click(function(e){
			var tujuan = '<?php echo $tujuan ?>';
			$.post('process/antrian_sekarang.php',{ tujuan:tujuan },function(data, status) {
				$('#antrian_sekarang').html(data);
			});
		});

		$('#cetakantrian').click(function(e){
			alert('cetak');
		});

	})
</script>
