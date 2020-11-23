<?php include '../class.php'; 
if (!isset($_SESSION['id'])) {
	die("Anda Belum Login");
}
else{
	$id=$_SESSION['id'];
}
if ($_SESSION['hak_akses']!=="guru") {
	die("anda bukan guru");
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
	<div class="wrapper">
		<!-- Sidebar  -->
		<nav id="sidebar">
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
			<?php 
			$nip=$_SESSION['id'];
			$guru=$user->select_guru($nip);	
			?>
			<ul class="list-unstyled components">
				<center>
					<div style="border-radius: 0px; width: 200px;margin-top:20px;border:2px #007BFF solid;background-color: #EFEEEE" class="card" >
						<div align="center" style="padding-top:25px;">
							<img width="130px" align="center" class="img-fluid img-thumbnail" src="../admin/foto/<?php echo $guru['gambar']; ?>">
						</div>
						<div style="padding-bottom: 20px;margin-top: 10px ">
							<div class="card-text" style="color: #535357;font-weight: bold;text-align: center;font-size: 13px"><?php echo $guru['nama'] ?></div>
							<div class="card-text" style="color: #535357;font-weight: bold;text-align: center;font-size: 13px;padding-bottom: 10px"><?php echo $guru['NIP'] ?></div>
							<?php $mapel=$user->guru_mapel($nip); ?>
							<?php foreach ($mapel as $key => $value): ?>
								<div class="card-text" style="color: #535357;font-weight: bold;text-align: center;font-size: 13px"><?php echo $value['nama_mapel'] ?></div>
							<?php endforeach ?>
						</center>
						<li>
							<a href="index.php?halaman=dashboard"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
						</li>
						<li>
							<a href="index.php?halaman=profil"><i class="fa fa-user"></i>&nbsp;&nbsp;Profil</a>
						</li>
						<?php $menu=$user->add_menu($_SESSION['id']); ?>
						<li>
							<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-book"></i>&nbsp;&nbsp;Akademik</a>
							<ul class="collapse list-unstyled" id="homeSubmenu">
								<li>
									<a href="index.php?halaman=nilai"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Data Nilai Siswa</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="index.php?halaman=pengumuman"><i class="fa fa-bell"></i>&nbsp;&nbsp;Pengumuman</a>
						</li>
						<li>
							<a href="index.php?halaman=akun"><i class="fa fa-gear"></i>&nbsp;&nbsp;Akun</a>
						</li>
					</ul>
				</nav>

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
							elseif ($_GET['halaman']=='pengumuman') {
								include 'pengumuman.php';
							}
							elseif ($_GET['halaman']=='nilai') {
								include 'nilai.php';
							}elseif ($_GET['halaman']=='logout') {
								include 'logout.php';
							}
							elseif ($_GET['halaman']=='detailpengumuman') {
								include 'detailpengumuman.php';
							}
							elseif ($_GET['halaman']=='datanilai') {
								include 'datanilai.php';
							}
							elseif ($_GET['halaman']=='editnilai') {
								include 'editnilai.php';
							}
							elseif ($_GET['halaman']=='deletenilai') {
								include 'deletenilai.php';
							}
							elseif ($_GET['halaman']=='walikelas') {
								include 'walikelas.php';
							}
							elseif ($_GET['halaman']=='detailsiswa') {
								include 'detailsiswa.php';
							}
							elseif ($_GET['halaman']=='raport') {
								include 'raport.php';
							}
							elseif ($_GET['halaman']=='transkrip') {
								include 'transkrip.php';
							}
							elseif ($_GET['halaman']=='transkrip2') {
								include 'transkrip2.php';
							}
							elseif ($_GET['halaman']=='cetakraport') {
								include 'cetak_raport.php';
							}
							elseif ($_GET['halaman']=='cetakraport2') {
								include 'cetak_raport2.php';
							}
							elseif ($_GET['halaman']=='akun') {
								include 'akun.php';
							}
							elseif ($_GET['halaman']=='naikkelas') {
								include 'naikkelas.php';
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