<?php include '../class.php'; 
if (!isset($_SESSION['id'])) {
	die("Anda Belum Login");
}
else{
	$id=$_SESSION['id'];
}
if ($_SESSION['hak_akses']!=="admin"&$_SESSION['hak_akses']!=="kepala") {
	die("anda bukan admin");
}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Sistem Akademik SMA DR.WAHIDIN</title>
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
	<script src="../../assets/ckeditor/ckeditor.js"></script>
</script>
</head>
<style type="text/css">
h4,h6{
	color: #7A7A7D;
}
</style>
<body style="background-color: #F7F7F8 " onload="startTime()">
	<div class="wrapper print">
		<!-- Sidebar  -->
		<nav id="sidebar" class="print">
			<div class="sidebar-header">
				<div class="row">
					<div class="col-md-2">
						<img src="../../img/logo.png" width="30px" align="center">
					</div>
					<div class="col-md-10">
						<h5 style="float: left;padding-top: 5px;font-family: Bahnschrift SemiBold">SMA 1 DR.WAHIDIN</h5>	
					</div>
				</div>
			</div>

			<ul class="list-unstyled components">
				<p></p>
				<li>
					<a href="index.php?halaman=dashboard"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
				</li>
				<li>
					<a href="index.php?halaman=profil"><i class="fa fa-user"></i>&nbsp;&nbsp;Profil</a>
				</li>
				<li>
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-book"></i>&nbsp;&nbsp;Akademik</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<?php if ($_SESSION['hak_akses']=='admin'): ?>
							<li>
								<a href="index.php?halaman=kepala"><i class="fa fa-user"></i>&nbsp;&nbsp;Kepala Sekolah</a>
							</li>
						<?php endif ?>
						<li>
							<a href="index.php?halaman=kelas"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Data Kelas</a>
						</li>
						<li>
							<a href="index.php?halaman=siswa"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Data Siswa</a>
						</li>
						<li>
							<a href="index.php?halaman=guru"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Data Guru</a>
						</li>
						<li>
							<a href="index.php?halaman=mapel"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Mata Pelajaran</a>
						</li>
						<li>
							<a href="index.php?halaman=nilai"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Data Nilai Siswa</a>
						</li>
						<li>
							<a href="index.php?halaman=raport"><i class="fa fa-file"></i>&nbsp;&nbsp;Raport Siswa</a>
						</li>
					</ul>
				</li>
				<?php if ($_SESSION['hak_akses']=='admin'): ?>
				<li>
					<a href="index.php?halaman=kelolauser"><i class="fa fa-users"></i>&nbsp;&nbsp;User</a>
				</li>
			<?php endif ?>
				<li>
					<a href="index.php?halaman=feedback"><i class="fa fa-comment"></i>&nbsp;&nbsp;Feedback</a>
				</li>
				<li>
					<a href="index.php?halaman=pengumuman"><i class="fa fa-bell"></i>&nbsp;&nbsp;Pengumuman</a>
				</li>
				<?php if ($_SESSION['hak_akses']=='admin'): ?>
				<li>
					<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-chrome"></i>&nbsp;&nbsp;Kelola Website</a>
					<ul class="collapse list-unstyled" id="pageSubmenu1">
						<li>
							<a href="index.php?halaman=berita"><i class="fa fa-rss"></i>&nbsp;&nbsp;Berita</a>
						</li>
					</ul>
				</li>
			<?php endif ?>
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
					&nbsp;&nbsp;&nbsp;<h4 style="padding-top: 10px;font-family:Bahnschrift SemiBold;color: #2A69B0; float: left">Sistem Akademik</h4>
					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fa fa-align-justify"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto dropdown">
							<li class="nav-item">
								<button name="logout" onclick="logout()" style="border: none;background-color: #F7F7F7"><i class="fa fa-user"></i>&nbsp;&nbsp;Logout</button>
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
			<div style="margin: 30px;background-color: white;bor;" class="box">
				<?php
				if (isset($_GET['halaman'])) {
					if ($_GET['halaman']=="dashboard") {
						include 'dashboard.php';
					}
					else if ($_GET['halaman']=="profil") {
						include 'profil.php';
					}
					elseif ($_GET['halaman']=='kelas') {
						include 'datakelas.php';
					}
					elseif ($_GET['halaman']=='siswa') {
						include 'datasiswa.php';
					}
					elseif ($_GET['halaman']=='guru') {
						include 'dataguru.php';
					}
					elseif ($_GET['halaman']=='kelolauser') {
						include 'kelolauser.php';
					}
					elseif ($_GET['halaman']=='nilai') {
						include 'nilai.php';
					}
					elseif ($_GET['halaman']=='pengumuman') {
						include 'pengumuman.php';
					}
					elseif ($_GET['halaman']=='deletekelas') {
						include 'deletekelas.php';
					}
					elseif ($_GET['halaman']=='editkelas') {
						include 'editkelas.php';
					}
					elseif ($_GET['halaman']=='deletejurusan') {
						include 'deletejurusan.php';
					}
					elseif ($_GET['halaman']=='deletesiswa') {
						include 'deletesiswa.php';
					}
					elseif ($_GET['halaman']=='editsiswa') {
						include 'editsiswa.php';
					}
					elseif ($_GET['halaman']=='detailsiswa') {
						include 'detailsiswa.php';
					}
					elseif ($_GET['halaman']=='logout') {
						include 'logout.php';
					}
					elseif ($_GET['halaman']=='deleteguru') {
						include 'deleteguru.php';
					}
					elseif ($_GET['halaman']=='detailguru') {
						include 'detailguru.php';
					}
					elseif ($_GET['halaman']=='editguru') {
						include 'editguru.php';
					}
					elseif ($_GET['halaman']=='mapel') {
						include 'mapel.php';
					}
					elseif ($_GET['halaman']=='deletemapel') {
						include 'deletemapel.php';
					}
					elseif ($_GET['halaman']=='akademiksiswa') {
						include 'akademiksiswa.php';
					}
					elseif ($_GET['halaman']=='akademikguru') {
						include 'akademikguru.php';
					}
					elseif ($_GET['halaman']=='datanilai') {
						include 'datanilai.php';
					}
					elseif ($_GET['halaman']=='detailpengumuman') {
						include 'detailpengumuman.php';
					}
					elseif ($_GET['halaman']=='deletepengumuman') {
						include 'deletepengumuman.php';
					}
					elseif ($_GET['halaman']=='editpengumuman') {
						include 'editpengumuman.php';
					}
					elseif ($_GET['halaman']=='deletenilai') {
						include 'deletenilai.php';
					}
					elseif ($_GET['halaman']=='editnilai') {
						include 'editnilai.php';
					}
					elseif ($_GET['halaman']=='raport') {
						include 'raport.php';
					}
					elseif ($_GET['halaman']=='berita') {
						include 'daftarberita.php';
					}
					elseif ($_GET['halaman']=='editberita') {
						include 'editberita.php';
					}
					elseif ($_GET['halaman']=='deleteberita') {
						include 'deleteberita.php';
					}
					elseif ($_GET['halaman']=='detailberita') {
						include 'detailberita.php';
					}
					elseif ($_GET['halaman']=='feedback') {
						include 'feedback.php';
					}
					elseif ($_GET['halaman']=='deletefeed') {
						include 'deletefeed.php';
					}
					elseif ($_GET['halaman']=='detailfeed') {
						include 'detailfeed.php';
					}
					elseif ($_GET['halaman']=='deleteuser') {
						include 'deleteuser.php';
					}
					elseif ($_GET['halaman']=='detailnilai') {
						include 'detailnilai.php';
					}
					elseif ($_GET['halaman']=='detailnilai2') {
						include 'detailnilai2.php';
					}
					elseif ($_GET['halaman']=='cetakraport') {
						include 'cetak_raport.php';
					}
					elseif ($_GET['halaman']=='cetakraport2') {
						include 'cetak_raport2.php';
					}
					elseif ($_GET['halaman']=='deletedetailmapel') {
						include 'deletedetailmapel.php';
					}
					elseif ($_GET['halaman']=='kepala') {
						include 'kepala.php';
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