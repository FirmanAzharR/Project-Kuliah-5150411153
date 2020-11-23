<div class="container animated fadeIn">
	<div style="margin-top: 15px;margin-bottom: 40px">
		<div class="row">
			<div class="col-md-6" style="border-right: 1px #c2c2c2 solid">
				<img src="img/pelatihan.jpg">
				<div style="background: white;margin-top: 10px;margin-right: 15px; padding: 10px">
					<h5>FORMULIR PENDAFTARAN PELATIHAN</h5><hr>
					<p style="text-align: justify;">
					* Setiap calon peserta hanya dapat mendaftar 1 (satu) kali.</p>
					<hr>
				</div>
			</div>
			<div class="col-md-6">
				<form method="post" enctype="multipart/form-data">
					<div id="formulir" style="background: white;padding: 20px">
						<div id="data_pribadi">
							<input type="hidden" name="kode" value="<?php echo $kode ?>">

							<label style="font-weight: bold">Data Pribadi</label><br>
							<label style="font-size: 16px;">Nomor KTP</label>
							<div class="form-group">
								<input type="number" class="form-control" id="ktp" name="ktp" required autocomplete="off">
							</div>
							<label style="font-size: 16px;">Nama Lengkap</label>
							<div class="form-group">
								<input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
							</div>
							<label style="font-size: 16px;">Jenis Kelamin</label>
							<div class="form-group">
								<select class="form-control" id="jenkel" name="jenkel" class="form-group" required>
									<option disabled selected value="">Jenis Kelamin</option>
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
							<label style="font-size: 16px;">Tempat/Tanggal Lahir</label>
							<div class="form-group">
								<input type="text" class="form-control" id="tempat" name="tempat" required autocomplete="off">
								<br>
								<input type="date" class="form-control" id="tanggal" name="tanggal" required autocomplete="off">
							</div>
							<label style="font-size: 16px;">Alamat</label>
							<div class="form-group">
								<textarea name="alamat" id="alamat" class="form-control"></textarea>
							</div>
							<span id="next" class="btn btn-sm btn-info">Lanjut&nbsp;<i class="fa fa-arrow-right"></i></span>
						</div>
						<div id="data_pribadi_1">
							<label style="font-size: 16px;">Provinsi</label>
							<div class="form-group">
								<select class="form-control" id="prov" name="prov" class="form-group" required>
								</select>
								<input type="text" name="nama_prov" value="">
							</div>
							<label style="font-size: 16px;">Kabupaten/Kota</label>
							<div class="form-group">
								<select class="form-control" id="kab" name="kab" class="form-group" required>
								</select>
								<input type="hidden" name="kota" value="">
							</div>
							<label style="font-size: 16px;">No Telepon/HP</label>
							<div class="form-group">
								<input type="number" class="form-control" id="telp" name="telp" required autocomplete="off">
							</div>
							<label style="font-size: 16px;">Agama</label>
							<div class="form-group">
								<select class="form-control" id="agama" name="agama" class="form-group" required>
									<option>Pilih Agama</option>
									<option value="Islam">ISLAM</option>
									<option value="Budha">BUDHA</option>
									<option value="Hindu">HINDU</option>
									<option value="Kristen">KRISTEN</option>
									<option value="Katolik">KATOLIK</option>
								</select>
							</div>
							<label style="font-weight: bold">Akun Login Pendaftaran</label><br>
							<label style="font-size: 16px;">Email</label>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" required autocomplete="off">
							</div>
							<label style="font-size: 16px;">Password</label>
							<div class="form-group">
								<input type="text" class="form-control" id="password" name="password" required autocomplete="off">
							</div>
							<span id="back" class="btn btn-sm btn-secondary">Kembali&nbsp;<i class="fa fa-arrow-left"></i></span>
							<span id="next1" class="btn btn-sm btn-secondary">Lanjut&nbsp;<i class="fa fa-arrow-right"></i></span>
						</div>
						<div id="data_pendidikan">
							<label style="font-style: 16;font-weight: bold">Pendidikan Terakhir</label><br>
							<label style="font-size: 16px;">Pendidikan</label>
							<div class="form-group">
								<select class="form-control" id="pend" name="pend" class="form-group" required>
								</select>
								<input type="hidden" name="nm_pend" value="">
							</div>
							<label style="font-size: 16px;">Jurusan</label>
							<div class="form-group">
								<select class="form-control" id="jurusan" name="jurusan" class="form-group" required>
								</select>
								<input type="hidden" name="nm_jurusan" value="">
							</div>
							<label style="font-size: 16px;">Asal Sekolah</label>
							<div class="form-group">
								<input type="text" class="form-control" id="sekolah" name="sekolah" required autocomplete="off">
							</div>
							<label style="font-size: 16px;">Upload Foto</label>
							<div class="form-group">
								<input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" id="foto" name="foto" required autocomplete="off">
							</div>
							<label style="font-size: 16px;">Upload File Ijazah</label>
							<div class="form-group">
								<input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" id="file" name="file" required autocomplete="off">
							</div>
							<span id="back1" class="btn btn-sm btn-secondary">Kembali&nbsp;<i class="fa fa-arrow-left"></i></span>
							<span id="next2" class="btn btn-sm btn-secondary">Lanjut&nbsp;<i class="fa fa-arrow-right"></i></span>
						</div>
						<div id="data_pendaftaran">
							<label style="font-size: 16px;">Kejuruan</label>
							<div class="form-group">
								<select class="form-control" id="kejuruan" name="kejuruan" class="form-group" required>
								</select>
								<input type="hidden" name="s_kejuruan" value="">
							</div>
							<label style="font-size: 16px;">Sub Kejuruan</label>
							<div class="form-group">
								<select class="form-control" id="sub" name="sub" class="form-group" required>
								</select>
								<input type="hidden" name="s_sub" value="">
							</div>
							<label style="font-size: 16px;">Program</label>
							<div class="form-group">
								<select class="form-control" id="prog" name="prog" class="form-group" required>
								</select>
								<input type="hidden" name="s_prog" value="">
							</div>
							<span id="back2" class="btn btn-sm btn-secondary">Kembali&nbsp;<i class="fa fa-arrow-left"></i></span>
							<button name="kirim" type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp;Daftar</button>
							<?php 
							if (isset($_POST['kirim'])) {

								$angka= rand(1111,9999);
								$kode=$angka;

								$data->formulir($_POST['ktp'],$_POST['nama'],$_POST['jenkel'],$_POST['tempat'],$_POST['tanggal'],$_POST['alamat'],$_POST['prov'],$_POST['nama_prov'],$_POST['kab'],$_POST['kota'],$_POST['telp'],$_POST['email'],$_POST['agama'],$_POST['pend'],$_POST['jurusan'],$_POST['sekolah'],$_POST['kejuruan'],$_POST['sub'],$_POST['prog'],$_FILES['foto'],$_FILES['file'],$_POST['password'],$kode);

								$to=$_POST['email'];
								$nama= 'Admin BLK Kulonprogo';
								$pesan= 'Anda sudah terdaftar, silahkan melakukan login untuk melakukan test online, Kode untuk login : '.$kode;


									require_once ('PHPmailer/class.phpmailer.php');
									$mail = new PHPMailer;

					// Konfigurasi SMTP
									$mail->isSMTP(true);
									$mail->Host = 'smtp.gmail.com';
									$mail->SMTPAuth = true;
									$mail->Username = 'firmanazhar14@gmail.com';
									$mail->Password = 'Firman040396';
									$mail->SMTPSecure = 'tls';
									$mail->Port = 587;

									$mail->setFrom('firmanazhar14@gmail.com','Admin');
									$mail->addReplyTo('firmanazhar14@gmail.com','Admin');

					// Menambahkan penerima
									$mail->addAddress($to);

					// Menambahkan beberapa penerima
					//$mail->addAddress('penerima2@contoh.com');
					//$mail->addAddress('penerima3@contoh.com');

					// Menambahkan cc atau bcc 
					//$mail->addCC('cc@contoh.com');
					//$mail->addBCC('bcc@contoh.com');

					// Subjek email
									$mail->Subject = 'BLK Kulonprogo : Pemberitahuan Pendaftaran';

					// Mengatur format email ke HTML
									$mail->isHTML(true);

					// Konten/isi email
									$mailContent= "
									Dari : $nama <br/>
									Pesan: $pesan <br/><br/>
									";
									$mail->Body = $mailContent;

					// Menambahakn lampiran
					//$mail->addAttachment('lmp/file1.pdf');
					//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

					// Kirim email
									if(!$mail->send()){
										echo "<div class='alert alert-danger' role='alert'>
										Gagal Mengirim , '".$mail->ErrorInfo."'
										</div>";
									}else{
										echo "<div class='alert alert-success' role='alert'>
										Berhasil, Silahkan check email anda.
										</div>";
									}
							}
							?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#data_pribadi_1').hide();
		$('#data_pendidikan').hide();
		$('#data_pendaftaran').hide();

		//next
		$('#next').on('click', function() {
			var ktp = document.getElementById("ktp").value;
			var nama = document.getElementById("nama").value;
			var jenkel = document.getElementById('jenkel').value;
			var tempat = document.getElementById("tempat").value;
			var tanggal = document.getElementById("tanggal").value;
			var alamat = document.getElementById("alamat").value;
			if(ktp==''||nama==''||jenkel==""||tempat==''||tanggal==''||alamat==''){
				Swal.fire({
					type: 'warning',
					title: 'Lengkapi Data Diri'
				});
			}else{
				$('#data_pribadi_1').toggle(300);
				$('#data_pribadi').hide();
				$('#data_pendidikan').hide();
				$('#data_pendaftaran').hide();
			}
		});

		$('#back').on('click', function() {
			$('#data_pribadi').toggle(300);
			$('#data_pribadi_1').hide();
			$('#data_pendidikan').hide();
			$('#data_pendaftaran').hide();
		});

		$('#next1').on('click', function() {
			var prov = document.getElementById("prov").value;
			var kab = document.getElementById("kab").value;
			var telp = document.getElementById('telp').value;
			var agama = document.getElementById("agama").value;
			var email = document.getElementById("email").value;
			var password = document.getElementById("password").value;
			if (prov==""||kab==""||telp==""||agama==""||email==""||password=="") {
				Swal.fire({
					type: 'warning',
					title: 'Lengkapi Data Diri'
				});
			}else{
				$('#data_pendidikan').toggle(300);
				$('#data_pribadi').hide();
				$('#data_pribadi_1').hide();
				$('#data_pendaftaran').hide();
			}
		});

		$('#back1').on('click', function() {
			$('#data_pribadi_1').toggle(300);
			$('#data_pribadi').hide();
			$('#data_pendidikan').hide();
			$('#data_pendaftaran').hide();
		});

		$('#next2').on('click', function() {
			var pend = document.getElementById("pend").value;
			var jurusan = document.getElementById("jurusan").value;
			var sekolah = document.getElementById('sekolah').value;
			var foto = document.getElementById("foto").value;
			var file = document.getElementById("file").value;
			if (pend==""||jurusan==""||sekolah==""||foto==""||file=="") {
				Swal.fire({
					type: 'warning',
					title: 'Lengkapi Data Pendidikan'
				});
			}else{
				$('#data_pendaftaran').toggle(300);
				$('#data_pribadi').hide();
				$('#data_pribadi_1').hide();
				$('#data_pendidikan').hide();
			}
		});

		$('#back2').on('click', function() {
			$('#data_pendidikan').toggle(300);
			$('#data_pribadi').hide();
			$('#data_pribadi_1').hide();
			$('#data_pendaftaran').hide();
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		var prov=$("select[name=prov]");
		$.ajax({
			url:'config/pengunjung/data_provinsi.php',
			success:function(hasil){
				prov.html(hasil);
			}
		})
	});

	$(document).ready(function(){
		$("select[name=prov]").on("change",function(){
			var id = $(this).val();
			var nama_provinsi = $('option:selected', this).attr('nama');
			$("input[name=nama_prov]").val(nama_provinsi);
			$.ajax({
				url:'config/pengunjung/data_kota.php',
				type:'POST',
				data:'id='+id,
				success:function(hasil){
					$("select[name=kab]").html(hasil);
				}
			})
		})
	});

	$(document).ready(function(){
		$("select[name=kab]").on("change",function(){
			var nama_kota = $('option:selected', this).attr('nama_kota');
			$("input[name=kota]").val(nama_kota);
		})
	});


	$(document).ready(function(){
		var isi = $("select[name=kejuruan]");
		$.ajax({
			url:'config/pengunjung/data_kejuruan.php',
			success:function(hasil){
				isi.html(hasil);
			}
		})
	});

	$(document).ready(function(){
		var change=$("select[name=kejuruan]");
		var target=$("select[name=sub]");
		change.on("change",function(){
			var id = $(this).val();
			var kejuruan = $("option:selected",this).attr("nama");
			$("input[name=s_kejuruan]").val(kejuruan);
			$.ajax({
				url:'config/pengunjung/data_subkejuruan.php',
				type:'POST',
				data:'id='+id,
				success:function(hasil){
					target.html(hasil);
				}
			})
		})
	});

	$(document).ready(function(){
		var change=$("select[name=sub]");
		var target=$("select[name=prog]");
		change.on("change",function(){
			var id = $(this).val();
			var nama = $("option:selected",this).attr("nama_sub");
			$("input[name=s_sub]").val(nama);
			$.ajax({
				url:'config/pengunjung/data_program.php',
				type:'POST',
				data:'id='+id,
				success:function(hasil){
					target.html(hasil);
				}
			})
		})
	});

	$(document).ready(function(){
		var change=$("select[name=prog]");
		change.on("change",function(){
			var nama = $("option:selected",this).attr("nama_prog");
			$("input[name=s_prog]").val(nama);
			$.ajax({
				url:'config/pengunjung/data_program.php',
				type:'POST',
				data:'id='+id,
				success:function(hasil){
					target.html(hasil);
				}
			})
		})
	});

	$(document).ready(function(){
		var isi = $("select[name=pend]");
		$.ajax({
			url:'config/pengunjung/data_pendidikan.php',
			success:function(hasil){
				isi.html(hasil);
			}
		})
	});

	$(document).ready(function(){
		var change=$("select[name=pend]");
		var target=$("select[name=jurusan]");
		change.on("change",function(){
			var id = $(this).val();
			var nama = $("option:selected",this).attr("nama");
			$("input[name=nm_pend]").val(nama);
			$.ajax({
				url:'config/pengunjung/data_jurusan.php',
				type:'POST',
				data:'id='+id,
				success:function(hasil){
					target.html(hasil);
				}
			})
		})
	});

	$(document).ready(function(){
		$("select[name=jurusan]").on("change",function(){
			var nama = $("option:selected",this).attr("nama");
			$("input[name=nm_jurusan]").val(nama);
		})
	});

</script>