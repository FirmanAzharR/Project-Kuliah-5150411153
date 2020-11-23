<!DOCTYPE html>
<html>
<head>
	<title>Login Prediksi Kelulusan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="assets/img/favico.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bg.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="assets/animate/animate.css">
	<script src="assets/jquery/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/sweetalert2.all.min.js"></script>
</head>
<body class="bg">
	<div class="container">
		<!-- cek pesan notifikasi -->
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<script>setTimeout(function () { 
					swal({
						title: 'Login Gagal',
						type: 'error',
						});  
						},10); 
						</script>";
					}else if($_GET['pesan'] == "berhasil"){
						echo "<script>setTimeout(function () { 
							swal({
								title: 'Login Berhasil',
								type: 'success',
								showConfirmButton: false,
								timer: 1350,
								});  
								},10); 
								</script>";
								echo "<script>
								setTimeout(function () {
									window.location.href= 'admin/index.php';
									},1230); 
									</script>";
								}else if($_GET['pesan'] == "belum_login"){
									echo "<script>setTimeout(function () { 
										swal({
											title: 'Belum Login',
											type: 'warning',
											text: 'Anda Harus Login',
											});  
											},10); 
											</script>";
										}
									}
									?>
									<div class="row">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div id="login">

											</div>
										</div>
										<div class="col-md-3"></div>
									</div>
								</div>

								<script type="text/javascript">
									$(document).ready(function(){
										var konten = $("#login");
										$.ajax({
											url:'login/login.php',
											success:function(hasil) {
												konten.html(hasil);
											}
										})
									});
								</script>
							</body>
							</html>