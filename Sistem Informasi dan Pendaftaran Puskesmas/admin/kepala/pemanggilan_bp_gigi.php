<?php 
include '../config/koneksi.php';
include 'proses/panggilan_antrian.php'; 
?>
<h3>Loket Antrian BP Gigi</h3>
<hr>
<div id="konten">
	<div class="panel panel-success">
		<div class="panel-heading">
			<label style="font-weight: bold; font-size: 20px">Pemanggilan Antrian</label>
		</div>
		<div class="panel-body">
			<form method="post" action="#">
				<div class="col-md-5">
					<div class="panel panel-info">
						<div class="panel-heading">
							<center><label style="font-weight: bold; font-size: 18px">Loket Antrian</label></center>
						</div>
						<div class="panel-body">
							<br><br>
							<center>
								<input type="hidden" id="inputan" name="nilai" value="<?php echo $display; ?>">
								<h1>BP Gigi</h1>
							</center>
							<br><br>
						</div>
					</div>
					<center>

						<?php 
						$cek = mysqli_query($koneksi,'SELECT tanggal_mulai,status_antrian FROM status_antrian WHERE loket_antrian="bpumum"');
						$result = $cek->fetch_assoc();
						$date_now = date("Y-m-d");
						?>

						<button id="ulang" type="submit" name="ulang" class="btn btn-danger"><i class=""></i>Ulangi</button>
						<button id="sebelum" type="submit" class="btn btn-warning" value="Sebelumnya" name="sebelum"><i class="fa fa-arrow-left"></i>Sebelumnya</button>
						<button id="selanjut" type="submit" value="Selanjutnya" name="selanjut" class="btn btn-success">Selanjutnya<i class="fa fa-arrow-right"></i></button>

						<?php //if ($result['tanggal_mulai']==$date_now & $result['status_antrian']=='Berjalan'){ ?>

							<!-- <script type="text/javascript">
								$(document).ready(function(){
									$('#ulang').prop('disabled',false);
									$('#sebelum').prop('disabled',false);
									$('#selanjut').prop('disabled',false);
								});
							</script> -->

						<?php //}else{ ?>

							<!-- <script type="text/javascript">
								$(document).ready(function(){
									$('#ulang').prop('disabled',true);
									$('#sebelum').prop('disabled',true);
									$('#selanjut').prop('disabled',true);
								});
							</script> -->

						<?php //} ?>

					</center>
				</div>
				<div class="col-md-7">
					<div class="panel panel-danger">
						<audio id="audioplayer">
							<source src="<?php if($display!='0'){echo "../assets/audio/opening.mp3";}?>">
							</audio>
							<div class="panel-heading">
								<center><label style="font-weight: bold; font-size: 18px">Nomor Antrian</label></center>
							</div>
							<div class="panel-body">
								<br><br>
								<center>
									<label id="nomor" style="font-family: Arial; font-size: 80px ">
										<?php echo $display; ?>
									</label>
								</center>
								<br><br>
								<hr>
								<p id="demo"></p>
								<marquee id="kalimat">
									Sekarang Antrian Ke <?php echo $kalimatTerbilang; ?>
								</marquee>
								<?php  $tmp=explode(' ',$kalimatTerbilang); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php 
	$cek_akhir_nomor = mysqli_query($koneksi,"SELECT COUNT(no_antrian) as x FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND  status='Belum Selesai'");
	$result1 = $cek_akhir_nomor->fetch_assoc();

	$cek_awal_nomor = mysqli_query($koneksi,"SELECT COUNT(no_antrian) as y FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpgigi' AND  status='Selesai'");
	$result2 = $cek_awal_nomor->fetch_assoc();

	if ($result1['x']==0) {?>

		<script type="text/javascript">swal("Antrian BP Gigi Selesai", "Tidak ada antrian selanjutnya", "success");</script>

	<?php }	?>


	<!-- antrian -->
	<script type="text/javascript">
		var vid = document.getElementById("audioplayer");
		var songs = ["../assets/audio/nomor_antrian.mp3",<?php
		foreach ($tmp as $antri){
			if($antri!='')
				echo "\"../assets/audio/".$antri.".mp3\",";
		}?>"../assets/audio/ending.mp3"];
		var ln=songs.length;
		var i=0;
		var audio = document.getElementById("audioplayer");
		audio.autoplay = true;
		audio.load();
		audio.addEventListener("ended", function() {
			var getAudio = this.getAttribute("src");
			var getPos = songs.indexOf(getAudio);
			if(i<ln){
				audio.src =songs[i];
				i++;
				audio.play();
			}
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#pemanggil').addClass("active");
			$('#pemanggil').attr("aria-expanded","true");
			$('#subPages').addClass("collapse in");
			$('#subPages').attr("aria-expanded","true");
			$('#gigi').addClass("active");
			//$('#konten').load('view/tampil_data_pasien.php');
			
		});
	</script>