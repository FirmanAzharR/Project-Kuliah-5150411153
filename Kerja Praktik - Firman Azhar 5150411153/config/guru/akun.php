<style type="text/css">
.img {
	border-radius: 40%;
	margin-top: 20px;
}
</style>

<script>
function visible() {
    var x = document.getElementById("password");
    if (x.type === "password") 
    {
        x.type = "text";
    } 
    else 
    {
        x.type = "password";
    }
}
</script>

<div style="padding: 20px" class="">
	<?php 
	$niss=$_SESSION['id'];
	$guru=$user->select_guru($niss); 
	?>
	<h4>Akun Guru</h4>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<center>
				<div class="card" style="width: 18rem;">
					<img width="150px" align="center" class="img-fluid img-thumbnail img" src="../admin/foto/<?php echo $guru['gambar']; ?>">
					<div class="card-body">
						<h6 class="card-title" align="center"><?php echo $guru['nama']; ?></h6>
						<hr>
						<?php $akun=$data->profil_akun($niss); ?>
						<form method="post">
							<div class="form-group">
								<input type="text" readonly name="username" class="form-control" value="<?php echo $akun['username']; ?>">
							</div>
							<div class="input-group mb-3">
								<input type="password" name="password" id="password" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo $akun['password']; ?>">
								<div class="input-group-append">
									<button onclick="visible();" class="btn btn-secondary" type="button"><i id="icon" class="fa fa-eye"></i></button>
								</div>
							</div>
							<button name="simpan" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;Simpan</button>
							<?php 
								if (isset($_POST['simpan'])) {
									$data->akun_update($_POST['username'],$_POST['password']);
								}
							 ?>
						</form>
					</div>
				</div>
			</center>
		</div>
	</div>
</div>