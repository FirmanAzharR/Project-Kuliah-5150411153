<div style="margin-left: 15px;margin-right: 15px">
	<?php $data=$data->select_peserta($_GET['id']); ?>
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Detail Peserta</h4>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<div class="row">
			<div class="col-md-2">
				<h6>Berkas File</h6>
					<div class="form-group">
						<table class="table">
							<tr>
								<td style="width: 150px"><i class="fa fa-book"></i>&nbsp;&nbsp;Foto</td>
							</tr>
							<tr>
								<td style="width: 150px"><img src="../../foto/<?php echo $data['foto']?>" width="30px"></td>
							</tr>
							<tr>
								<td style="width: 150px"><i class="fa fa-book"></i>&nbsp;&nbsp;Ijazah</td>
							</tr>
							<tr>
								<td style="width: 150px"><img src="../../file/<?php echo $data['file']?>" width="30px"></td>
							</tr>
						</table>
					</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<h6>Data Pribadi</h6>
					<table class="table">
						<tr>
							<td style="width: 120px"><i class="fa fa-user"></i>&nbsp;&nbsp;Nama</td>
							<td><?php echo $data['nama_peserta']; ?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-intersex"></i>&nbsp;&nbsp;Jenis</td>
							<td><?php  if ($data['jenkel']=="L") {
								echo "Laki-laki";
							}else{
								echo "Perempuan";
							}
							?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Tempat</td>
							<td><?php echo $data['tempat']; ?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Tanggal</td>
							<td><?php echo $data['tanggal']; ?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-building"></i>&nbsp;&nbsp;Agama</td>
							<td><?php echo $data['agama']; ?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat</td>
							<td><?php echo $data['alamat']; ?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Provinsi</td>
							<td><?php echo $data['provinsi']; ?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-building"></i>&nbsp;&nbsp;Kota</td>
							<td><?php echo $data['kota']; ?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-phone"></i>&nbsp;&nbsp;Telepon</td>
							<td><?php echo $data['telepon']; ?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Email</td>
							<td><?php echo $data['email']; ?></td>
						</tr>
						<tr>
							<td style="width: 120px"><i class="fa fa-key"></i>&nbsp;&nbsp;Password</td>
							<td><?php echo $data['password']; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-md-5" style="border-left: 1px solid #D4D4D4">
				<h6>Data Pendidikan</h6>
				<div class="form-group">
					<table class="table">
						<tr>
							<td style="width: 150px"><i class="fa fa-university"></i>&nbsp;&nbsp;Asal Sekolah</td>
							<td><?php echo $data['asal_sekolah']; ?></td>
						</tr>
						<tr>
							<td style="width: 150px"><i class="fa fa-book"></i>&nbsp;&nbsp;Pendidikan</td>
							<td><?php echo $data['nama_pendidikan']; ?></td>
						</tr>
						<tr>
							<td style="width: 150px"><i class="fa fa-file"></i>&nbsp;&nbsp;Jurusan</td>
							<td><?php echo $data['nama_jurusan']; ?></td>
						</tr>
					</table>
					<hr>
					<h6>Data Pendaftaran</h6>
					<div class="form-group">
						<table class="table">
							<tr>
								<td style="width: 150px"><i class="fa fa-book"></i>&nbsp;&nbsp;Kejuruan</td>
								<td><?php echo $data['nama']; ?></td>
							</tr>
							<tr>
								<td style="width: 150px"><i class="fa fa-book"></i>&nbsp;&nbsp;Sub Kejuruan</td>
								<td><?php echo $data['nama_sub']; ?></td>
							</tr>
							<tr>
								<td style="width: 150px"><i class="fa fa-file"></i>&nbsp;&nbsp;Program</td>
								<td><?php echo $data['nama_program']; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<!--end of warper-->
</div>
