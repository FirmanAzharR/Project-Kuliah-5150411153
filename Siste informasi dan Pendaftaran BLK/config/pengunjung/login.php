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
	<center><div class="card" style="margin-top: 30px;margin-bottom: 30px;width: 500px;border-radius: 0px">
		<div class="card-body">
			<div class="row">
				<div class="col-md-8"><h4 style="float: left">Login BLK</h4></div>
				<div class="col-md-4" style="border-left: 1px solid #ddd"><img src="img/login.png" width="40px"></div>
			</div>
			<hr class="colorgraph">
			<form method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					</div>
					<input type="text" name="username" id="username" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off">
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
							</div>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
						</div>
					</div>
					<div class="col-md-4">
						<input type="kode" name="kode" id="password" class="form-control" placeholder="kode" aria-label="Password" aria-describedby="basic-addon1" autocomplete="off">
					</div>
				</div> 
				<hr class="colorgraph">
				<div class="form-group">
					<button name="signin" class="btn btn-success btn-block"><i class="fa fa-sign-in"></i>&nbsp;Login</button>
				</div>
			</form>
			<hr>
			<?php 
			if(isset($_POST['signin'])){
				$hasil=$data->login($_POST['username'],$_POST['password'],$_POST['kode']);
			}
			?>
			<a href="index.php?halaman=forgot"><i class="fa fa-lock"></i>&nbsp;Lupa password ?</a>
		</form>

	</div>
</div></center>
</div>