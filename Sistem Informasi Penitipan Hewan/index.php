<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
	<!--===============================================================================================-->
	<!--===============================================================================================-->	
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
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
								window.location.href= 'user/index.php';
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

								<div class="limiter">
									<div class="container-login100" style="background-image: url('assets/login/images/img-01.jpg');">
										<div id="isi">
											<div class="wrap-login100 p-t-100 p-b-80"> 
												<form class="login100-form validate-form" method="post" action="login/proses_login.php">
													<div class="login100-form-avatar">
														<img src="assets/login/images/avatar-01.jpg" alt="AVATAR">
													</div>

													<span class="login100-form-title p-t-20 p-b-45">
														Login Griya Satwa
													</span>

													<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
														<input type="text" name="usr" placeholder="Username" class="input100" autocomplete="off">
														<span class="focus-input100"></span>
														<span class="symbol-input100">
															<i class="fa fa-user"></i>
														</span>
													</div>

													<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
														<input type="password" name="pass" class="input100" placeholder="Password">
														<span class="focus-input100"></span>
														<span class="symbol-input100">
															<i class="fa fa-lock"></i>
														</span>
													</div>

													<div class="container-login100-form-btn p-t-10">
														<button class="login100-form-btn">
															Login
														</button>
													</div>
												</form>
												<div class="container-login100-form-btn p-t-10">
													<button class="login100-form-btn" id="forget" style="background-color: #293eff">
														Forgot Password ?
													</button>
												</div>
												<div class="container-login100-form-btn p-t-10">
													<button class="login100-form-btn" id="akun_baru" style="background-color: #DC4F41">
														Create New Account
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>

								<script type="text/javascript">
									$(document).ready(function(){
										$('#forget').on('click',function(){
											$('#isi').load('login/forgot.php');
										})
										$('#akun_baru').on('click',function(){
											$('#isi').load('akun_baru.php');
										})
									})
								</script>

								<!--===============================================================================================-->
								<script src="assets/login/vendor/select2/select2.min.js"></script>
								<!--===============================================================================================-->
								<script src="assets/login/js/main.js"></script>
								<script src="assets/login/js/sweetalert2.all.min.js"></script>

							</body>
							</html>