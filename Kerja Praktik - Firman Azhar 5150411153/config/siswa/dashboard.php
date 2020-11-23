<style type="text/css">
.cards {
	transition: all 0.3s;
	color: white;
	border-radius: 0px;

	border:none;
}
.cards:hover {
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

<div style="padding: 25px" class="animated fadeIn">
	<div class="row">
		<div class="col-md-6">
			<h4>Dashboard</h4>
		</div>
		<div class="col-md-6">
			<h4 align="right">Siswa</h4>
		</div>
	</div>
	<hr>
	<?php 
			$niss=$_SESSION['id'];
			$siswa=$user->select_siswa($niss); 
	?>
	<div class="row">
		<div class="col-md-3">
			<div class="card cards bg-info">
				<div class="card-body">
					<center><a class="icon" href="#"><i class="fa fa-users fa-5x"></i></a></center>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-md-9"><div class="text" style="padding: 0px">Total Siswa Kelas :</div></div>
						<div class="col-md-3"><div class="col-md-3"><div class="count"><?php 
						 $kls=$siswa['id_kelas'];
						 $jrs=$siswa['id_jurusan'];
						$count=$data->count_siswa_kelas($kls,$jrs); ?></div></div>
					</div>
				</div>
			</div>
		</div>
		<div class="card cards bg-primary" style="margin-top: 25px">
			<div class="card-body">
				<center><a class="icon" href="#"><i class="fa fa-users fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-9"><div class="text" style="padding: 0px">Total Guru :</div></div>
					<div class="col-md-3"><div class="count"><?php $count=$data->count_guru(); ?></div></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card cards bg-warning">
			<div class="card-body">
				<center><a class="icon" href="#"><i class="fa fa-graduation-cap fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-9"><div class="text" style="padding: 0px">Total Siswa :</div></div>
					<div class="col-md-3"><div class="count"><?php $count=$data->count_siswa(); ?></div></div>
				</div>
			</div>
		</div>
		<div class="card cards" style="margin-top: 25px;background-color: #D25304">
			<div class="card-body">
				<center><a class="icon" href="#"><i class="fa fa-book fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-9"><div class="text" style="padding: 0px">Mata Pelajaran :</div></div>
					<div class="col-md-3"><div class="count"><?php $count=$data->count_mapel(); ?></div></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card cards bg-success">
			<div class="card-body">
				<center><a class="icon" href="#"><i class="fa fa-user fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-12"><div class="count"><?php $count=$data->select_wali($kls); echo $count['nama']; ?></div></div>
				</div>
			</div>
		</div>
		<div class="card cards bg-info" style="margin-top: 25px">
			<div class="card-body">
				<center><a class="icon" href=""><i class="fa fa-clock-o fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div class="text" style="padding: 0px">
					<div style="text-align: center;" id="txt"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card cards bg-danger">
			<div class="card-body">
				<center><a class="icon" href="#"><i class="fa fa-bell fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-9"><div class="text" style="padding: 0px">Pengumuman :</div></div>
					<div class="col-md-3"><div class="count"><?php $a="siswa"; $count=$data->count_pengumuman_spesifik($a); ?></div></div>
				</div>
			</div>
		</div>
		<div class="card cards bg-info" style="margin-top: 25px">
			<div class="card-body">
				<center><a class="icon" href="#"><i class="fa fa-calendar fa-5x"></i></a></center>
			</div>
			<div class="card-footer">
				<div id="date" style="text-align: center"></div>
			</div>
		</div>
	</div>
</div>


</div>



<script>
	function startTime() {
		var today = new Date();
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
		m = checkTime(m);
		s = checkTime(s);
		document.getElementById('txt').innerHTML =
		h + ":" + m + ":" + s;
		var t = setTimeout(startTime, 500);
	}
	function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
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