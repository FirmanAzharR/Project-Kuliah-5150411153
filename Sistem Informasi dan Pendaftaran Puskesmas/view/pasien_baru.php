<?php 	
include 'config/koneksi.php';
$cek = mysqli_query($koneksi,"SELECT status_antrian FROM status_antrian");
$antrian = $cek->fetch_assoc();

if ($antrian['status_antrian']=='Berjalan') {
	
	//include 'process/norm.php'; 
	if (!isset($_GET['pesan'])) {
		$antrian=0;
		$pesan = '';
	}else{

		$tujuan = $_GET['tujuan'];
		$antrian = $_GET['no'];
		$pesan = $_GET['pesan'];
	}

	?>

	<div class="container">
		<div class="panel" style="border: 0px; margin-top: 40px">
			<div class="panel-heading" style="background-color:#205E32;">
				<h3 align="center" style="color:white;">Formulir Registrasi Pasien Baru</h3><hr>
			</div>
			<br>
			<div class="panel-body">
				<form method="POST" action="process/tambah_pasien_baru.php">
					<div class="row">
						<div class="col-md-6" style="border-right: 1px solid #D2D2 ">
							<label>Tanggal</label>
							<input class="form-control" id="tgl" name="tgl" placeholder="Tgl" type="date" readonly value='<?php echo date("Y-m-d");?>'  required>
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
						</div>
						<div class="col-md-6">
							<label>Tempat Lahir</label>
							<input class="form-control" id="tempatlahir " name="tempatlahir" placeholder="Tempat Lahir" type="text" required>
							<br>
							<label>Tanggal Lahir</label>
							<input class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" type="date" required max="<?php echo date("Y-m-d");?>">
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
							<br>
							<label>Jenis Pasien</label>
							<select id="jpasien" name="jpasien" class="form-control" required>
								<option value="">- Pilih Jenis Pasien -</option>
								<option value="umum">Umum</option>
								<option value="bpjspns">BPJS PNS</option>
								<option value="bpjspbi">BPJS PBI</option>
								<option value="bpjsmandiri">BPJS Mandiri</option>
								<option value="bpjsperusahaan">BPJS Perusahaan</option>
								<option value="jamkesos">Jamkesos</option>
							</select><br>
							<input type="hidden" id="no_jaminan" name="no_jaminan" value="" class="form-control" placeholder="Nomor Jaminan">
							<label>Tujuan</label>
							<select id="tujuan" name="tujuan" class="form-control" required>
								<option value="">- Pilih Tujuan -</option>
								<option value="bpumum">BP UMUM</option>
								<option value="bpgigi">BP Gigi</option>
							</select>
							<div class="dokter">
								
							</div>
						</div>
					</div>
					<hr>
					<center>
						<input id="checkbox" type="checkbox" id="cek"> Saya menyatakan bahwa semua data yang diinputkan adalah benar.
						<br><br>
						<center>
							<button type="submit" id="daftar" class="btn btn-success"><i class="fa fa-send"></i>&nbsp;Daftar</button>
							<button type="button" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;Batal</button>
						</center>
					</center>
				</form>
			</div>
		</div>

	</div>
	<script type="text/javascript">

		$('#tujuan').change(function(){
			var data = $('#tujuan').val();
			
			$.ajax({
				url:'view/get_dokter.php',
				type:'post',
				data:{data:data},
				success:function(x){
					$('.dokter').html(x);
				}
			})
		})

		$(document).ready(function(){

			$('input').attr('autocomplete','off');
			<?php 
			if (isset($_GET['tujuan'])) { 
				$tujuan=$_GET['tujuan'];
			?>
				var tujuan = '<?php echo $tujuan; ?>';

			<?php }else{ ?>

			<?php } ?>
			
			var antrian = '<?php echo $antrian; ?>';
			var status = '<?php echo $pesan; ?>';
			if (status=='gagal') {
				swal({
					title:'Pendaftaran Gagal',
					text:'Silahkan coba lagi',
					icon:'error'
				})
			}else if(status=='berhasil'){

				swal({
					title: "Registrasi Berhasil",
					text: "No Antrian Anda "+antrian,
					icon: "success",
					button: "Ok",
				})
				.then((value) => {
					console.log(antrian);
					$.post('view/status_antrian1.php',{ antrian: antrian,tujuan:tujuan},function(data, status) {
						$('#konten').html(data);
					});
				});
				
			}else{

			}

			$('#daftar').attr('disabled',true);
			$('#checkbox').change(function(){
				if (this.checked) {
					$('#daftar').attr('disabled',false);
				}else{
					$('#daftar').attr('disabled',true);
				}
			})

			$('#jpasien').change(function(){
				var x = $('#jpasien').val();
				if (x!='umum') {
					$('#no_jaminan').attr('type','number');
				}else{
					$('#no_jaminan').attr('type','hidden');
				}
			})

		});
	</script>

<?php }else{ ?>
	
	<div class="panel">
		<div class="panel-heading" style="background-color:#205E32;">
			<h3 align="center" style="color:white;">Informasi Pendaftaran Pasien Berobat Puskesmas Bansari</h3>
		</div>
		<div class="panel-body">
			Mohon maaf untuk pendaftaran pasien berobat puskesmas bansari untuk saat ini sedang ditutup.
		</div>
	</div>	

	<?php } ?>