<style>
.zoom:hover {
	opacity: 0.8;
}

.clock {
	font-size: 2em;
	text-align: center;
}
</style>

<style type="text/css">
.colorgraph {
	height: 5px;
	border-top: 0;
	background: #c4e17f;
	border-radius: 5px;
	background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>

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
setInterval(clock, 1000);
</script>

<div class="container animated fadeIn">
	<div class="row rowmargin";>
		<div class="col-lg-9" style="padding-left: 0px;padding-right: 5px">
			<!--Header Konten-->
			<div class="" style="padding: 7px; background-color: #2780E3; margin-bottom: 15px">
				<div style="font-weight: bold;font-family: Bahnschrift SemiBold;color: white; font-size: 12px"><i class="fa fa-lg fa-sign-out"></i>&nbsp;&nbsp;&nbsp;PENGUMUMAN</div>
			</div>
			<div class="card" style="border-radius: 0px;width: auto;">
				<div class="card-body">
					<h4 class="card-title">Jadwal Wawancara</h4>
					<hr class="colorgraph">
					
					<table class="table table-bordered table-striped table-hover" id="myTable">
						<thead style="text-align: center;" class="thead-light">
							<th>No</th>
							<th>Nama</th>
							<th>Program</th>
							<th>Tanggal Wawancara</th>
						</thead>
						<tbody>
							<?php //error_reporting(0); ?>		
							<?php $peserta=$data->pengumuman_wawancara(); ?>		
							<?php foreach ($peserta as $key => $value): ?>
								<tr>
									<td style="text-align: center; width: 40px"><?php echo $key+1; ?></td>
									<td style="text-align: center; width: 200px"><input type="hidden" name="id_peserta[]" value="<?php echo $value['id_peserta'] ?>"><?php echo $value['nama_peserta']; ?></td>
									<td style="text-align: center; width: 150px"><?php echo $value['nama_program'];  ?></td>
									<td style="text-align: center; width: 80px"><?php echo $value['tanggal_wawancara'];  ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<hr class="">
					<div class="alert alert-danger">
						<label style="font-weight: bold">* Jika tidak hadir pada test wawancara sesuai jadwal maka dinyatakan tidak lulus.</label>
					</div>
					<div class="alert alert-info">
						<label style="font-weight: bold">
							Keterangan :
						</label><br>
						<?php $y=$data->tempat_tanggal() ?>
						Tempat Wawancara : <?php echo $y['tempat']; ?> <br>
						Waktu            : <?php echo $y['jam']; ?> <br>
						Tanggal          : Lihat pada tabel.
					</div>
					<hr class="colorgraph">
				</div>
			</div>
		</div>
		<div class="col-lg-3" style="padding-left: 15px;padding-right: 0px">
			<div class="" style="padding: 7px; background-color: #2780E3; margin-bottom: 15px">
				<div style="font-weight: bold;font-family: Bahnschrift SemiBold;color: white; font-size: 12px"><i class="fa fa-lg fa-sign-out"></i>&nbsp;&nbsp;&nbsp;KALENDER</div>
			</div>
			<div class="cal" style="width: 270px">
				<div class="myCalendar" id="myCalendar-1"></div>
			</div>
			<div class="card mb-3" style="border-radius: 0px;width: auto;margin-top: 15px">
				<div class="card-body" style="background-color: #2780E3; color: white">
					<div class="row">
						<div class="col-md-4" style="border-right: 1px #ddd solid">
							<div align="center"><i class="fa fa-clock-o fa-3x"></i></div>
						</div>
						<div class="col-md-8">
							<div class="clock" style="padding: 7px"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#myCalendar-1").ionCalendar();
</script>

<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>