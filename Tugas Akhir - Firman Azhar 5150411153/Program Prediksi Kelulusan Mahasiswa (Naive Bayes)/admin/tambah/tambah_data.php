<?php $add=$_POST['value']; ?>
<?php 	if($add!='data_prediksi') {?>
	<div id="konten"></div>

	<form method="POST">
		<input type="hidden" id="pilihan" value="<?php echo $add; ?>">
		<div class="row">
			<div class="col-md-3">
				<label><?php $add=$_POST['value']; if ($add=='data_latih') {
					echo "Input Data Latih";
				}else{
					echo "Input Data Uji";
				} ?></label>
				<div class="form-group">
					<input type="number" name="nim" id="nim" class="form-control" placeholder="NIM">
				</div>
				<div class="form-group">
					<select class="form-control" id="jenkel">
						<option disabled selected>- Pilih Jenis Kelamin -</option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<label>SKS</label>
				<div class="form-group">
					<input type="number" onkeypress="" max="24" min="0" id="sks1" name="sks1" class="form-control" placeholder="SKS 1">
				</div>
				<div class="form-group">
					<input type="number" id="sks2" name="sks2" class="form-control" placeholder="SKS 2">				
				</div>
				<div class="form-group">
					<input type="number" id="sks3" name="sks3" class="form-control" placeholder="SKS 3">
				</div>
				<div>
					<input type="number" id="sks4" name="sks4" class="form-control" placeholder="SKS 4">
				</div>
			</div>
			<div class="col-md-3">
				<label>IPK</label>
				<div class="form-group">
					<input type="number" id="ipk1" name="ipk1" class="form-control" placeholder="IPK 1">
				</div>
				<div class="form-group">
					<input type="number" id="ipk2" name="ipk2" class="form-control" placeholder="IPK 2">				
				</div>
				<div class="form-group">
					<input type="number" id="ipk3" name="ipk3" class="form-control" placeholder="IPK 3">
				</div>
				<div>
					<input type="number" id="ipk4" name="ipk4" class="form-control" placeholder="IPK 4">
				</div>
			</div>
			<div class="col-md-3">
				<label>Keterangan</label>
				<div class="form-group">
					<select class="form-control" id="ket">
						<option disabled selected>- Pilih Keterangan -</option>
						<option value="TEPAT">TEPAT</option>
						<option value="TERLAMBAT">TERLAMBAT</option>
					</select>
				</div>
			</div>
		</div>
		<hr>
		<center><button type="button" class="btn btn-success" id="simpan"><i class="fa fa-save"></i>&nbsp;Simpan</button></center>
	</form>

<?php } else {?>

	<div class="row">
		<div class="col-md-3">
			<label><?php $add=$_POST['value']; if ($add=='data_prediksi') {
					echo "Input Data Prediksi";
				} ?></label>
			<div class="form-group">
				<input type="number" name="nim" id="nim" class="form-control" placeholder="NIM">
			</div>
			<div class="form-group">
				<select class="form-control" id="jenkel">
					<option disabled selected>- Pilih Jenis Kelamin -</option>
					<option value="L">Laki - Laki</option>
					<option value="P">Perempuan</option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<label>SKS</label>
			<div class="form-group">
				<input type="number" id="sks1" name="sks1" class="form-control" placeholder="SKS 1">
			</div>
			<div class="form-group">
				<input type="number" id="sks2" name="sks2" class="form-control" placeholder="SKS 2">				
			</div>
			<div class="form-group">
				<input type="number" id="sks3" name="sks3" class="form-control" placeholder="SKS 3">
			</div>
			<div>
				<input type="number" id="sks4" name="sks4" class="form-control" placeholder="SKS 4">
			</div>
		</div>
		<div class="col-md-3">
			<label>IPK</label>
			<div class="form-group">
				<input type="number" id="ipk1" name="ipk1" class="form-control" placeholder="IPK 1">
			</div>
			<div class="form-group">
				<input type="number" id="ipk2" name="ipk2" class="form-control" placeholder="IPK 2">				
			</div>
			<div class="form-group">
				<input type="number" id="ipk3" name="ipk3" class="form-control" placeholder="IPK 3">
			</div>
			<div>
				<input type="number" id="ipk4" name="ipk4" class="form-control" placeholder="IPK 4">
			</div>
		</div>
		<div class="col-md-3">
			<label>Keterangan</label>
			<div class="form-group">
				<input type="text" id="keterangan" class="form-control" readonly placeholder="?">
			</div>
		</div>
	</div>
	<hr>
	<center><button class="btn btn-success" id="simpan2"><i class="fa fa-save"></i>&nbsp;Simpan</button></center>

<?php } ?>


