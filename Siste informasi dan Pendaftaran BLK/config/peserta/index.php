<?php include '../class.php'; 
if (!isset($_SESSION['peserta'])) {
	die("Anda Belum Login");
}
else{
	$admin=$_SESSION['peserta'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>BLK Kulon Progo</title>
	<link rel="icon" href="../../img/ico.png">
	<link rel="stylesheet" type="text/css" href="../../assets/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/shadow.css">
	<link rel="stylesheet" type="text/css" href="../../assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/date/css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="../../assets/animate/animate.min.css">
	<script src="../../assets/js/jquery-3.3.1.min.js"></script>
	<script src="../../assets/js/popper.js"></script>
	<script src="../../assets/js/bootstrap.js"></script>
	<script src="../../assets/date/js/bootstrap-datepicker.js"></script>
	<script src="../../assets/js/bootstrap-confirmation.min.js"></script>
	<script src="../../assets/js/sweetalert2.all.min.js"></script>
	<script src="../../assets/ckeditor5-build-classic/ckeditor.js"></script>
</head>
<style type="text/css">
h4,h6{
	color: #7A7A7D;
}
.not-active {
  pointer-events: none;
  cursor: default;
}

</style>
<body style="background-color: white " onload="startTime()">
	<div class="wrapper print">
		<!-- Sidebar  -->
		<nav id="sidebar" class="print">
			<div class="sidebar-header">
				<div class="row">
					<div class="col-md-2">
						<img src="../../img/logo.png" width="30px" align="center">
					</div>
					<div class="col-md-10">
						<h5 style="float: left;padding-top: 5px;">BLK KULONPROGO</h5>	
					</div>
				</div>
			</div>

			<ul class="list-unstyled components">
				<p></p>
				<li>
					<a href="index.php?halaman=dashboard" id="d"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
				</li>
				<li>
					<a href="index.php?halaman=profil" id="d"><i class="fa fa-user"></i>&nbsp;&nbsp;Profil</a>
				</li>
				<li>
					<a href="index.php?halaman=soal" id="z"><i class="fa fa-book"></i>&nbsp;&nbsp;Soal Ujian</a>
				</li>
				<li>
					<?php $cek=$data->cek_cetak($_SESSION['peserta']) ?>
					<?php if ($cek['status_cetak']==1) { ?>
						<a target="_BLANK" href="sertifikat.php?id=<?php echo $_SESSION['peserta']?>"><i class="fa fa-book"></i>&nbsp;&nbsp;Sertifikat&nbsp;<i class='fa fa-check' style='color: #4CB963'></i></a>
					<?php } else { ?>
						<a href="#" class="not-active"><i class="fa fa-book"></i>&nbsp;&nbsp;Sertifikat&nbsp;<i class='fa fa-close' style='color: red'></i></a>
					<?php } ?>
				</li>
			</ul>
		</nav>
	</div>
	<div class="wrapper">
		<!-- Page Content  -->
		<div id="content">
			<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f7f7f7">
				<div class="container-fluid">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
						<i class="fa fa-align-justify"></i>
					</button>
					&nbsp;&nbsp;&nbsp;<h4 style="padding-top: 10px;color: #2A69B0; float: left">BLK</h4>
					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fa fa-align-justify"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto dropdown">
							<li class="nav-item">
								<button id="l" name="logout" onclick="logout()" style="border: none;background-color: #F7F7F7"><i class="fa fa-user"></i>&nbsp;&nbsp;Logout</button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<script type="text/javascript">
				function logout(){
					swal({
						title: 'Logout ?',
						type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes!'
					}).then((result) => {
						if (result.value) {
							swal(
								'Berhasil',
								'',
								'success'
								).then(function() {
									window.location = "index.php?halaman=logout";
								});
							}
						})
				}
			</script>
			<!-- Halaman Isi -->
			<div style="margin: 30px;padding: 15px;">
				<?php
				if (isset($_GET['halaman'])) {
					if ($_GET['halaman']=="dashboard") {
						include 'dashboard.php';
					}
					elseif($_GET['halaman']=="profil"){
						include 'profil.php';
					}
					elseif($_GET['halaman']=="sertifikat"){
						include 'sertifikat.php';
					}
					elseif($_GET['halaman']=="soal"){
						include 'soal.php';
					}
					elseif($_GET['halaman']=="logout"){
						include 'logout.php';
					}
					else{
						include 'errorpage/index.php';
					}
				}
				else{
					include 'dashboard.php';
				}
				?>
			</div>
		</div>

	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../../assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="../../assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("#sidebar").mCustomScrollbar({
				theme: "minimal"
			});

			$('#sidebarCollapse').on('click', function () {
				$('#sidebar, #content').toggleClass('active');
				$('.collapse.in').toggleClass('in');
				$('a[aria-expanded=true]').attr('aria-expanded', 'false');
			});
		});
	</script>
</body>
</html>