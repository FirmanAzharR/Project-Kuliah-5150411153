<?php $norm = $_POST['myData']; ?>
<?php
include '../config/koneksi.php';
$pasien = mysqli_query($koneksi,"SELECT*FROM pasien WHERE no_rm='$norm'");
$data = $pasien->fetch_assoc();
?>

<div class="container">
	<div class="panel" style="margin-top: 50px">
		<div class="panel-heading" style="background-color:#205E32;">
			<h3 align="center" style="color:white;">Formulir Registrasi Pasien Baru</h3><hr>
		</div>	
		<div class="panel-body">
			<form method="POST" action="process/tambah_pasien_lama.php">
				<div class="row">
					<div class="col-md-6" style="border-right: 1px solid #D2D2 ">
						<div class="text-left">
							<label>No. RM</label>
						</div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">RM00</span>
							<input type="number" class="form-control" id="norm" name="norm" value="<?php echo $norm ?>" placeholder="Nomor RM Anda" aria-describedby="basic-addon1">
						</div>
						<br>
						<label>Tanggal</label>
						<input class="form-control" id="tgl" name="tgl" placeholder="Tgl" type="date" readonly value="<?php echo date("Y-m-d");?>">
						<br>
						<label>Nama Pasien</label>
						<input class="form-control" id="namapasien" name="namapasien" placeholder="Nama Pasien" type="text" readonly value="<?php echo $data['nama_pasien']; ?>">
						<br>
						<label>Jenis Kelamin</label>
						<input class="form-control" id="jenkel" name="jenkel" placeholder="Jenis Kelamin" type="text" readonly value="<?php echo $data['jenis_kelamin']; ?>">
						<br>
					</div>
					<div class="col-md-6">
						<label>Tempat Lahir</label>
						<input class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" type="text" readonly value="<?php echo $data['tempat_lahir']; ?>">
						<br>
						<label>Tanggal Lahir</label>
						<input class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" type="date" readonly value="<?php echo $data['tanggal_lahir']; ?>">
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
				<br>
				<center><input id="checkbox" type="checkbox" id="cek" align="center"> Saya menyatakan bahwa semua data yang diinputkan adalah benar.</center>
				<hr>
				<center>
					<button type="button" id="daftar_lama" class="btn btn-success"><i class="fa fa-send"></i>&nbsp;Daftar</button>
					<button type="button" id="batal" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;Batal</button>
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

	$('#batal').click(function(){
		location.reload();
	})

	$('#daftar_lama').attr('disabled',true);
	$('#checkbox').change(function(){
		if (this.checked) {
			$('#daftar_lama').attr('disabled',false);
		}else{
			$('#daftar_lama').attr('disabled',true);
		}
	});

	$('#jpasien').change(function(){
		var x = $('#jpasien').val();
		if (x!='umum') {
			$('#no_jaminan').attr('type','number');
		}else{
			$('#no_jaminan').attr('type','hidden');
		}
	});

// 	$('#tujuan').change(function(){
// 		var tujuan = $('#tujuan').val();
// 		$.ajax({
// 			url:'process/cek_noantrian.php',
// 			type:'POST',
// 			data:{tujuan:tujuan},
// 			success:function(response){
// 				$('#antrian').val(response);
// 			}
// 		})
// 	});


$('#daftar_lama').click(function(){
	var norm = $('#norm').val();
	var tgl = $('#tgl').val();
	var nama = $('#namapasien').val();
	var jenkel = $('#jenkel').val();
	var tmptlhr = $('#tempatlahir').val();
	var tgllahir = $('#tgllahir').val();
	var jp = $('#jpasien').val();
	var no_jaminan = $('#no_jaminan').val();
	var tujuan = $('#tujuan').val();
	var antrian = $('#antrian').val();
	var dokter = $('#dokter-x').val();

	if (jp==''|| tujuan=='') {
		swal({
			title: "Form Registrasi Kosong",
			text: "Lengkapi Form Pendaftaran Anda",
			icon: "warning",
			button: "Ok",
		});
	}else{

		$.ajax({
			url:'process/tambah_pasien_lama.php',
			type:'POST',
			data:{norm:norm,tgl:tgl,nama:nama,jenkel:jenkel,tempatlahir:tmptlhr,tgllahir:tgllahir,jp:jp,no_jaminan:no_jaminan,tujuan:tujuan,antrian:antrian,dokter:dokter},
			success:function(response){
				console.log(response);
				if (response=="berhasil") {
					swal({
						title: "Registrasi Berhasil",
						text: "Terimakasih",
						icon: "success",
						button: "Ok",
					})
					.then((value) => {

						$.post('view/status_antrian.php',{ antrian: antrian,norm: norm,tujuan:tujuan },function(data, status) {
							$('#konten').html(data);
						});
					});
				}else{
					swal({
						title: "Registrasi Gagal",
						text: "Silahkan Registrasi Ulang",
						icon: "error",
						button: "Ok",
					});
				}
			}
		})
	}

});
</script>