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
	<?php $select=$data->profil_admin($admin); ?>
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
						<td width="530px"><?php echo $select['nama'] ?><input type="hidden" name="id" value="<?php echo $select['id']; ?>"></td>
					</tr>
					<tr>
						<td><i class="fa fa-mars-stroke"></i>&nbsp;&nbsp;Jenis Kelamin</td>
						<td><?php if ($select['jenis_kelamin']=="L") {
							echo "Laki-Laki";
						}else{
							echo "Perempuan";
						} ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat</td>
						<td><?php echo $select['alamat'] ?></td>
					</tr>	
					<tr>
						<td><i class="fa fa-comment"></i>&nbsp;&nbsp;Email</td>
						<td><?php echo $select['email'] ?></td>
					</tr>
						<tr>
						<td><i class="fa fa-key"></i>&nbsp;&nbsp;Password</td>
						<td><?php echo $select['password'] ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Telepon</td>
						<td><?php echo $select['telepon'] ?></td>
					</tr>	
				</tbody>
			</table>	
			<a href="index.php?halaman=editadmin&id=<?php echo $select['id']; ?>" class="btn btn-warning btn-sm" style="color: white;margin-left: 10px"><i class="fa fa-edit"></i>&nbsp;Edit</a>	
		</div>
	</div>