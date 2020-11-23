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

<script>
	!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://weatherwidget.io/js/widget.min.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","weatherwidget-io-js");
</script>

<style type="text/css">
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
<div class="container animated fadeIn">
	<div class="row rowmargin";>
		<div class="col-lg-9" style="padding-left: 0px;padding-right: 5px">
			<div id="demo" class="carousel slide" data-ride="carousel">
				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
					<li data-target="#demo" data-slide-to="3"></li>
					<li data-target="#demo" data-slide-to="4"></li>
				</ul>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="img/slide1.png" class="d-block img-fluid" alt="Responsive image" width="1100" height="350">
						<div class="carousel-caption">
							<h5>Depan Kelas SMA DR.Wahidin</h5>
						</div>   
					</div>
					<div class="carousel-item">
						<img src="img/slide2.png"  class="d-block img-fluid" alt="Responsive image" width="1100" height="350">
						<div class="carousel-caption">
							<h5>KKN di SMA DR.Wahidin</h5>
						</div>   
					</div>
					<div class="carousel-item">
						<img src="img/slide3.png" class="d-block img-fluid" alt="Responsive image" width="1100" height="350">
						<div class="carousel-caption">
							<h5>Paskibraka</h5>
						</div>   
					</div>
					<div class="carousel-item">
						<img src="img/slide4.png" class="d-block img-fluid" alt="Responsive image" width="1100" height="350">
						<div class="carousel-caption">
							<h5>Kelas</h5>
						</div>   
					</div>
					<div class="carousel-item">
						<img src="img/slide5.png" class="d-block img-fluid" alt="Responsive image" width="1100" height="350">
						<div class="carousel-caption">
							<h5>Guru SMA Dr. Wahidin</h5>
						</div>   
					</div>
				</div>
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
			<!--Header Konten-->
			<div class="rowmargin" style="padding: 7px; background-color: #2780E3;">
				<div style="font-weight: bold;font-family: Bahnschrift SemiBold;color: white; font-size: 12px"><i class="fa fa-lg fa-sign-out"></i>&nbsp;&nbsp;&nbsp;SELAMAT DATANG DI WEBSITE SMA DR. WAHIDIN MLATI</div>
			</div>
			<div class="card" style="border-radius: 0px;width: auto;">
				<div class="card-body">
					<h4 class="card-title">SMA ? SMA Dr. Wahidin</h4>
					<hr class="colorgraph">
					<p class="card-text" style="text-align: justify;">Sekolah Menengah Atas (disingkat SMA) adalah jenjang pendidikan menengah pada pendidikan formal di Indonesia setelah lulus dari Sekolah Menengah Pertama (SMP atau sederajat). Sekolah menengah atas ditempuh selama 3 tahun, mulai dari kelas 10 sampai 12. SMA Dr.wahidin merupakan SMA Swasta yang dapat menjadi salah satu pilihan sekolah menengah lanjutan bagi siswa lulusan SMP yang ingin meneruskan bersekolah di SMA. SMA Dr. Wahidin terletak di Jl. Magelang km. 5 Mlati. Untuk melihat detail dapat mengunjungi profil kami.</p>
					<hr class="colorgraph">
				</div>
			</div>
			<!--Header Post-->
			<div class="rowmargin" style="padding: 7px; background-color: #2780E3;">
				<div style="font-weight: bold;font-family: Bahnschrift SemiBold;color: white; font-size: 12px"><i class="fa fa-lg fa-sign-out"></i>&nbsp;&nbsp;&nbsp;TULISAN TERBARU</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="card" style="border-radius: 0px;width: auto;">
						<?php 
						$limit=1;
						$jenis="Pendidikan";
						$select=$data->berita_footer($jenis,$limit);
						?>
						<div class="card-body">
							<?php foreach ($select as $key => $value): ?>
								<div style="margin-bottom: 5px"><?php echo $value['tgl'] ?></div>
								<h4 class="card-title"><?php echo $value['judul']; ?></h4>
								<p class="card-text" style="text-align: left;"><?php echo $cuplikan=substr($value['isi'],0,170) ?></p>
								<hr class="colorgraph">
								<a href="index.php?halaman=bacaberita&baca=<?php echo $value['id_berita'] ?>" class="btn btn-info btn-sm"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;Selengkapnya</a>
							<?php endforeach ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<?php 
					$limit=1;
					$jenis="Teknologi";
					$select=$data->berita_lama($jenis,$limit);
					?>
					<?php foreach ($select as $key => $value): ?>
						<div class="card" style="border-radius: 0px;width: auto;">
							<div class="card-body">
								<div style="margin-bottom: 5px"><?php echo $value['tgl'] ?></div>
								<a style="text-decoration:none;color: #212529" href="" class="card-title" style="font-size: 20px"><h4><?php echo $value['judul'] ?></h4></a>
								<center><a class="zoom" href="config/admin/foto/<?php echo $value['img']; ?>"><img style="width: 200px;margin-top: 15px" align="center" src="config/admin/foto/<?php echo $value['img']; ?>" class="card-img-top img-thumbnail"></a></center>
								<hr class="colorgraph">
								<a href="index.php?halaman=bacaberita&baca=<?php echo $value['id_berita'] ?>" class="btn btn-info btn-sm"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;Selengkapnya</a>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>	
		</div>

		<!--Widget side konten-->
		<div class="col-lg-3" style="padding-left: 15px;padding-right: 0px">
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
							<div class="clock"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-warning mb-3" style="border-radius: 0px;width: auto;margin-top: 15px">
				<div class="card-header bg-warning" style="border-radius: 0px">
					<div style="color: white">Kritik dan Saran</div>
				</div>
				<div class="card-body">
					<p class="card-text" style="text-align: left;">Jika ada kritik dan saran dapat menuju menu feedback.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#myCalendar-1").ionCalendar();
</script>