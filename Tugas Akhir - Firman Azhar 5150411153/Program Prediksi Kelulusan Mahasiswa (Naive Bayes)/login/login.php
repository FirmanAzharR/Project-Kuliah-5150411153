<style type="text/css">
.colorgraph {
	height: 5px;
	border-top: 0;
	background: #c4e17f;

	border-radius: 5px;
	background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>

<div class="container">
	<center>
		<div class="card" style="width: auto;top: 130px;">
			<div class="card-body">
				<div style="text-align: center;padding: 2px">
					<h5>
						<img src="assets/img/logo.png" width="35px" style="position: relative;margin-right: 10px">
						Prediksi Kelulusan Mahasiswa TI UTY
					</h5>
				</div>
				<hr class="colorgraph">
				<form method="post" action="login/proses_login.php">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
						</div>
						<input type="email" name="username" id="username" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" required>
					</div>
					<div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
							</div>
							<input  maxlength="8" type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
						</div>

						<div class="row">
							<div class="col-md-8">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Captcha</span>
									</div>
									<input  maxlength="4" type="text" name="captcha" class="form-control" placeholder="Input Captcha" aria-label="Input Captcha" aria-describedby="basic-addon1" autocomplete="off">
								</div>
							</div>
							<div class="col-md-4">
								<img src="login/captcha/captcha.php"/>
							</div>
						</div>
					</div> 
					<hr class="colorgraph">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<button name="signin" class="btn btn-success btn-block"><i class="fa fa-sign-in"></i>&nbsp;Login</button>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<a id="forgot" href="#"><i class="fa fa-lock"></i>&nbsp;Lupa password ?</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</center>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var link = $("#forgot");
		var konten = $("#login");
		link.on('click',function(){
			$.ajax({
				url:'login/forgot.php',
				success:function(hasil) {
					konten.html(hasil);
				}
			})
		});
	})
</script>

