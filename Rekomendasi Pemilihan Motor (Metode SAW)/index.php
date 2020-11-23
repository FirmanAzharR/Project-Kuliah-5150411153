<!doctype html>
<html lang="en">

<head>
	<title>Sistem Rekomendasi Pemilihan Motor</title>
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
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<link rel="stylesheet" href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="assets/img/logo-darx.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control pencarian" placeholder="Pencarian ...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary btn-pencarian">Ok</button></span>
					</div>
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="index.php?halaman=home"><i class="lnr lnr-home"></i> <span>Home</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						</li>
						<li>
							<a href="index.php?halaman=data_motor"><i class="lnr lnr-inbox"></i> <span>Data Motor</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						</li>
						<li>
							<a href="index.php?halaman=rekomendasi"><i class="lnr lnr-thumbs-up"></i> <span>Rekomendasi</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						</li>
						<li>
							<a href="index.php?halaman=bantuan"><i class="lnr lnr-question-circle"></i> <span>Bantuan</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						</li>
						<li>
							<a href="login.php" id="login" class="dropdown-toggle"><i class="fa fa-sign-in"></i>&nbsp;Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- MAIN -->
		<div class="main-content">
			<div class="container-fluid">
				<div class="panel panel-headline">
					<div class="panel-body pencarian">
						<?php 
						if (!isset($_GET['halaman'])) {
							include 'home.php';
						}else{
							if ($_GET['halaman']=='home') {
								include 'home.php';
							}
							elseif ($_GET['halaman']=='data_motor') {
								include 'data_motor.php';
							}
							elseif ($_GET['halaman']=='rekomendasi') {
								include 'rekomendasi.php';
							}
							elseif ($_GET['halaman']=='bantuan') {
								include 'help.php';
							}
						}
						?>				
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->

	<script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

	<script type="text/javascript">

		$('.btn-pencarian').click(function(){
			var x = $('.pencarian').val();

			if (x=='') {
				swal("Pencarian Kosong", "Silahkan isi Katakunci Pencarian", "warning");
			}else{
				$.post('hasil_pencarian.php', { pencarian : x },  function(data, status) {
					$('.pencarian').html(data);
				});
			}
		})

	</script>

</body>

</html>
