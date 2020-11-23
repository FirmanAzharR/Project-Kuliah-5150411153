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

<div class="form-auth-small">
	<center><div class="card" style="margin-top: 200px;margin-bottom: 30px;width: auto;border-radius: 0px">
		<div class="card-body">
			<div style="text-align: center;padding: 2px">
				<h5>
					<img src="assets/img/logo.png" width="35px" style="position: relative;margin-right: 10px">
					Prediksi Kelulusan Mahasiswa TI UTY
				</h5>
			</div>
			<hr class="colorgraph">
			<form method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
					</div>
					<input type="email" name="email" id="email" class="form-control" placeholder="Email yang terkait" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off">
				</div>
				<div id="notif">
					
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<a style="color: white" id="kirim" href="#" class="btn btn-success btn-block"><i class="fa fa-send"></i>&nbsp;Kirim</a>
						</div>
					</div>
					<div class="col-md-6">
						<a id="back" class="btn btn-primary btn-block" href="#"><i class="fa fa-sign-out"></i>&nbsp;Login</a>
					</div>
				</div>
			</form>
		</div>
	</div></center>
	<div style="margin-bottom: 70px"></div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var link = $("#back");
		var konten = $("#login");
		link.on('click',function(){
			$.ajax({
				url:'login/login.php',
				success:function(hasil) {
					konten.html(hasil);
				}
			});
		});
	});

	$(document).ready(function(){
		var send = $("#kirim");
		var notif = $("#notif");
		send.on('click',function(){
			notif.html('<div class="alert alert-info"><i class="fa fa-spinner"></i>&nbsp;&nbsp;Sedang Mengirim Data<div>');
			var email = $("#email").val();
			$.ajax({
				url:'login/proses_forgot.php',
				type:'POST',
				data:'email='+email,
				success:function(hasil) {
					notif.html(hasil);
				}
			});
		});
	});
</script>
