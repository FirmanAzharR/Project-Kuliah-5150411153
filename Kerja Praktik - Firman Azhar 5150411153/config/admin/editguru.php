<div style="padding: 20px" class="animated fadeIn">
	<?php $select=$data->one_select_guru($_GET['id']); ?>

	<h4>Edit Data Guru</h4>
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
					<input type="text" name="namalengkap" class="form-control" placeholder="Masukan Nama Lengkap" aria-label="nama" aria-describedby="basic-addon1" required="" value="<?php echo $select['nama'] ?>">
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
					<input type="date" name="tgllahir" class="form-control" aria-label="tgllahir" aria-describedby="basic-addon1" required="" value="<?php echo $select['tgl_lahir'] ?>">
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
			</div>
			<div class="col-md-6">
				<label>Pendidikan</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-plus"></i></span>
					</div>
					<input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan Terakhir" aria-label="jml" aria-describedby="basic-addon1" required="" value="<?php echo $select['pendidikan']?>">
				</div>
				<label>Status</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-info-circle"></i></span>
					</div>
					<select name="status" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
						<option value="" disabled selected>Status</option>
						<option value="nikah" <?php if ($select['status']=="nikah") {
							echo "selected";
						} ?>>Nikah</option>
						<option value="belum nikah" <?php if ($select['status']=="belum nikah") {
							echo "selected";
						} ?>>Belum Nikah</option>
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
				<div  style="padding-top: 65px">
					<hr>
					<div class="form-group" align="right">
						<button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-edit"></i>&nbsp;&nbsp;Update</button>
						<?php 
						if(isset($_POST['ubah']))
						{
							$data->update_guru($_GET['id'],$_POST['namalengkap'],$_POST['jenkel'],$_POST['tempatlahir'],$_POST['tgllahir'],$_POST['agama'],$_POST['alamat'],$_POST['email'],$_POST['telepon'],$_POST['status'],$_POST['pendidikan'], $_FILES['foto']);
							echo "<script>setTimeout(function () { 
								swal({
									title: 'Update Berhasil',
									type: 'success',
									showConfirmButton: false,
									timer: 800,
									});  
									},10); 
									window.setTimeout(function(){ 
										window.location.replace('index.php?halaman=guru');
									} ,800); </script>";
								}
								?>
								<a class="btn btn-danger" href="index.php?halaman=guru"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</a>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</form>
		</div>