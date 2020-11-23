<style>
.zoom:hover {
	opacity: 0.8;
}

.clock {
	font-size: 2em;
	text-align: center;
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
				<div style="font-weight: bold;font-family: Bahnschrift SemiBold;color: white; font-size: 12px"><i class="fa fa-lg fa-sign-out"></i>&nbsp;&nbsp;&nbsp;SELAMAT MEMBACA</div>
			</div>
			<div class="card" style="border-radius: 0px;width: auto;">
				<div class="card-body">
					<h4 class="card-title">Berita <?php echo $_GET['jenis'];?></h4>
					<hr>
					<table class="table table-responsive">
						<?php $view=$data->kategori($_GET['jenis']); ?>
						<?php foreach ($view as $key => $value): ?>
							<tr>
								<td>
									<div class="row">
										<div class="col-lg-8">
											<?php echo $value['tgl']; ?>
											<br>
											<a href="index.php?halaman=bacaberita&baca=<?php echo $value['id_berita'] ?>" style="font-size: 17px;color: #263238;font-weight: bold;"><?php echo $value['judul']; ?></a><br>
											<div style="text-align: justify;margin-top: 7px">
												<?php $cuplikan=substr($value['isi'],0,230) ?><?php echo $cuplikan; ?>.....
												<a style="margin-top: 5px" href="index.php?halaman=bacaberita&baca=<?php echo $value['id_berita'] ?>"  class="btn btn-info btn-sm"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;Selengkapnya</a>
											</div>
										</div>
										<div class="col-lg-4" style="border-left: 1px solid #ddd">
											<a class="zoom" href="config/admin/foto/<?php echo $value['img']; ?>"><img style="width: 250px;margin-top: 15px" align="center" src="config/admin/foto/<?php echo $value['img']; ?>" class="card-img-top img-thumbnail"></a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>

		</div>
		<div class="col-lg-3" style="padding-left: 15px;padding-right: 0px">
			<div class="card" style="border-radius: 0px;width: auto;">
				<div class="card-body">
					<?php $olahraga=$data->berita_spesifik_sidebar()?>
					<?php foreach ($olahraga as $key => $value): ?>
						<div style="margin-bottom: 5px"><?php echo $value['tgl'] ?></div>
						<h5 class="card-title" align="center"><?php echo $value['judul']; ?></h5>
						<center><a class="zoom" href="config/admin/foto/<?php echo $value['img']; ?>"><img style="width: 200px;margin-top: 0px" src="config/admin/foto/<?php echo $value['img']; ?>" class="card-img-top img-thumbnail"></a></center>
						<p class="card-text" style="text-align: left;">
							<?php $cuplikan=substr($value['isi'],0,99) ?><?php echo $cuplikan; ?>
						</p>
						<hr>
						<a href="index.php?halaman=bacaberita&baca=<?php echo $value['id_berita'] ?>"  class="btn btn-primary btn-sm"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;Selengkapnya</a>
					<?php endforeach ?>
				</div>
			</div>
			<div class="card border-primary mb-3" style="border-radius: 0px;width: auto;margin-top: 15px">
				<div class="card-header bg-primary" style="border-radius: 0px">
					<div style="color: white;font-weight: bold">Kategori Berita</div>
				</div>
				<div class="card-body">
					<div >
						<?php 
						$o="Olahraga";
						$t="Teknologi";
						$pe="Pendidikan";
						$m="Musik";
						$u="Umum";
						$po="Politik";
						?>
						<p class="card-text" style="text-align: left;"><a style="text-decoration: none" href="index.php?halaman=kategori&jenis=<?php echo $o; ?>"><i class="fa fa-soccer-ball-o"></i>&nbsp;&nbsp;Olahraga</a></p>
						<hr>
						<p class="card-text" style="text-align: left;"><a style="text-decoration: none" href="index.php?halaman=kategori&jenis=<?php echo $pe; ?>"><i class="fa fa-book"></i>&nbsp;&nbsp;Pendidikan</a></p>
						<hr>
						<p class="card-text" style="text-align: left;"><a style="text-decoration: none" href="index.php?halaman=kategori&jenis=<?php echo $t; ?>"><i class="fa fa-laptop"></i>&nbsp;&nbsp;Teknologi</a></p>
						<hr>
						<p class="card-text" style="text-align: left;"><a style="text-decoration: none" href="index.php?halaman=kategori&jenis=<?php echo $m; ?>"><i class="fa fa-music"></i>&nbsp;&nbsp;Musik</a></p>
						<hr>
						<p class="card-text" style="text-align: left;"><a style="text-decoration: none" href="index.php?halaman=kategori&jenis=<?php echo $u; ?>"><i class="fa fa-info"></i>&nbsp;&nbsp;Umum</a></p>
						<hr>
						<p class="card-text" style="text-align: left;"><a style="text-decoration: none" href="index.php?halaman=kategori&jenis=<?php echo $po; ?>"><i class="fa fa-building"></i>&nbsp;&nbsp;Politik</a></p>
					</div>
				</div>
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
		</div>
	</div>
</div>