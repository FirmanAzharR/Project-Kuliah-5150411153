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

<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">
	<h2>Pengelolaan Website BLK KULON PROGO</h2>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<div class="card bg-warning" style="margin-top: 25px">
				<div class="card-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fa fa-user fa-5x"></i></a><br>
							<hr>
							Nama:
							<h6 style="color: white">
								<?php 
								$select=$data->select_pegawai($_SESSION['pegawai']);
								echo $select['nama_pegawai'];
								 ?>
							</h6>
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-info" style="margin-top: 25px">
				<div class="card-body">
					<center>
						<div class="icon">
							<a href="#" style="color: white"><i class="fa fa-book fa-5x"></i></a><br>
							<hr>
							Jabatan :<br> Pegawai
						</div>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-success" style="margin-top: 25px">
				<div class="card-body">
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
			<div class="card bg-danger" style="margin-top: 25px">
				<div class="card-body">
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