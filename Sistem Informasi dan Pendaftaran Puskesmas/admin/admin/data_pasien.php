
	<h3>Data Pasien</h3>
	<hr>
	<button style="margin-bottom: 15px" id="add_pasien" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Pasien</button>
	<div id="konten">
		
	</div>

	<div class="modal fade" id="myModal1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Pasien</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="proses/tambah_pasien_baru.php">
						<!-- <label>No RM</label>
						<input readonly class="form-control" id="norm" name="norm" placeholder="NO RM" type="text" value="<?php //echo $norm ?>";>
						<br> -->
						<label>Tanggal</label>
						<input class="form-control" id="tgl" name="tgl" placeholder="Tgl" type="date" readonly value="<?php echo date("Y-m-d");?>" required>
						<br>
						<label>Nama Pasien</label>
						<input class="form-control" id="namapasien" name="namapasien" placeholder="Nama Pasien" type="text" required>
						<br>
						<label>Nama KK</label>
						<input class="form-control" id="namakk" name="namakk" placeholder="Nama Kepala Keluarga" type="text" required>
						<br>
						<label>Jenis Kelamin</label>
						<select id="jenkel" name="jenkel" class="form-control" required>
							<option value="">- Pilih Jenis Kelamin -</option>
							<option value="L">Laki - Laki</option>
							<option value="P">Perempuan</option>
						</select>
						<br>
						<label>Pekerjaan</label>
						<input class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" type="text" required>
						<br>
						<label>Alamat Lengkap</label>
						<input class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" type="text" required>
						<br>
						<label>Tempat Lahir</label>
						<input class="form-control" id="tempatlahir " name="tempatlahir" placeholder="Tempat Lahir" type="text" required>
						<br>
						<label>Tanggal Lahir</label>
						<input class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" type="date" required>
						<br>
						<label>Agama</label>
						<select id="agama" name="agama" class="form-control" required>
							<option value="">- Pilih Agama -</option>
							<option value="islam">Islam</option>
							<option value="kristen">Kristen</option>
							<option value="katholik">Katolik</option>
							<option value="hindu">Hindu</option>
							<option value="budha">Budha</option>
						</select>
						<hr>
						<center>
							<button type="submit" id="daftar" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Simpan</button>
							<button type="button" id="batals" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;Batal</button>
						</center>

					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#dt-pasien').addClass("active");
			$('#konten').load('view/tampil_data_pasien.php');


			$('#add_pasien').click(function(){
				$('#myModal1').modal('toggle');
			});

			$('#batals').click(function(){
				$('#myModal1').modal('toggle');
			});

			$('input').attr('autocomplete','off');
		});
	</script>