<script type="text/javascript">
	$(document).ready(function(){
		$('#simpan').click(function() {
			var nim = $('#nim').val();
			var jenkel = $('#jenkel').val();
			var sks1 = $('#sks1').val();
			var sks2 = $('#sks2').val();
			var sks3 = $('#sks3').val();
			var sks4 = $('#sks4').val();
			var ipk1 = $('#ipk1').val();
			var ipk2 = $('#ipk2').val();
			var ipk3 = $('#ipk3').val();
			var ipk4 = $('#ipk4').val();
			var keterangan = $('#ket').val();
			var pilih = $('#pilihan').val();

			if (jenkel=='' || sks1=='' || sks1<0 || sks1>24 || sks2=='' || sks2>24 || sks2<0 || sks3=='' || sks3>24 || sks3<0 || sks4=='' || sks4<0 || sks4>24 || ipk1=='' || ipk1<0 || ipk1>4 || ipk2=='' || ipk2<0 || ipk2>4 || ipk3=='' || ipk3<0 || ipk3>4 || ipk4=='' || ipk4<0 || ipk4>4 || keterangan=='' ) {

						const toast = swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						});

						toast({
							type: 'error',
							title: 'Inputan Tidak Boleh Kosong / Minus'
						})
			}else{
				$.ajax({
				type:'POST',
				url:'tambah/simpan.php',
				data:'jenkel='+jenkel+'&sks1='+sks1+'&sks2='+sks2+'&sks3='+sks3+'&sks4='+sks4+'&ipk1='+ipk1+'&ipk2='+ipk2+'&ipk3='+ipk3+'&ipk4='+ipk4+'&keterangan='+keterangan+'&pilih='+pilih+'&nim='+nim,
				success:function(hasil){
					if (hasil=='berhasil') {

						$('#nim').val('');
						$('#jenkel').val('');
						$('#sks1').val('');
						$('#sks2').val('');
						$('#sks3').val('');
						$('#sks4').val('');
						$('#ipk1').val('');
						$('#ipk2').val('');
						$('#ipk3').val('');
						$('#ipk4').val('');
						$('#ket').val('');

						const toast = swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						});

						toast({
							type: 'success',
							title: 'Berhasil'
						})	
					}else{

						const toast = swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						});

						toast({
							type: 'error',
							title: 'Gagal'
						})	

					}
				}
			})
			}
		});
	});

	$(document).ready(function(){
		$('#simpan2').click(function() {

			var jenkel = $('#jenkel').val();
			var sks1 = $('#sks1').val();
			var sks2 = $('#sks2').val();
			var sks3 = $('#sks3').val();
			var sks4 = $('#sks4').val();
			var ipk1 = $('#ipk1').val();
			var ipk2 = $('#ipk2').val();
			var ipk3 = $('#ipk3').val();
			var ipk4 = $('#ipk4').val();
			var keterangan = $('#ket').val();
			var pilih = $('#pilihan').val();
			var nama = $('#nama').val();
			var nim = $('#nim').val();

			if (jenkel=='' || sks1=='' || sks2=='' || sks3=='' || sks4=='' || ipk1=='' || ipk2=='' || ipk3=='' || ipk4=='') {

					const toast = swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						});

						toast({
							type: 'error',
							title: 'Inputan Tidak Boleh Kosong / Minus'
						})	

			}else{
							$.ajax({
				type:'POST',
				url:'tambah/simpan2.php',
				data:'jenkel='+jenkel+'&sks1='+sks1+'&sks2='+sks2+'&sks3='+sks3+'&sks4='+sks4+'&ipk1='+ipk1+'&ipk2='+ipk2+'&ipk3='+ipk3+'&ipk4='+ipk4+'&keterangan='+keterangan+'&pilih='+pilih+'&nama='+nama+'&nim='+nim,
				success:function(hasil){
					if (hasil=='berhasil') {

						$('#jenkel').val('');
						$('#sks1').val('');
						$('#sks2').val('');
						$('#sks3').val('');
						$('#sks4').val('');
						$('#ipk1').val('');
						$('#ipk2').val('');
						$('#ipk3').val('');
						$('#ipk4').val('');
						$('#ket').val('');
						$('#nama').val('');
						$('#nim').val('');

						const toast = swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						});

						toast({
							type: 'success',
							title: 'Berhasil'
						})	
					}else{

						const toast = swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						});

						toast({
							type: 'error',
							title: 'Gagal'
						})	

					}
				}
			})
			}
		});
	});
</script>