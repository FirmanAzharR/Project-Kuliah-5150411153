 <?php 
 session_start();
 if($_SESSION['status']!="login"){
 	header("location:../index.php?pesan=belum_login");
 }
 ?>
 <!doctype html>
 <html lang="en">

 <head>
 	<title>Admin -  SPK Motor</title>
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
 	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
 	<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
 				<a href="index.html"><img src="../assets/img/logo-darx.png" alt="Klorofil Logo" class="img-responsive logo"></a>
 			</div>	
 			<div class="navbar-btn">
 				<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
 			</div>
 			<div class="container-fluid">
 				<div class="brand">
 					<span style="font-weight: bold;font-family: Arial;font-size: 15px">SISTEM REKOMENDASI PEMILIHAN MOTOR MENGGUNAKAN METODE SAW </span>
 				</div>	
 				<div id="navbar-menu">
 					<ul class="nav navbar-nav navbar-right">
 						<li class="dropdown">
 							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/user5.png" class="img-circle" alt="Avatar"> <span>Yoga</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
 							<ul class="dropdown-menu">
 								<li><a href="#" id="profil"><i class="lnr lnr-user"></i> <span>Profil</span></a></li>
 								<li><a href="#"  onclick="logout()"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
 							</ul>
 						</li>
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
						<li><a href="index.php?halaman=dtkriteria" id="dt-k"><i class="lnr lnr-list"></i> <span>Data Kriteria</span></a></li>	
						<li><a href="index.php?halaman=nlkriteria" id="dt-nk"><i class="lnr lnr-database"></i> <span>Data Nilai Kriteria</span></a></li>	
						<li><a href="index.php?halaman=dtalternatif" id="dt-a"><i class="lnr lnr-list"></i> <span>Data Alternatif</span></a></li>	
						<li><a href="index.php?halaman=nlalternatif" id="dt-na"><i class="lnr lnr-database"></i> <span>Data Nilai Alternatif</span></a></li>	
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<?php 
			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="belum_login"){
					echo "<script>setTimeout(function () { 
						swal({
							title: 'Anda Belum Login',
							icon: 'error',
							});  
							},10); 
							</script>";
						}
					}
					?>
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
										elseif ($_GET['halaman']=='dtkriteria') {
											include 'dtkriteria.php';
										}
										elseif ($_GET['halaman']=='nlkriteria') {
											include 'nlkriteria.php';
										}
										elseif ($_GET['halaman']=='dtalternatif') {
											include 'dtalternatif.php';
										}
										elseif ($_GET['halaman']=='nlalternatif') {
											include 'nlalternatif.php';
										}
										elseif ($_GET['halaman']=='logout') {
											include 'logout.php';
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
				<div class="modal fade" id="myModal">
					<div class="modal-dialog modal-dialog-centered modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Profil</h4>
							</div>
							<div class="modal-body">
								
							</div>
							<div class="modal-footer">
								<a href="#" id="update" class="btn btn-success"> Update</a>
								<a href="#" id="close" class="btn btn-danger"> Close</a>
							</div>
						</div>
					</div>
				</div>

				<div class="clearfix"></div>
				<footer>
					<div class="container-fluid">
						<p class="copyright">by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">Yoga Ardhi P ( 2020 )</a>
						</p>
					</div>
				</footer>
			</div>

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

			<script type="text/javascript">
				$(document).ready(function(){
					$('#profil').click(function(){
						$('.modal-body').load('view/profil.php');
						$('#myModal').modal('toggle');
					});

					$('#close').click(function(){
						$('#myModal').modal('toggle');
					});

					$('#update').click(function(){
						var nama = $('#nama').val();
						var telepon = $('#telepon').val();
						var email = $('#email').val();
						var password = $('#password').val();

						$.ajax({
							url:'proses/update_profil.php',
							type:'POST',
							data:{nama:nama,telepon:telepon,email:email,password:password},
							success:function(msg){
								console.log(msg);
								if (msg=='berhasil') {
									$('.modal-header').html('<div class="alert alert-success">Profil Berhasil Diubah</div>');
								}else{
									$('.modal-header').html('<div class="alert alert-danger">Profil Gagal Diubah</div>');
								}
							}
						})
					});
				})
			</script>

			<script src="../assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
			<script src="../assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

		</body>

		</html>
