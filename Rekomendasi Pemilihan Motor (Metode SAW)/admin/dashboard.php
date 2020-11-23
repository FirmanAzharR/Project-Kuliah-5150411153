<?php include '../config/koneksi.php'; ?>

<style type="text/css">
	.card {
		transition: all 0.3s;
		color: white;
		border-radius: 0px;

		border:none;
	}
	.card:hover {
		transition: all 0.7s;
		transform: scale(1.09);
	}

	.icon{
		opacity: 0.7;
		color: white;
	}
	.icon:hover{
		opacity: 1;
		color: white;
	}
	.text{
		opacity: 0.7;
		color: white;
	}
	.text:hover{
		opacity: 1;
		color: white;
	}
	.count{
		opacity: 0.7;
		font-weight: bold;
	}
	.count:hover{
		opacity: 1;
		font-weight: bold;
	}

</style>

<h3>Dashboard</h3>
<hr>
<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">
	<h4>Sistem Rekomendasi Sepeda Motor</h4>
	<hr style="border: 1px solid #FFC400">
	<div style="text-align: justify;">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<div class="panel bg-warning" style="margin-top: 25px;height: 220px">
				<div class="panel-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fa fa-user fa-5x"></i></a><br>
							<hr>
							Dibuat Oleh :<br>
							<label style="font-weight: bold">Firman Azhar R</label>
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel" style="margin-top: 25px;height: 220px;background-color: #17A2B8">
				<div class="panel-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fa fa-book fa-5x"></i></a><br>
							<hr>
							Jumlah Data Motor : <br>
							<label style=""><?php  $dt=mysqli_query($koneksi,"SELECT kode_motor FROM data_motor");?><?php echo $jml=mysqli_num_rows($dt); ?>&nbsp;Data</label>
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-success" style="margin-top: 25px;height: 220px">
				<div class="panel-body">
					<center>
						<div class="icon">
							<a class="icon" href="#"><i class="fa fa-clock-o fa-5x"></i></a>
							<hr>
							Jam
							<div class="clock" style="font-weight: bold;"></div>
							
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-danger" style="margin-top: 25px;height: 220px">
				<div class="panel-body">
					<center>
						<div class="icon">
							<a class="icon" href="#"><i class="fa fa-calendar fa-5x"></i></a>
							<hr>
							Kalender
							<div id="date" style="font-weight: bold;"></div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>

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
<script type="text/javascript">
	$(document).ready(function(){

		$('#dash').addClass("active");

	})
</script>