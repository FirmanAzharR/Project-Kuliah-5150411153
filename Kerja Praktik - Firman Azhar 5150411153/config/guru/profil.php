<div style="padding: 20px" class="animated fadeIn">
	<?php 
	$nip=$_SESSION['id']; 
	$select=$user->select_guru($nip); 
	?>
	<h4>Detail Guru</h4>
	<hr>
	<div class="row">
		<div class="col-md-4" style="border-right: 1px #ddd solid">
			<center><div class="card" style="width: 18rem; text-align: center;">
				<img src="../admin/foto/<?php echo $select['gambar']?>" width="100px" class="card-img-top">
				<div class="card-body">
					<hr>
					<h5 class="card-title" align="center"><?php echo $select['nama']; ?></h5>
					<hr>
				</div>
			</div>
			<hr>
		</center>
	</div>
	<div class="col-md-8">
		<table class="table table-hover table-responsive table-bordered">
			<tbody style="opacity: 0.7;">	
				<tr>
					<td width="300px"><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width="530px"><?php echo $select['nama']; ?></td>
				</tr>
				<tr>
					<td><i class="fa fa-mars-stroke"></i>&nbsp;&nbsp;Jenis Kelamin</td>
					<td><?php echo $select['jenkel']; ?></td>
				</tr>
				<tr>
					<td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Tempat / Tanggal Lahir</td>
					<td><?php echo $select['tempat_lahir']; ?>, <?php echo $select['tgl_lahir']; ?></td>
				</tr>
				<tr>
					<td><i class="fa fa-star"></i>&nbsp;&nbsp;Agama</td>
					<td><?php echo $select['agama']; ?></td>
				</tr>
				<tr>
					<td><i class="fa fa-plus"></i>&nbsp;&nbsp;Status</td>
					<td><?php echo $select['status']; ?></td>
				</tr>
				<tr>
					<td><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat</td>
					<td><?php echo $select['alamat']; ?></td>
				</tr>	
				<tr>
					<td><i class="fa fa-comment"></i>&nbsp;&nbsp;Email</td>
					<td><?php echo $select['email']; ?></td>
				</tr>
				<tr>
					<td><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Telepon</td>
					<td><?php echo $select['telepon']; ?></td>
				</tr>
				<tr>
					<td><i class="fa fa-tasks"></i>&nbsp;&nbsp;Pendidikan Terakhir</td>
					<td><?php echo $select['pendidikan']; ?></td>
				</tr>
			</tbody>
		</table>					
	</div>
</div>

</div>