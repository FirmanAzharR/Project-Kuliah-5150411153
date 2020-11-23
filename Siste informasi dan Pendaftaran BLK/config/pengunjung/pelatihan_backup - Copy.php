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
					<label style="font-style: 16;font-weight: bold">Kejuruan & Program</label>
					<form method="post" enctype="multipart/form-data">
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
						<hr>
						<label style="font-style: 16;font-weight: bold">Data Pribadi</label><br>
						<label style="font-size: 16px;">Nama Lengkap</label>
						<div class="form-group">
							<input type="text" class="form-control" name="nama" required autocomplete="off">
						</div>
						<label style="font-size: 16px;">Tempat/Tanggal Lahir</label>
						<div class="form-group">
							<input type="text" class="form-control" name="tempat" required autocomplete="off">
							<br>
							<input type="date" class="form-control" name="tanggal" required autocomplete="off">
						</div>
						<label style="font-size: 16px;">Alamat</label>
						<div class="form-group">
							<textarea name="alamat" class="form-control"></textarea>
						</div>
						<label style="font-size: 16px;">Provinsi</label>
						<div class="form-group">
							<select class="form-control" id="prov" name="prov" class="form-group" required>
							</select>
							<input type="hidden" name="nama_prov" value="">
						</div>
						<label style="font-size: 16px;">Kabupaten/Kota</label>
						<div class="form-group">
							<select class="form-control" id="kab" name="kab" class="form-group" required>
							</select>
							<input type="hidden" name="kota" value="">
						</div>
						<label style="font-size: 16px;">No Telepon/HP</label>
						<div class="form-group">
							<input type="number" class="form-control" name="telp" required autocomplete="off">
						</div>
						<label style="font-size: 16px;">Email</label>
						<div class="form-group">
							<input type="email" class="form-control" name="email" required autocomplete="off">
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
						<hr>
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
							<input type="text" class="form-control" name="sekolah" required autocomplete="off">
						</div>
						<label style="font-size: 16px;">Upload Foto</label>
						<div class="form-group">
							<input type="file" class="form-control" name="foto" required autocomplete="off">
						</div>
						<hr>
						<button type="submit" name="kirim" class="btn btn-success"><i class="fa fa-send"></i>&nbsp;&nbsp;Kirim</button>
						<?php 
						if (isset($_POST['kirim'])) {
							$data->formulir($_POST['nama'],$_POST['tempat'],$_POST['tanggal'],$_POST['alamat'],$_POST['nama_prov'],$_POST['kota'],$_POST['telp'],$_POST['email'],$_POST['agama'],$_POST['nm_pend'],$_POST['nm_jurusan'],$_POST['sekolah'],$_POST['s_kejuruan'],$_POST['s_sub'],$_POST['s_prog'],$_FILES['foto']);
						}
						?>
						<hr>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div style="padding: 10px;background: #375399;color: white">
					<h6 style="text-align: center">INFORMASI PELATIHAN</h6>					
				</div>
				<div style="background: white; padding: 10px;margin-top: 10px">
					<div id="info">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
			var kejuruan = $("option:selected").attr("nama");
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