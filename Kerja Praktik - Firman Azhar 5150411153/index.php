<?php include 'config/class.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Website SMA Dr. Wahidin Mlati</title>
	<link rel="icon" href="img/ico.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/shadow.css">
	<link rel="stylesheet" type="text/css" href="assets/css/tabs.css">
	<link rel="stylesheet" type="text/css" href="assets/css/mystylecss.css">
	<link rel="stylesheet" type="text/css" href="assets/animate/animate.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="assets/calendar/css/ion.calendar.css">
	<script src="assets/js/jquery-3.2.0.min.js"></script>
	<script src="assets/calendar/js/moment-with-locales.min.js"></script>
	<script src="assets/calendar/js/ion.calendar.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/sweetalert2.all.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body style="background-color: #EEEEEF">
	<header class="hiden" style="background-color: #1967BE; padding-top: 15px;padding-bottom: 15px; margin-top: 50px">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<img class="img-fluid hiden" src="img/lg.png">
				</div>
				<div class="col-md-4">
					<div style="padding-top: 50px">
						<a href=""><img src="img/fb.png" style="width: 40px"></a>
						<a href=""><img src="img/twt.png" style="width: 40px"></a>
						<a href=""><img src="img/wa.png" style="width: 40px"></a>
						<a href=""><img src="img/ins.png" style="width: 40px"></a>
						<a href=""><img src="img/google.png" style="width: 40px"></a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<nav class="navbar navbar-inverse fixed-top navbar-expand-lg navbar-dark box" style="background-color:#2780E3">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php" style="color: #fff"><i class="fa fa-home"></i>&nbsp;Home Page<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=profil" style="color: #fff"><i class="fa fa-user"></i>&nbsp;Profil</a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=berita" style="color: #fff"><i class="fa fa-feed"></i>&nbsp;Berita</a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=visimisi" style="color: #fff"><i class="fa fa-phone"></i>&nbsp;Hubungi Kami</a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=login" style="color: #fff"><i class="fa fa-sign-in"></i>&nbsp;Login User</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0" style="display: none">
					<input class="form-control mr-sm-2" style="border-radius: 30px" type="" placeholder="Cari Sesuatu" aria-label="Search">
				</form>
			</div>
		</div>
	</nav>
	<div class="box hiden" style="background-color: #263238">
		<div class="container">
			<marquee><div style="color: white" class="animated fadeIn">
				Prestasi tidak dapat diraih tanpa Belajar ! Sekarang malas belajar besok atau lusa menjadi orang yang bodoh
			</div></marquee>
		</div>
	</div>
	<?php
	if (!isset($_GET['halaman'])) {
		include 'config/pengunjung/homepage.php';
	}
	else{
		if ($_GET['halaman']=="profil") {
			include 'config/pengunjung/profil.php';
		}
		elseif ($_GET['halaman']=="sejarah") {
			include 'config/pengunjung/sejarah.php';
		}
		elseif($_GET['halaman']=="visimisi"){
			include 'config/pengunjung/visimisi.php';
		}
		elseif ($_GET['halaman']=="berita") {
			include 'config/pengunjung/berita.php';
		}
		elseif ($_GET['halaman']=="login") {
			include 'config/pengunjung/login.php';
		}
		elseif ($_GET['halaman']=="bacaberita") {
			include 'config/pengunjung/halamanbaca.php';
		}
		elseif ($_GET['halaman']=="kategori") {
			include 'config/pengunjung/kategori.php';
		}
		elseif ($_GET['halaman']=="forgot") {
			include 'config/pengunjung/forgotpass.php';
		}
		else{
			include 'config/errorpage/index.php';
		}
	}
	?>

	<style>
	.footer {
		position: relative;
		left: 0;
		bottom: 0;
		width: auto%;
		background-color: #263238;
		color: white;
		text-align: center;
	}
</style>
<footer class="footer">
	<div class="container" align="center" style="padding: 20px">
		Copyright© 2017 - 2018 SMA Dr.Wahidin Mlati All rights reserved.
		<br>
		Powered by <a style="color: #1967BE" href="">SMADRWAHIDIN</a>
	</div>
</footer>
</body>
</html>