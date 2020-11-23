<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login Admin || Pegawai</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons.png">
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<?php 
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "gagal"){
		echo "<script>setTimeout(function () { 
			swal({
				title: 'Login Gagal',
				icon: 'error',
				});  
				},10); 
				</script>";
}

if($_GET['pesan'] == "admin"){
	echo "<script>setTimeout(function () { 
		swal({
			title: 'Login Berhasil Sebagai Admin',
			icon: 'success',
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
}

if($_GET['pesan'] == "pemanggil_bp_gigi"){
	echo "<script>setTimeout(function () { 
		swal({
			title: 'Login Berhasil Sebagai Pemanggil BP Gigi',
			icon: 'success',
			showConfirmButton: false,
			timer: 1350,
			});  
			},10); 
			</script>";
			echo "<script>
			setTimeout(function () {
				window.location.href= 'pemanggil_bp_gigi/index.php';
				},1230); 
				</script>";
}

if($_GET['pesan'] == "pemanggil_bp_umum"){
	echo "<script>setTimeout(function () { 
		swal({
			title: 'Login Berhasil Sebagai pemanggil BP Umum',
			icon: 'success',
			showConfirmButton: false,
			timer: 1350,
			});  
			},10); 
			</script>";
			echo "<script>
			setTimeout(function () {
				window.location.href= 'pemanggil_bp_umum/index.php';
				},1230); 
				</script>";
}

if($_GET['pesan'] == "kepala"){
	echo "<script>setTimeout(function () { 
		swal({
			title: 'Login Berhasil Sebagai Kepala Puskesmas',
			icon: 'success',
			showConfirmButton: false,
			timer: 1350,
			});  
			},10); 
			</script>";
			echo "<script>
			setTimeout(function () {
				window.location.href= 'kepala/index.php';
				},1230); 
				</script>";
}

if($_GET['pesan'] == "belum_login"){
	echo "<script>setTimeout(function () { 
		swal({
			title: 'Belum Login',
			icon: 'warning',
			text: 'Anda Harus Login',
			});  
			},10); 
			</script>";
		}
	}
	?>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><h3>Login Puskesmas Bansari</h3></div>
							</div>
							<form class="form-auth-small" action="login/proses_login.php" method="post">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input name="username" type="email" class="form-control"  id="signin-email" value="" placeholder="Email" required>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name="password" type="password" class="form-control"  id="signin-password" value="" placeholder="Password" required>
								</div>

								<input  maxlength="4" type="text" name="captcha" class="form-control" placeholder="Input Captcha" aria-label="Input Captcha" aria-describedby="basic-addon1"  autocomplete="off">
								<br>
								<img src="login/captcha/captcha.php"/>
								<button type="submit" class="btn btn-success btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#" id="forgot">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading"></p>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- END WRAPPER -->

		<script type="text/javascript">
			$(document).ready(function(){
				$('input').attr('autocomplete','off');
				$
				$("#forgot").click(function(){
				$.ajax({
					url:'login/forgot.php',
					success:function(hasil) {
					$('#wrapper').html(hasil);
					}
				})
		});
			})
		</script>
	</body>

	</html>


