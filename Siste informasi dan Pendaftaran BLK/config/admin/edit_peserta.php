<?php $peserta=$data->select_peserta($_GET['id']);  ?>
<div style="margin-left: 15px;margin-right: 15px">
	<div class="row">
		<div class="col-md-6">
			<h4 id="judul">Edit Peserta</h4>
		</div>
	</div>
	<hr style="border: 1px solid #ffcc00;">
	<div id="show">
		<input type="hidden" name="id_peserta" value="<?php echo $_GET['id']; ?>">
		<div class="row">
			<div class="col-md-3">
				<button id="tombol_pribadi" class="btn btn-primary btn-sm"><i class="fa fa-user"></i> Data Pribadi</button><br><hr>
				<button id="tombol_pendidikan" class="btn btn-warning btn-sm"><i class="fa fa-book"></i> Data Pendidikan</button><br><hr>
				<button id="tombol_pendaftaran" class="btn btn-success btn-sm"><i class="fa fa-building"></i> Data Pendaftaran</button><br><hr>
			</div>
			<div class="col-md-9">
				<div id="pribadi">
					<form method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<label style="font-size: 16px;">KTP</label>
								<div class="form-group">
									<input type="text" class="form-control" name="ktp" required autocomplete="off" value="<?php echo $peserta['no_ktp'] ?>">
								</div>
								<label style="font-size: 16px;">Nama Lengkap</label>
								<div class="form-group">
									<input type="text" class="form-control" name="nama" required autocomplete="off" value="<?php echo $peserta['nama_peserta'] ?>">
								</div>
								<label style="font-size: 16px;">Jenis Kelamin</label>
								<div class="form-group">
									<select name="jenkel" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
										<option value="" disabled selected>Pilih Jenis Kelamin</option>
										<option value="L" <?php if ($peserta['jenkel']=="L") {
											echo "selected";
										} ?>>Laki - Laki</option>
										<option value="P" <?php if ($peserta['jenkel']=="P") {
											echo "selected";
										} ?>>Perempuan</option>
									</select>
								</div>
								<label style="font-size: 16px;">Tempat/Tanggal Lahir</label>
								<div class="form-group">
									<input type="text" class="form-control" name="tempat" required autocomplete="off" value="<?php echo $peserta['tempat'] ?>">
									<br>
									<input type="date" class="form-control" name="tanggal" required autocomplete="off" value="<?php echo $peserta['tanggal'] ?>">
								</div>
								<label style="font-size: 16px;">Alamat</label>
								<div class="form-group">
									<textarea name="alamat" class="form-control"><?php echo $peserta['alamat'] ?></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<label style="font-size: 16px;">Provinsi</label>
								<div class="form-group">
									<select class="form-control" id="prov" name="prov" class="form-group" required>
									</select>
									<input type="hidden" name="id_prov" id="id_prov" value="<?php echo $peserta['id_provinsi'] ?>">
									<input type="hidden" name="nama_prov" id="nama_prov" value="<?php echo $peserta['provinsi'] ?>">
								</div>
								<label style="font-size: 16px;">Kabupaten/Kota</label>
								<div class="form-group">
									<select class="form-control" id="kab" name="kab" class="form-group" required>
									</select>
									<input type="hidden" name="id_kota" id="id_kota" value="<?php echo $peserta['id_kota'] ?>">
									<input type="hidden" name="nama_kota" id="nama_kota" value="<?php echo $peserta['kota'] ?>">
								</div>
								<label style="font-size: 16px;">No Telepon/HP</label>
								<div class="form-group">
									<input type="number" class="form-control" name="telp" required autocomplete="off" value="<?php echo $peserta['telepon'] ?>">
								</div>
								<label style="font-size: 16px;">Email</label>
								<div class="form-group">
									<input type="email" class="form-control" name="email" required autocomplete="off" value="<?php echo $peserta['email'] ?>">
								</div>
								<label style="font-size: 16px;">Password</label>
								<div class="form-group">
									<input type="text" class="form-control" name="password" required autocomplete="off" value="<?php echo $peserta['password'] ?>">
								</div>
								<label style="font-size: 16px;">Agama</label>
								<div class="form-group">
									<select class="form-control" id="agama" name="agama" class="form-group" required>
										<option>Pilih Agama</option>
										<option value="Islam" <?php if ($peserta['agama']=="Islam") {
											echo "selected";
										} ?>>ISLAM</option>
										<option value="Budha" <?php if ($peserta['agama']=="Budha") {
											echo "selected";
										} ?>>BUDHA</option>
										<option value="Hindu" <?php if ($peserta['agama']=="Hindu") {
											echo "selected";
										} ?>>HINDU</option>
										<option value="Kristen" <?php if ($peserta['agama']=="Kristen") {
											echo "selected";
										} ?>>KRISTEN</option>
										<option value="Katolik" <?php if ($peserta['agama']=="Katolik") {
											echo "selected";
										} ?>>KATOLIK</option>
									</select>
								</div>
								<label style="font-size: 16px;">Upload Foto</label>
								<div class="form-group">
									<input id="foto" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="foto" autocomplete="off">
								</div>
								<table class="table">
									<tr>
										<td><img class="img-thumbnail" src="../../foto/<?php echo $peserta['foto']?>" width="150px"></td>
										<td><img id="preview" class="img-thumbnail" src="#" width="150px"></td>									
									</tr>
								</table>

							</div>
						</div>
						<hr>
						<button style="float: right" type="submit" name="datadiri" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Simpan</button>
						<?php 
						if (isset($_POST['datadiri'])){
							$data->update_datadiri($_GET['id'],$_POST['ktp'],$_POST['nama'],$_POST['jenkel'],$_POST['tempat'],$_POST['tanggal'],$_POST['alamat'],$_POST['prov'],$_POST['nama_prov'],$_POST['kab'],$_POST['nama_kota'],$_POST['telp'],$_POST['email'],$_POST['agama'],$_FILES['foto'],$_POST['password']);
						}
						?>
					</form>
				</div>
				<div id="pendidikan">
					<form method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-6">
								<label style="font-size: 16px;">Pendidikan Terakhir</label>
								<div class="form-group">
									<select class="form-control" id="pend" name="pend" class="form-group" required>
										<option value="">Pilih Pendidikan</option>
										<?php $pend=$data->tampil_pendidikan()?>
										<?php foreach ($pend as $key => $value): ?>
											<?php echo "<option value='".$value['id_pendidikan']."'"?> 
											<?php 
											if ($value['id_pendidikan']==$peserta['pendidikan']) {
												echo "selected";
											}?> <?php echo ">"; ?><?php echo $value['nama_pendidikan']; ?></option>
										<?php endforeach ?>
									</select>
									<input type="hidden" name="id_pendidikan" value="<?php echo $peserta['pendidikan'] ?>">
								</div>
								<label style="font-size: 16px;">Jurusan</label>
								<div class="form-group">
									<select class="form-control" id="jurusan" name="jurusan" class="form-group" required>
									</select>
									<input type="hidden" name="id_jurusan" id="id_jurusan" value="<?php echo $peserta['jurusan'] ?>">
								</div>
								<label style="font-size: 16px;">Asal Sekolah</label>
								<div class="form-group">
									<input type="text" class="form-control" name="sekolah" required autocomplete="off" value="<?php echo $peserta['asal_sekolah'] ?>">
								</div>
								<label style="font-size: 16px;">Upload Ijazah</label>
								<div class="form-group">
									<input id="ijazah" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="ijazah" autocomplete="off">
								</div>
								<table class="table">
									<tr>
										<td><img class="img-thumbnail" src="../../file/<?php echo $peserta['file']?>" width="150px"></td>
										<td><img id="preview1" class="img-thumbnail" src="#" width="150px"></td>									
									</tr>
								</table>
								<button style="float: right" name="update_pendidikan" type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Simpan</button>
								<?php 
								if (isset($_POST['update_pendidikan'])){
									$data->update_pendidikan($_GET['id'],$_POST['pend'],$_POST['jurusan'],$_POST['sekolah'],$_FILES['ijazah']);
								}
								?>
							</div>
							<div class="col-md-4"></div>
						</div>
					</form>
				</div>
				<div id="pendaftaran">
					<form method="post">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-6">
								<label style="font-size: 16px;">Kejuruan</label>
								<div class="form-group">
									<select class="form-control" id="kejuruan" name="kejuruan" class="form-group" required>
										<?php $kejuruan=$data->tampil_kejuruan()?>
										<?php foreach ($kejuruan as $key => $value): ?>
											<?php echo "<option value='".$value['id']."'"?> 
											<?php 
											if ($value['id']==$peserta['kejuruan']) {
												echo "selected";
											}?> <?php echo ">"; ?><?php echo $value['nama']; ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<label style="font-size: 16px;">Sub Kejuruan</label>
								<div class="form-group">
									<select class="form-control" id="sub" name="sub" class="form-group" required>
									</select>
									<input type="hidden" id="id_sub" value="<?php echo $peserta['sub'] ?>">
								</div>
								<label style="font-size: 16px;">Program</label>
								<div class="form-group">
									<select class="form-control" id="prog" name="prog" class="form-group" required>
									</select>
									<input type="hidden" id="id_program" value="<?php echo $peserta['program'] ?>">
								</div>
								<button name="update_pendaftaran" style="float: right" type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Simpan</button>
								<?php 
								if (isset($_POST['update_pendaftaran'])){
									$data->update_pendaftaran($_GET['id'],$_POST['kejuruan'],$_POST['sub'],$_POST['prog']);
								}
								?>
							</div>
							<div class="col-md-4"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--end of warper-->
