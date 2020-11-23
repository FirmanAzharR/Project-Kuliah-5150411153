<?php include 'config/class.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Website BLK KULON PROGO</title>
	<link rel="icon" href="img/ico.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/shadow.css">
	<link rel="stylesheet" type="text/css" href="assets/css/tabs.css">
	<link rel="stylesheet" type="text/css" href="assets/css/mystylecss.css">
	<link rel="stylesheet" type="text/css" href="assets/animate/animate.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="assets/calendar/css/ion.calendar.css">
	<link rel="stylesheet" type="text/css" href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<script src="assets/js/jquery-3.2.1.js"></script>
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
					<img class="img-fluid hiden" src="img/hd.png">
				</div>
				<div class="col-md-4">
					<div style="padding-top: 50px">
						<a href="https://m.facebook.com/blk.k.progo?ref=bookmarks" target="_BLANK"><img src="img/fb.png" style="width: 40px"></a>
						<a href="https://twitter.com/BLK_Kulon_Progo" target="_BLANK"><img src="img/twt.png" style="width: 40px"></a>
						<a href=""><img src="img/wa.png" style="width: 40px"></a>
						<a href="https://www.instagram.com/blk_kulon_progo/?hl=id" target="_BLANK"><img src="img/ins.png" style="width: 40px"></a>
						<a href=""><img src="img/google.png" style="width: 40px"></a>
					</div>
				</div>
			</div>
			<div style="margin-left: 150px">
				<label style="color: white; font-weight: bold">Alamat : Jl.Raya Wates-Purworwejo Km.2 Tambak, Triharjo, Wates, Kulon Progo</label>
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
						<a class="nav-link" href="index.php?halaman=homepage" style="color: #fff"><i class="fa fa-home"></i>&nbsp;Home Page<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=profil" style="color: #fff"><i class="fa fa-user"></i>&nbsp;Profil</a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=berita" style="color: #fff"><i class="fa fa-feed"></i>&nbsp;Berita</a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=pengumuman" style="color: #fff"><i class="fa fa-bell"></i>&nbsp;Pengumuman</a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=pelatihan" style="color: #fff"><i class="fa fa-users"></i>&nbsp;Pelatihan</a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=hubungi" style="color: #fff"><i class="fa fa-phone"></i>&nbsp;Hubungi Kami</a>
					</li>
					<li class="nav-item" style="padding-right: 15px">
						<a class="nav-link" href="index.php?halaman=login" style="color: #fff"><i class="fa fa-sign-in"></i>&nbsp;Login User</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<?php
	if (!isset($_GET['halaman'])) {
		include 'config/pengunjung/homepage.php';
	}
	else{
		if ($_GET['halaman']=="profil") {
			include 'config/pengunjung/profil.php';
		}
		elseif ($_GET['halaman']=="homepage") {
			include 'config/pengunjung/homepage.php';
		}
		elseif ($_GET['halaman']=="sertifikasi") {
			include 'config/pengunjung/sertifikasi.php';
		}
		elseif ($_GET['halaman']=="sertifikasi") {
			include 'config/pengunjung/sertifikasi.php';
		}
		elseif($_GET['halaman']=="bursakerja"){
			include 'config/pengunjung/bursakerja.php';
		}
		elseif ($_GET['halaman']=="perusahaan") {
			include 'config/pengunjung/perusahaan.php';
		}
		elseif ($_GET['halaman']=="pelatihan") {
			include 'config/pengunjung/pelatihan.php';
		}
		elseif ($_GET['halaman']=="berita") {
			include 'config/pengunjung/berita.php';
		}
		elseif ($_GET['halaman']=="pengumuman") {
			include 'config/pengunjung/pengumuman.php';
		}
		elseif ($_GET['halaman']=="hubungi") {
			include 'config/pengunjung/hubungi.php';
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

	<script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

</body>
</html>