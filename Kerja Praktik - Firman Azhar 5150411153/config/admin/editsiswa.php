<div style="padding: 20px" class="animated fadeIn">
	<?php $select=$data->one_select_siswa($_GET['id']); ?>
	<h4>Edit Data Siswa</h4>
	<hr>
	<form method="post" enctype="multipart/form-data">
		<label>Foto Lama</label>
		<div><img src="foto/<?php echo $select['gambar']?>" width="100px" class="img-thumbnail"></div>
		<div class="row" style="margin-top: 10px;border-top: 1px #ddd solid ">
			<div class="col-md-6" style="border-right: 1px #eee solid">
				<label>Foto</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-image"></i></span>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="foto" accept="image/png, image/jpeg">
						<label class="custom-file-label" for="inputGroupFile01">Upload Foto</label>
					</div>
				</div>
				<label>Nama Lengkap</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					</div>
					<input type="text" name="namalengkap" class="form-control" placeholder="Masukan Nama Lengkap" aria-label="nama" aria-describedby="basic-addon1" required="" value="<?php echo $select['nama_siswa'] ?>">
				</div>
				<label>Jenis Kelamin</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-mars-stroke"></i></span>
					</div>
					<select name="jenkel" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
						<option value="" disabled selected>Pilih Jenis Kelamin</option>
						<option value="L" <?php if ($select['jenkel']=="L") {
							echo "selected";
						} ?>>Laki - Laki</option>
						<option value="P" <?php if ($select['jenkel']=="P") {
							echo "selected";
						} ?>>Perempuan</option>
					</select>
				</div>
				<label>Tempat Lahir</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker fa-lg"></i></span>
					</div>
					<input type="text" name="tempatlahir" class="form-control" aria-label="tgllahir" aria-describedby="basic-addon1" required="" placeholder="Tempat Lahir" value="<?php echo $select['tempat_lahir'] ?>">
				</div>
				<label>Tanggal Lahir</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
					</div>
					<?php $dt = date('Y-m-d');?>
					<input type="date" name="tgllahir" max="" min="2000-12-1" class="form-control" aria-label="tgllahir" aria-describedby="basic-addon1" required="" value="<?php echo $select['tgl_lahir'] ?>">
				</div>
				<label>Agama</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa  fa-asterisk"></i></span>
					</div>
					<select name="agama" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required="">
						<option value="" disabled selected>Pilih Agama</option>
						<option value="islam"  <?php if ($select['agama']=="islam") {
							echo "selected";
						} ?>>Islam</option>
						<option value="kristen" <?php if ($select['agama']=="kristen") {
							echo "selected";
						} ?>>Kristen</option>
						<option value="katholik" <?php if ($select['agama']=="katholik") {
							echo "selected";
						} ?>>Katholik</option>
						<option value="hindu" <?php if ($select['agama']=="hindu") {
							echo "selected";
						} ?>>Hindu</option>
						<option value="budha"<?php if ($select['agama']=="budha") {
							echo "selected";
						} ?>>Budha</option>
					</select>
				</div>
				<label>Email</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
					</div>
					<input type="email" name="email" class="form-control" placeholder="contoh@mail.com" aria-label="email" aria-describedby="basic-addon1" required="" value="<?php echo $select['email'] ?>">
				</div>
				<label>Telepon</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
					</div>
					<input type="text" name="telepon" class="form-control" placeholder="Masukan Nomor Telepon" aria-label="telp" aria-describedby="basic-addon1" required="" value="<?php echo $select['telepon'] ?>">
				</div>
				<label>Alamat</label>
				<div class="form-group">
					<textarea name="alamat" class="form-control" placeholder="Masukan Alamat" required=""><?php echo $select['alamat']; ?></textarea>	
				</div>
			</div>
			<div class="col-md-6">
				<label>Jumlah Saudara</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-plus"></i></span>
					</div>
					<input type="text" name="jmlsaudara" class="form-control" placeholder="Jumlah Saudara Kandung" aria-label="jml" aria-describedby="basic-addon1" required="" value="<?php echo $select['jml_saudara'] ?>">
				</div>
				<label>Nama Adik</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-child"></i></span>
					</div>
					<input type="text" name="namaadik" class="form-control" placeholder="Nama Lengkap Adik" aria-label="adik" aria-describedby="basic-addon1" value="<?php echo $select['nama_adik'] ?>">
				</div>
				<label>Nama Kakak</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					</div>
					<input type="text" name="namakakak" class="form-control" placeholder="Nama Lengkap Kakak" aria-label="kakak" aria-describedby="basic-addon1" value="<?php echo $select['nama_kakak'] ?>">
				</div>
				<label>Nama Ayah</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					</div>
					<input type="text" name="namaayah" class="form-control" placeholder="Nama Lengkap Ayah" aria-label="ayah" aria-describedby="basic-addon1" value="<?php echo $select['nama_ayah'] ?>">
				</div>
				<label>Nama Ibu</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					</div>
					<input type="text" name="namaibu" class="form-control" placeholder="Nama Lengkap Ibu" aria-label="ibu" aria-describedby="basic-addon1" value="<?php echo $select['nama_ibu'] ?>">
				</div>
				<label>Pekerjaan Orangtua</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-tasks"></i></span>
					</div>
					<input type="text" name="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan Ayah / Ibu" aria-label="work" aria-describedby="basic-addon1" required="" value="<?php echo $select['pekerjaan_ortu'] ?>">
				</div>
				<label>Alamat Orangtua</label>
				<div class="form-group">
					<textarea name="alamatortu" class="form-control" placeholder="Masukan Alamat Orangtua" required=""><?php echo $select['alamat_orangtua']; ?></textarea>	
				</div>
				<div  style="padding-top: 65px">
					<hr>
					<div class="form-group" align="right">
						<button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-edit"></i>&nbsp;&nbsp;Simpan</button>
						<?php 
						if(isset($_POST['ubah']))
						{
							$data->update_siswa($_GET['id'],$_POST['namalengkap'],$_POST['jenkel'],$_POST['tempatlahir'],$_POST['tgllahir'],$_POST['agama'],$_POST['alamat'],$_POST['email'],$_POST['telepon'],$_POST['jmlsaudara'],$_POST['namaadik'],$_POST['namakakak'],$_POST['namaayah'],$_POST['namaibu'],$_POST['pekerjaan'],$_POST['alamatortu'],
								$_FILES['foto']);
							echo "<script>setTimeout(function () { 
												swal({
													title: 'Update Berhasil',
													type: 'success',
													showConfirmButton: false,
													timer: 1000,
													});  
													},10); 
													window.setTimeout(function(){ 
														window.location.replace('index.php?halaman=siswa');
													} ,1000); </script>";
												}
												?>
								<a class="btn btn-danger" href="index.php?halaman=siswa"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</form>
		</div>