</div>

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURL1(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#preview1').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#foto").change(function(){
		readURL(this);
	});

	$("#ijazah").change(function(){
		readURL1(this);
	});
</script>

<script type="text/javascript">

		//ambil data program id on load
		$(document).ready(function(){
			var id_sub=$("#id_sub").val();
			var program = $("select[name=prog]");
			var id_program=$("#id_program").val();
			$.ajax({
				url:'data_program.php',
				type:'POST',
				data:'id_sub=' + id_sub + '&id_prog=' + id_program,
				success:function(hasil){
					program.html(hasil);
				}
			})
		});

		//on change sub to program
		$(document).ready(function(){
			$("select[name=sub]").on("change",function(){
				var id_program=$("#id_program").val();
				var id_sub = $(this).val();
				var program = $("select[name=prog]");
				$.ajax({
					url:'data_program.php',
					type:'POST',
					data:'id_sub=' + id_sub + '&id_prog=' + id_program,
					success:function(hasil){
						program.html(hasil);
					}
				})
			})
		});


		//ambil data sub berdasar id on load
		$(document).ready(function(){
			var id_kejuruan=$("select[name=kejuruan]").val();
			var sub = $("select[name=sub]");
			var id_sub=$("#id_sub").val();
			$.ajax({
				url:'data_subkejuruan.php',
				type:'POST',
				data:'id_kejuruan=' + id_kejuruan + '&id_subkejuruan=' + id_sub,
				success:function(hasil){
					sub.html(hasil);
				}
			})
		});

		//on change kejuruan to sub
		$(document).ready(function(){
			$("select[name=kejuruan]").on("change",function(){
				var id_sub = $("#id_jurusan").val();
				var id_kejuruan = $(this).val();
				var sub=$("select[name=sub]");
				$.ajax({
					url:'data_subkejuruan.php',
					type:'POST',
					data:'id_kejuruan=' + id_kejuruan + '&id_subkejuruan=' + id_sub,
					success:function(hasil){
						sub.html(hasil);
					}
				})
			})
		});

		//ambil data jurusan berdasar id on load
		$(document).ready(function(){
			var id_pend=$("select[name=pend]").val();
			var jurusan = $("select[name=jurusan]");
			var id_jurusan=$("#id_jurusan").val();
			$.ajax({
				url:'data_jurusan.php',
				type:'POST',
				data:'id_pend=' + id_pend + '&id_jrsn=' + id_jurusan,
				success:function(hasil){
					jurusan.html(hasil);
				}
			})
		});


		//on change pend to jurusan
		$(document).ready(function(){
			$("select[name=pend]").on("change",function(){
				var id_jurusan = $("#id_jurusan").val();
				var id_pend = $(this).val();
				var jurusan=$("select[name=jurusan]");
				$.ajax({
					url:'data_jurusan.php',
					type:'POST',
					data:'id_pend=' + id_pend + '&id_jrsn=' + id_jurusan,
					success:function(hasil){
						jurusan.html(hasil);
					}
				})
			})
		});

		//ambil data prov berdasar id on load
		$(document).ready(function(){
			var id = $("#id_prov").val();
			var prov=$("select[name=prov]");
			$.ajax({
				url:'data_provinsi.php',
				type:'POST',
				data:'id='+id,
				success:function(hasil){
					prov.html(hasil);
				}
			})
		});

		//ambil data kota berdasar id on load
		$(document).ready(function(){
			var id_kota = $("#id_kota").val();
			var id_prov = $("#id_prov").val();
			var kota=$("select[name=kab]");
			$.ajax({
				url:'data_kota.php',
				type:'POST',
				data:'id_kota=' + id_kota + '&id_prov=' + id_prov,
				success:function(hasil){
					$("select[name=kab]").html(hasil);
				}
			})
		});

		//on change prov to kota
		$(document).ready(function(){
			$("select[name=prov]").on("change",function(){
				var id_kota = $("#id_kota").val();
				var id_prov = $(this).val();
				var kota=$("select[name=kab]");
				var nama_provinsi = $('option:selected', this).attr('nama');
				$("input[name=nama_prov]").val(nama_provinsi);
				$("input[name=id_prov]").val(id_prov);
				$.ajax({
					url:'data_kota.php',
					type:'POST',
					data:'id_kota=' + id_kota + '&id_prov=' + id_prov,
					success:function(hasil){
						$("select[name=kab]").html(hasil);
					}
				})
			})
		});

		$(document).ready(function(){
			$("select[name=kab]").on("change",function(){
				var id_kota = $(this).val();
				var nama_kota = $('option:selected', this).attr('nama_kota');

				$("input[name=nama_kota]").val(nama_kota);
				$("input[name=id_kota]").val(id_kota);
			})
		});

	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#pribadi').hide();
			$('#pendidikan').hide();
			$('#pendaftaran').hide();

			$('#tombol_pribadi').on('click', function() {
				$('#pribadi').toggle(300);
				$('#pendidikan').hide();
				$('#pendaftaran').hide();
			});

			$('#tombol_pendidikan').on('click', function() {
				$('#pendidikan').toggle(300);
				$('#pribadi').hide();
				$('#pendaftaran').hide();
			});

			$('#tombol_pendaftaran').on('click', function() {
				$('#pendaftaran').toggle(300);
				$('#pribadi').hide();
				$('#pendidikan').hide();
			});
		});
	</script>