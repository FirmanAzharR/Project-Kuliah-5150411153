<!doctype html>
<html lang="en">

<head>
	<title>Puskesmas Bansari</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons.png">
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php"><img src="assets/img/logo.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Pencarian ...">
						<span class="input-group-btn"><button type="button" class="btn" style="background-color: #205E32; color: white">Ok</button></span>
					</div>
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-file-empty"></i>Pendaftaran<i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="index.php?halaman=baru">Pasien Baru</a></li>
								<li><a href="index.php?halaman=lama">Pasien Lama</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="index.php?halaman=cekantrian" class="dropdown-toggle"><i class="lnr lnr-database"></i>Antrian</a>
						</li>
						<li class="dropdown">
							<a href="index.php?halaman=kontak" class="dropdown-toggle"><i class="lnr lnr-phone-handset"></i>Kontak</a>
						</li>
						<li class="dropdown">
							<a href="index.php?halaman=tentang" class="dropdown-toggle"><i class="lnr lnr-question-circle"></i>&nbsp;Tentang</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- MAIN -->
		<div class="">
			<div class="">
					<div id="konten" style="margin-top: 60px; background-color: #fff">
						<?php 
						if (!isset($_GET['halaman'])) {
							include 'home.php';
						}else{
							if ($_GET['halaman']=='baru') {
								include 'view/pasien_baru.php';
							}
							elseif ($_GET['halaman']=='lama') {
								include 'view/pasien_lama.php';
							}
							elseif ($_GET['halaman']=='cekrm') {
								include 'cekrm.php';
							}
							elseif ($_GET['halaman']=='cekantrian') {
								include 'cek_antrian.php';
							}
							elseif ($_GET['halaman']=='kontak') {
								include 'kontak.php';
							}
							elseif ($_GET['halaman']=='tentang') {
								include 'tentang.php';
							}
							elseif ($_GET['halaman']=='lupa_rm') {
								include 'lupa_rm.php';
							}
						}
						?>
						<!--<img src="assets/img/main-bg.png" class="img-responsive">
						<p class="copyright">Sistem Rekomendasi Pemilihan Sepeda Motor by Yoga A.P ( 2020 )</a>
						</p>-->					
				</div>
			</div>
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->

</body>

</html>
