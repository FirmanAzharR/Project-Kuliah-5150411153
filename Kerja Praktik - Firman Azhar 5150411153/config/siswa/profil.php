<div style="padding: 20px" class="animated fadeIn">
		<?php 
			$niss=$_SESSION['id'];
			$siswa=$user->select_siswa($niss); 
			?>
	<h4>Detail Siswa</h4>
	<hr>
	<div class="row">
		<div class="col-md-4" style="border-right: 1px #ddd solid">
			<center><div class="card" style="width: 18rem;">
				<img width="300px" align="center" class="img-fluid img-thumbnail" src="../admin/foto/<?php echo $siswa['gambar']; ?>">
				<div class="card-body">
					<hr>
					<h5 class="card-title" align="center"><?php echo $siswa['nama_siswa']; ?></h5>
					<hr>
				</div>
			</div>
		</center>
		</div>
		<div class="col-md-8">
			<table class="table table-hover table-responsive table-bordered">
				<tbody style="opacity: 0.7;">	
					<tr>
						<td width="300px"><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="530px"><?php echo $siswa['nama_siswa']; ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-mars-stroke"></i>&nbsp;&nbsp;Jenis Kelamin</td>
						<td><?php echo $siswa['jenkel']; ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Tempat / Tanggal Lahir</td>
						<td><?php echo $siswa['tempat_lahir']; ?>, <?php echo $siswa['tgl_lahir']; ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-star"></i>&nbsp;&nbsp;Agama</td>
						<td><?php echo $siswa['agama']; ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat</td>
						<td><?php echo $siswa['alamat']; ?></td>
					</tr>	
					<tr>
						<td><i class="fa fa-comment"></i>&nbsp;&nbsp;Email</td>
						<td><?php echo $siswa['email']; ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Telepon</td>
						<td><?php echo $siswa['telepon']; ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-plus"></i>&nbsp;&nbsp;Jumlah Saudara</td>
						<td><?php echo $siswa['jml_saudara']; ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-child"></i>&nbsp;&nbsp;Nama Adik</td>
						<td><?php echo $siswa['nama_adik']; ?></td>
					</tr>						
					<tr>
						<td><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Kakak</td>
						<td><?php echo $siswa['nama_kakak']; ?></td>
					</tr>	
					<tr>
						<td><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Ayah</td>
						<td><?php echo $siswa['nama_ayah']; ?></td>
					</tr>	
					<tr>
						<td><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Ibu</td>
						<td><?php echo $siswa['nama_ibu']; ?></td>
					</tr>	
					<tr>
						<td><i class="fa fa-tasks"></i>&nbsp;&nbsp;Pekerjaan Orangtua</td>
						<td><?php echo $siswa['pekerjaan_ortu']; ?></td>
					</tr>	
					<tr>
						<td><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat Orangtua</td>
						<td><?php echo $siswa['alamat_orangtua']; ?></td>
					</tr>	
				</tbody>
			</table>					
		</div>
	</div>

</div>