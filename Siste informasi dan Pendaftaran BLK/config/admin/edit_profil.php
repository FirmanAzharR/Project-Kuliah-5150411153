	<style type="text/css">
	.img-circle {
		vertical-align: middle;
		width:200px;
		border-radius: 20%;
		margin-top: 20px
	}

	.card-avatar{
		border-bottom-right-radius: 30%;
		margin-right: 10px 
	}
</style>

<div style="padding: 25px" class="animated fadeIn" id="show">
	<?php $select=$data->profil_admin($_GET['id']); ?>
	<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-avatar">
					<center><img src="../../img/avatar.png" class="img-circle card-img-top img-fluid"></center>
					<div class="card-body">
						<hr>
						<div class="card-text" align="center" style="font-weight: bold;font-size: 20px;color: #7A7A7D">Administrator</div>
					</div>
				</div>
			</div>
			<div class="col-md-8" style="border-left: 1px #ddd solid">
				<table class="table table-hover table-responsive" style="margin-left: 10px">
					<tbody style="opacity: 0.7;">	
						<tr>
							<td width="300px"><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td width="530px"><input type="text" class="form-control" name="nama" value="<?php echo $select['nama'] ?>"></td>
						</tr>
						<tr>
							<td><i class="fa fa-mars-stroke"></i>&nbsp;&nbsp;Jenis Kelamin</td>
							<td>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-mars-stroke"></i></span>
									</div>
									<select name="jenkel" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
										<option value="" disabled selected>Pilih Jenis Kelamin</option>
										<option value="L" <?php if ($select['jenis_kelamin']=="L") {
											echo "selected";
										} ?>>Laki - Laki</option>
										<option value="P" <?php if ($select['jenis_kelamin']=="P") {
											echo "selected";
										} ?>>Perempuan</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat</td>
							<td><input type="text" class="form-control" name="alamat" value="<?php echo $select['alamat'] ?>"></td>
						</tr>	
						<tr>
							<td><i class="fa fa-comment"></i>&nbsp;&nbsp;Email</td>
							<td><input type="text" class="form-control" name="email" value="<?php echo $select['email'] ?>"></td>
						</tr>
						<tr>
							<td><i class="fa fa-key"></i>&nbsp;&nbsp;Password</td>
							<td><input type="text" class="form-control" name="password" value="<?php echo $select['password'] ?>"></td>
						</tr>
						<tr>
							<td><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Telepon</td>
							<td><input type="text" class="form-control" name="telp" value="<?php echo $select['telepon'] ?>"></td>
						</tr>	
					</tbody>
				</table>	
				<button name="edit" type="submit" class="btn btn-success btn-sm" style="color: white;margin-left: 10px"><i class="fa fa-save"></i>&nbsp;Simpan</button>
				<?php 
				if (isset($_POST['edit'])) {
					$data->edit_profil_admin($_GET['id'],$_POST['nama'],$_POST['email'],$_POST['password'],$_POST['telp'],$_POST['jenkel'],$_POST['alamat']);
				}
				?>
				<a href="index.php?halaman=profil" id="back" class="btn btn-danger btn-sm" style="color: white;margin-left: 10px"><i class="fa fa-close"></i>&nbsp;Batal</a>	
			</div>
		</div>
	</form>

</div>
