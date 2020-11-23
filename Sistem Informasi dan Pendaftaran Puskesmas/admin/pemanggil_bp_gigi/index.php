 <?php 
 session_start();
 if($_SESSION['status']!="login"||$_SESSION['level']!=3){
 	header("location:../index.php?pesan=belum_login");
 }
 ?>
 
 <!doctype html>
 <html lang="en">

 <head>
 	<title>Antrian BP Gigi | Sipkesmas</title>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
 	<!-- VENDOR CSS -->
 	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
 	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
 	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
 	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
 	<link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
 	<!-- MAIN CSS -->
 	<link rel="stylesheet" href="../assets/css/main.css">
 	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
 	<link rel="stylesheet" href="../assets/css/demo.css">
 	<!-- GOOGLE FONTS -->
 	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
 	<!-- ICONS -->

 	<!-- END WRAPPER -->
 	<!-- Javascript -->
 	<script src="../assets/vendor/jquery/jquery.min.js"></script>
 	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
 	<script src="../assets/DataTables/datatables.js"></script>
 	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
 	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
 	<script src="../assets/scripts/klorofil-common.js"></script>
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
 	<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicons.png">
 </head>
 <body>
 	<style type="text/css">
 		.modal {
 			text-align: center;
 			padding: 0!important;
 		}

 		.modal:before {
 			content: '';
 			display: inline-block;
 			height: 100%;
 			vertical-align: middle;
 			margin-right: -4px;
 		}

 		.modal-dialog {
 			display: inline-block;
 			text-align: left;
 			vertical-align: middle;
 		}
 	</style>
 	<!-- WRAPPER -->
 	<div id="wrapper">
 		<!-- NAVBAR -->
 		<nav class="navbar navbar-default navbar-fixed-top">
 			<div class="brand">
 				<a href="#"><img src="../assets/img/logo.png" class="img-responsive logo"></a>
 			</div>	
 			<div class="navbar-btn">
 				<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
 			</div>
 			<div class="container-fluid">
 				<div class="brand">
 					<span style="font-weight: bold;font-family: Arial;font-size: 15px">Pemanggilan Antrian</span>
 				</div>	
 				<div id="navbar-menu">
 					<ul class="nav navbar-nav navbar-right">
 						<li class="dropdown">
 							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/userx.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['username'] ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
 							<ul class="dropdown-menu">
 								<li><a href="index.php?halaman=profile"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
 								<li><a href="#" onclick="logout()"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
 							</ul>
 						</li>
 						<script type="text/javascript">
 							function logout(){

 								swal({
 									title: "Logout ?",
 									text: "Anda akan keluar dari halaman ini",
 									icon: "warning",
 									buttons: true,
 									dangerMode: true,
 								})
 								.then((willDelete) => {
 									if (willDelete) {
 										window.location = "index.php?halaman=logout";
 									} else {
 										
 									}
 								});
 								
 							}
 						</script>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php?halaman=dashboard" id="dash"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>		
						<li><a href="index.php?halaman=pasien_berobat" id="dt-pasien_berobat"><i class="lnr lnr-database"></i> <span>Data Pasien Berobat</span></a></li>	
						<li>
							<a id="pemanggil" href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>Pemanggilan Antrian</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a id="umum" href="index.php?halaman=bp_gigi" class="">BP Gigi</a></li>
									<li><a id="tunda" href="index.php?halaman=tunda" class="">Daftar Pasien Tunda</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-body">
							<?php 
							if (!isset($_GET['halaman'])) {
								include 'dashboard.php';
							}else{
								if ($_GET['halaman']=='dashboard') {
									include 'dashboard.php';
								}
								elseif ($_GET['halaman']=='pasien') {
									include 'data_pasien.php';
								}
								elseif ($_GET['halaman']=='pasien_berobat') {
									include 'pasien_berobat.php';
								}
								elseif ($_GET['halaman']=='bp_umum') {
									include 'pemanggilan_bp_umum.php';
								}
								elseif ($_GET['halaman']=='bp_gigi') {
									include 'pemanggilan_bp_gigi.php';
								}elseif ($_GET['halaman']=='logout') {
									include 'logout.php';
								}elseif ($_GET['halaman']=='profile') {
									include 'profile.php';
								}
								elseif ($_GET['halaman']=='tunda') {
									include 'tunda.php';
								}

							}
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">by <i class="fa fa-love"></i><a href="#">Sipkesmas Beta v.0.1</a>
				</p>
			</div>
		</footer>
	</div>

	<script src="../assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="../assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

</body>

</html>
