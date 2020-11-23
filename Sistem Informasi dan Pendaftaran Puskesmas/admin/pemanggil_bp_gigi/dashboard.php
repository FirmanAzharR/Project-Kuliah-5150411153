<?php include '../config/koneksi.php'; ?>
<h3>Dashboard</h3>
<hr>
<div class="row">
	<div class="col-md-4">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Selamat Datang</h3>
			</div>
			<div class="panel-body">
				Username : <?php echo $_SESSION['username']; ?><br>
				Hak Akses : Pemanggil Antrian BP Gigi.
				<hr>
				<div class="row">
					<div class="col-md-4">
						Pukul :
						<div class="clock"></div>
					</div>
					<div class="col-md-8">
						Tanggal :
						<div id="date"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Jumlah Berobat BP Gigi</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						Bulan Ini :
					</div>
					<div class="col-md-8">
						<?php $mounth = date('m'); ?>
						<?php $qry= mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE MONTH(tanggal_berobat) = MONTH(CURRENT_DATE()) AND tujuan='bpgigi'") ?>
						<?php echo mysqli_num_rows($qry) ?>
						&nbsp;Pasien Berobat
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Pasien Berobat</h3>
			</div>
			<div class="panel-body">
				<div id="demo-bar-chart" class="ct-chart"></div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		var options;

		var data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [
			[<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 1");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 2");
				echo mysqli_num_rows($jan);
				?>,
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 3");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 4");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 5");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 6");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 7");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 8");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 9");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 10");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 11");
				echo mysqli_num_rows($jan);
				?>, 
				<?php 
				$jan = mysqli_query($koneksi,"SELECT no_rm FROM pasien_berobat WHERE tujuan='bpgigi' AND MONTH(tanggal_berobat) = 12");
				echo mysqli_num_rows($jan);
				?>],
				]
			};

			options = {
				height: "300px",
				axisX: {
					showGrid: false
				},
			};

			new Chartist.Bar('#demo-bar-chart', data, options);

		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#dash').addClass("active");

		})
	</script>

	<script type="text/javascript">
	function clock() {// We create a new Date object and assign it to a variable called "time".
	var time = new Date(),

    // Access the "getHours" method on the Date object with the dot accessor.
    hours = time.getHours(),
    
    // Access the "getMinutes" method with the dot accessor.
    minutes = time.getMinutes(),
    
    
    seconds = time.getSeconds();

    document.querySelectorAll('.clock')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);

    function harold(standIn) {
    	if (standIn < 10) {
    		standIn = '0' + standIn
    	}
    	return standIn;
    }
}
setInterval(clock, 0);
</script>

<script type='text/javascript'>
	<!--
		var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
		var date = new Date();
		var day = date.getDate();
		var month = date.getMonth();
		var thisDay = date.getDay(),
		thisDay = myDays[thisDay];
		var yy = date.getYear();
		var year = (yy < 1000) ? yy + 1900 : yy;
		document.getElementById("date").innerHTML=(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
//-->
</script>