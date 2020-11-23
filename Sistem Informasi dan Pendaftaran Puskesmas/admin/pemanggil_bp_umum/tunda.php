<h3>Data Pasien Panggilan Tertunda</h3>
<?php include '../config/koneksi.php'; ?>
<?php 
include 'proses/panggilan_antrian.php'; 
?>
<hr>
<div id="konten">
	<h4>BP UMUM</h4>
	<br>
	<table class="myTable table table-hover table-bordered">
		<thead class="thead-light">
			<tr align="center">
				<td>No</td>
				<td>Nama Pasien</td>
				<td>No Antrian</td>
				<td>Tujuan</td>
				<td>Opsi</td>
				<td>Ubah Status</td>
			</tr>
		</thead>
		<tbody>
			<?php $data = mysqli_query($koneksi,"SELECT*FROM pasien_berobat WHERE status='Tunda' AND tanggal_berobat=CURDATE() AND tujuan='bpumum'") ?>
			<?php foreach ($data as $key => $value): ?>
				<tr align="center">
					<td><?php echo $key+1; ?></td>
					<td><?php echo $value['nama_pasien']; ?></td>
					<td><?php echo $value['no_antrian']; ?></td>
					<td><?php echo $value['tujuan']; ?></td>
					<td>
						<a href="proses/panggilan_tunda.php?antrian=<?php echo $value['no_antrian']; ?>" class="btn btn-sm btn-primary">Panggil</a>
					</td>
					<td>
						<a href="proses/ubah_status_selesai.php?norm=<?php echo $value['no_rm'] ?>" class="btn btn-sm btn-success" id="selesai" data-role="selesai" data-id="<?php echo $value['no_rm'] ?>">Selesai</a>
						<a href="proses/ubah_status_batal.php?norm=<?php echo $value['no_rm'] ?>" class="btn btn-sm btn-danger" id="gagal" data-role="gagal" data-id="<?php echo $value['no_rm'] ?>">Batal</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<hr>

	<audio id="audioplayer">
		<source src="<?php if($display!='0'){echo "../assets/audio/opening.mp3";}?>">
		</audio>

		<?php 
		if (isset($_GET['kalimat'])) {
			?>
			<?php $kalimatTerbilang=$_GET['kalimat']; ?>
			<?php  $tmp=explode(' ',$kalimatTerbilang); ?>

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
		<?php }else{

		} ?>

		<script type="text/javascript">
			$(document).ready(function(){

				$('.myTable').DataTable();
		// $(document).on('click','button[data-role=cetak_kartu]',function(){

		// });
	})
</script>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tunda').addClass("active");
	})
</script>