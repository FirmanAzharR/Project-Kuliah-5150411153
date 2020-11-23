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
	<div style="margin-top: 30px">
		<div class="row">
			<div class="col-md-3">
				<div class="card" style="border-radius: 0px;width: auto;margin-bottom: 15px;height: 500px">
					<div class="card-body">
						<h6>Berita Terbaru</h6>
						<hr class="colorgraph">
						<?php $berita=$data->berita_home()?>
						<?php foreach ($berita as $key => $value): ?>
							<h5 align="center"><?php echo $value['judul']; ?></h5>
							<center><a class="zoom" href="berita_img/<?php echo $value['gambar']; ?>"><img style="width: 200px;margin-top: 0px" src="berita_img/<?php echo $value['gambar']; ?>" class="card-img-top img-thumbnail"></a></center>
							<p class="card-text" style="text-align: left;margin-bottom: 5px">
								<?php $cuplikan=substr($value['isi'],0,99) ?><?php echo $cuplikan; ?>
							</p>
							<hr class="colorgraph">
							<a href="index.php?halaman=bacaberita&baca=<?php echo $value['id_berita'] ?>"  class="btn btn-info btn-sm"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;Selengkapnya</a>
						<?php endforeach ?>
					</div>
				</div>
				<div class="cal" style="width: 270px">
					<div class="myCalendar" id="myCalendar-1"></div>
				</div>
			</div>
			<div class="col-md-9">
				<img src="img/gd3in1.jpg" class="img-fluid img-thumbnail" style="width: 900px;height: 500px">
			</div>
		</div>
	</div>
</div>