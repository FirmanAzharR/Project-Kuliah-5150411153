<style type="text/css">
.input{
	border:none;
	width: auto; 
}	
</style>

<div style="padding: 20px" class="animated fadeIn">
	<h4>Kepala Sekolah</h4>
	<hr>
	<div class="row">
		<?php $id='1'; $select=$data->one_select_kepala($id); ?>
		<div class="col-md-4" style="border-right: 1px #ddd solid">
			<center><img  style="width: 65%;margin-top: 15%" src="foto/<?php echo $select['gambar']?>" class="img-circle card-img-top img-fluid img-thumbnail"></center>
			<hr>
			<center><h6><?php echo $select['nama']; ?></h6></center>
		</div>
		<div class="col-md-8">
			<form method="post" enctype="multipart/form-data">
				<table class="table table-hover table-responsive table-bordered">
					<tbody style="opacity: 0.7;">
						<tr>
							<td><i class="fa fa-book"></i>&nbsp;&nbsp;NIP</td>
							<td><input autocomplete="off" class="input" type="text" name="nip" value="<?php echo $select['nip']; ?>"></td>
						</tr>
						<tr>
							<td width="300px"><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td width="530px"><input autocomplete="off" class="input" type="text" name="nama" value="<?php echo $select['nama']; ?>"><input autocomplete="off" class="input" type="hidden" name="id" value="<?php echo $select['id']; ?>"></td>
						</tr>
						<tr>
							<td><i class="fa fa-mars-stroke"></i>&nbsp;&nbsp;Jenis Kelamin</td>
							<td><select name="jenkel" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
								<option value="" disabled selected>Pilih Jenis Kelamin</option>
								<option value="L" <?php if ($select['jenkel']=="L") {
									echo "selected";
								} ?>>Laki - Laki</option>
								<option value="P" <?php if ($select['jenkel']=="P") {
									echo "selected";
								} ?>>Perempuan</option>
							</select></td>
						</tr>
						<tr>
							<td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Tempat / Tanggal Lahir</td>
							<td><input autocomplete="off" style="width: 30%" class="input" type="text" name="tmpt_lhr" value="<?php echo $select['tmpt_lhr']; ?>"><input autocomplete="off" class="input" type="date" name="tgl_lhr" value="<?php echo $select['tgl_lhr']; ?>"></td>
						</tr>
						<tr>
							<td><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat</td>
							<td><input autocomplete="off" class="input" type="text" name="alamat" value="<?php echo $select['alamat']; ?>"></td>
						</tr>	
						<tr>
							<td><i class="fa fa-comment"></i>&nbsp;&nbsp;Email</td>
							<td><input autocomplete="off" class="input" type="text" name="email" value="<?php echo $select['email']; ?>"></td>
						</tr>
						<tr>
							<td><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Telepon</td>
							<td><input autocomplete="off" class="input" type="text" name="telepon" value="<?php echo $select['telepon']; ?>"></td>
						</tr>
						<tr>
							<td><i class="fa fa-image"></i>&nbsp;&nbsp;Foto</td>
							<td><img src="foto/<?php echo $select['gambar']?>" width="100px" class="img-thumbnail">&nbsp;&nbsp;<input type="file" name="foto" accept="image/png, image/jpeg"></td>
						</tr>
						<tr>
							<td>
								<button name="simpan" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;Simpan</button>
							</td>
						</tr>
						<?php if (isset($_POST['simpan'])) {
							$data->update_kepala($_POST['id'],$_POST['nip'],$_POST['nama'],$_POST['jenkel'],$_POST['tmpt_lhr'],$_POST['tgl_lhr'],$_POST['alamat'],$_POST['email'],$_POST['telepon'],$_FILES['foto']);
						} ?>
					</tbody>
				</table>
			</form>					
		</div>
	</div>

</div>