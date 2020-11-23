<?php 

include '../../config/koneksi.php';
$input = $_POST['ktg'];
$trx = $_POST['trx'];
$usr = $_POST['usr'];
$kode = $_POST['kode'];

if ($input==2) { 
	$jm_hari = $_POST['jml'];
	$query=mysqli_query($koneksi,"SELECT*FROM jenis_hewan WHERE id_kategori_hewan=$input;");

	$query1=mysqli_query($koneksi,"SELECT harga FROM kategori_hewan WHERE id_kategori_hewan=$input;");
	$jenis=$query1->fetch_assoc();

	$query2=mysqli_query($koneksi,"SELECT*FROM Makanan WHERE id_kategori_hewan=$input;");
	$makanan=$query2->fetch_assoc();

	$ukuran=mysqli_query($koneksi,"SELECT*FROM ukuran_hewan WHERE id_peliharaan=$input;");
	$obat=mysqli_query($koneksi,"SELECT*FROM obat_peliharaan WHERE id_hewan=$input;");

	$query3=mysqli_query($koneksi,"SELECT SUM(harga) AS obat_kucing FROM `obat_peliharaan` WHERE `id_hewan`=$input;");
	$harga_obat=$query3->fetch_assoc();

	$vaksin=mysqli_query($koneksi,"SELECT*FROM vaksin WHERE id_kategori_hewan=$input;");
	?>
	<input type="hidden" id="hrg_ktg" value="<?php echo $jenis['harga']; ?>">
	<input type="hidden" id="jm_hari" value="<?php echo $jm_hari; ?>">
	<input type="hidden" id="mkn" value="">
	<input type="hidden" id="hrg_obat" value="0">
	<input type="hidden" id="hrg_vaksin" value="0">
	<input type="hidden" id="konfirm_paket" value="">
	<input type="hidden" id="input5" value="">
	<input type="hidden" id="input6" value="">

	<label style="color: white;">Jenis Peliharaan</label>
	<div class="form-group">
		<select class="form-control" id="jns" style="color: #5D5D5D;">
			<option selected value="0" style="font-weight: bold">Pilih Jenis Anjing</option>
			<?php foreach ($query as $key => $value) : ?>
				<option value="<?php echo $value['id_jenis_hewan']; ?>"><?php echo $value['nama_jenis_hewan']; ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<label style="color: white;">Makanan Peliharaan</label><br>
	<div class="alert" style="background-color: #FFFF;" align="center" id="makanan">
		<div class="pretty p-icon p-round p-pulse">
			<input type="radio" name="makanan" id_makanan="<?php echo $makanan['id_makanan']; ?>" value="<?php echo $makanan['harga']; ?>">
			<div class="state p-success">
				<i class="icon fa fa-check"></i>
				<label style="color: #5D5D5D;"><?php echo $makanan['keterangan'] ?></label>
			</div>
		</div>
		<div class="pretty p-icon p-round p-pulse">
			<input type="radio" name="makanan" id_makanan="0" value="0">
			<div class="state p-success">
				<i class="icon fa fa-check"></i>
				<label>Bawa Sendiri</label>
			</div>
		</div>
	</div>
	<br>
	<div align="center">
		<label style="color: white; font-weight: bold">Grooming&nbsp;(Perawatan Kebersihan & Kesehatan)</label><br>
	</div>


	<!--GROOMING-->
	<label style="color: white;">Tambah Paket Grooming</label><br>
	<div id="grooming" class="alert" style="background-color: #FFFF;" align="center">
		<div class="pretty p-icon p-round p-pulse">
			<input type="radio" name="jawab" value="1">
			<div class="state p-success">
				<i class="icon fa fa-check"></i>
				<label>Ya</label>
			</div>
		</div>	
		<div class="pretty p-icon p-round p-pulse">
			<input type="radio" name="jawab" value="0">
			<div class="state p-danger">
				<i class="icon fa fa-check"></i>
				<label>Tidak</label>
			</div>
		</div>			
	</div>
	<div id="pilih_paket">
		<label style="color: white;">Perawatan Kebersihan&nbsp;(Ukuran&nbsp;Hewan&nbsp;:&nbsp;S,M,L) </label>
		<div class="form-group">
			<select class="form-control" id="ukuran" name="ukuran" style="color: #5D5D5D;">
				<option selected id_ukuran='0' value="0" style="font-weight: bold">Pilih Ukuran Anjing</option>
				<?php foreach ($ukuran as $key => $value) : ?>
					<option id_ukuran="<?php echo $value['id_ukuran']; ?>" value="<?php echo $value['harga_ukuran']; ?>"><?php echo $value['nama_ukuran']; ?>&nbsp;(Rp.&nbsp;<?php echo $value['harga_ukuran']; ?>)</option>
				<?php endforeach ?>
			</select>
		</div>
		<label style="color: white;">Obat Perawatan Kucing</label>
		<div class="alert" style="background-color: #FFFF" id="pilih_obat">
			<center>
				<?php foreach ($obat as $key => $value) : ?>
					<label style="font-weight: bold;color: #5D5D5D;"><?php echo $value['nama_obat'] ?></label>,&nbsp;
				<?php endforeach ?>
				<br>
				<div class="pretty p-icon p-round p-pulse">
					<input type="radio" name="konfirm" value="<?php echo $harga_obat['obat_kucing'] ?>">
					<div class="state p-success">
						<i class="icon fa fa-check"></i>
						<label>Ya</label>
					</div>
				</div>	
				<div class="pretty p-icon p-round p-pulse">
					<input type="radio" name="konfirm" value="0">
					<div class="state p-danger">
						<i class="icon fa fa-check"></i>
						<label>Tidak</label>
					</div>
				</div>
			</center>	
		</div>
		<label style="color: white;">Vaksin Kucing</label><br>
		<div class="alert" style="background-color: #FFFF;" align="center" id="vaksin">
			<?php foreach ($vaksin as $key => $value) : ?>
				<div class="pretty p-icon p-round p-pulse">
					<input type="radio" name="vaksin_kucing" id_vaksin="<?php echo $value['id_vaksin'] ?>" value="<?php echo $value['harga']; ?>">
					<div class="state p-success">
						<i class="icon fa fa-check"></i>
						<label style="color: #5D5D5D;"><?php echo $value['nama_vaksin'] ?></label>
					</div>
				</div>
			<?php endforeach ?>
			<div class="pretty p-icon p-round p-pulse">
				<input type="radio" name="vaksin_kucing" id_vaksin="0" value="0">
				<div class="state p-danger">
					<i class="icon fa fa-check"></i>
					<label style="color: #5D5D5D;">Tidak Vaksin</label>
				</div>
			</div>
		</div>
	</div>

	<!--Total Harga-->
	<div class="row" align="center">
		<div class="col-md-6">
			<label style="color: white;font-weight: bold">Harga Jasa Penitipan</label>
			<input type="text" id="harga_penitipan" class="form-control" aria-describedby="basic-addon1" value="0" style="border:none;background-color: #FC7C5F;color: white; font-weight: bold;text-align: center" readonly>
		</div>
		<div class="col-md-6">
			<label style="color: white;font-weight: bold">Harga Paket Grooming</label>
			<input type="text" id="harga_grooming" class="form-control" aria-describedby="basic-addon1" value="0" style="border:none;background-color: #FC7C5F;color: white; font-weight: bold;text-align: center" readonly>
		</div>
	</div>
	<br>
	<div data-a-sign="Rp. " data-a-dec="," data-a-sep="." id="total" align="center" class="alert alert-primary" style="color: white ;font-weight: bold">Lihat Total Bayar</div>

	<!--Konfirmasi-->
	<div align="center">
		<label style="color: white;">Apakah anda akan melanjutkan transaksi penitipan ?</label>
		<button class="btn btn-icon btn-3 btn-success" type="button" id="ya">
			<span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
			<span class="btn-inner--text">Ya</span>
		</button>
		<button class="btn btn-icon btn-3 btn-danger" type="button" id="tidak">
			<span class="btn-inner--icon"><i class="ni ni-user-run"></i></span>
			<span class="btn-inner--text">Tidak</span>
		</button>
	</div>

<?php } ?>




<!--KUCING JSJQ-->
<script type="text/javascript">

	$(document).ready(function(){
		$('#ya').click(function(){

			var id_trx = '<?php echo $trx ?>';
			var id_usr = '<?php echo $usr ?>';
			var kode = '<?php echo $kode ?>';

			var input1 = $('#mkn').val();
			var input2 = $('#jns').val();
			var input3 = $('#konfirm_paket').val();
			var input4 = $('#ukuran').val();
			var input5 = $('#input5').val();
			var input6 = $('#input6').val();
			
			var id_kategori = '<?php echo $input ?>';
			var id_jenis = $('#jns').val();
			var id_makanan = $("input[name='makanan']:checked").attr('id_makanan');
			var id_ukuran = $('#ukuran option:selected').attr('id_ukuran');
			var obat = $('#hrg_obat').val();
			var id_vaksin = $("input[name='vaksin_kucing']:checked").attr('id_vaksin');
			var bayar = parseInt($('#harga_penitipan').val())+parseInt($('#harga_grooming').val());

			if (input1==''||input2==0||input3=='') {
				Swal.fire(
					'Silahkan Periksa Penitipan Anda',
					'Salah satu inputan kosong',
					'warning'
					)
			}
			else{
				if (input3==0) {

					$.ajax({
						url:'proses/simpan_detail.php',
						type:'post',
						data:'ktg='+id_kategori+'&jns='+id_jenis+'&food='+id_makanan+'&trx='+id_trx+'&jwb='+input3+'&hrg='+bayar+'&kode='+kode,
						success:function(response){
							if (response!='gagal') {

								$.post('proses/add_img.php', { kode: response },  function(data, status) {
									$('#detail').html(data);
								});
							}
							else
							{
								Swal.fire(
									'Transaksi Gagal',
									'Kesalahan Database :)',
									'error'
									)
							}
						}
					})
					//ajax simpan detail transaksi tanpa paket grooming
				}else{
					
					if (input4==0||input5==''||input6=='') {
						Swal.fire(
							'Silahkan Periksa Paket Grooming Anda',
							'Salah satu inputan kosong',
							'warning'
							)
					}
					else
					{

						$.ajax({
							url:'proses/simpan_detail.php',
							type:'post',
							data:'ktg='+id_kategori+'&jns='+id_jenis+'&food='+id_makanan+'&trx='+id_trx+'&jwb='+input3+'&ukuran='+id_ukuran+'&obat='+obat+'&vaksin='+id_vaksin+'&hrg='+bayar+'&kode='+kode,
							success:function(response){
								if (response!='gagal') {
									$.post('proses/add_img.php', { kode: response },  function(data, status) {
										$('#detail').html(data);
									});
								}
								else
								{
									Swal.fire(
										'Transaksi Gagal',
										'Kesalahan Database :)',
										'error'
										)
								}
							}
						})

						//ajax simpan detail transaksi dengan paket grooming
					}
				}
			}

		});
	});

	$(document).ready(function(){
		$('#pilih_paket').hide();

		$('#grooming input').on('change',function(){
			var value = $("input[name='jawab']:checked").val();
			if(value==1){
				$('#pilih_paket').fadeIn(300);
				$('#konfirm_paket').val('1');
			}else{
				$('#konfirm_paket').val('0');
				$('#pilih_paket').fadeOut(300);
				$('#harga_grooming').val('0');
				$('input[name=konfirm]').prop('checked', false);
				$('#ukuran').val('0').trigger('change');
				$('input[name=vaksin_kucing]').prop('checked', false);
				$('#harga_grooming').val('0');
				$('#hrg_vaksin').val('0');
				$('#hrg_obatg').val('0');
				$('#input5').val('');
				$('#input6').val('');
			}
		})

	});

	$(document).ready(function(){
		$('#makanan input').on('change',function(){
			var value = $("input[name='makanan']:checked").val();
			if(value){
				$('#mkn').val(value);
				var harga_ktg = $('#hrg_ktg').val();
				var jml_hari = $('#jm_hari').val();
				var makan = $('#mkn').val();

				var total = (parseInt(harga_ktg)*parseInt(jml_hari))+(parseInt(makan)*parseInt(jml_hari));			
				$('#harga_penitipan').val(total);
				$('#total').html('Lihat Total Bayar');
			}
		})
	});

	$(document).ready(function(){
		$('#ukuran').on('change',function(){
			var ukuran = $('#ukuran').val();
			var obat = $("#hrg_obat").val();
			var vaksin = $("#hrg_vaksin").val();
			var grooming = parseInt(ukuran)+parseInt(obat)+parseInt(vaksin);
			$('#harga_grooming').val(grooming);
			$('#total').html('Lihat Total Bayar');
		})
	});

	$(document).ready(function(){
		$('#pilih_obat input').on('change',function(){
			var value = $("input[name='konfirm']:checked").val();
			$("#input5").val('1');
			$('#hrg_obat').val(value);
			if(value){
				var ukuran = $('#ukuran').val();
				var obat = $("#hrg_obat").val();
				var vaksin = $("#hrg_vaksin").val();
				var grooming = parseInt(ukuran)+parseInt(obat)+parseInt(vaksin);
				$('#harga_grooming').val(grooming);
				$('#total').html('Lihat Total Bayar');
			}
		})
	});
	
	$(document).ready(function(){
		$('#vaksin input').on('change',function(){
			var value = $("input[name='vaksin_kucing']:checked").val();
			$("#input6").val('1');
			$('#hrg_vaksin').val(value);
			if(value){
				var ukuran = $('#ukuran').val();
				var obat = $("#hrg_obat").val();
				var vaksin = $("#hrg_vaksin").val();
				var grooming = parseInt(ukuran)+parseInt(obat)+parseInt(vaksin);
				$('#harga_grooming').val(grooming);
				$('#total').html('Lihat Total Bayar');
			}
		})
	});

	$(document).ready(function(){
		$("#total").click(function(){
			var hrg_titp = $('#harga_penitipan').val(); 
			var grooming = $('#harga_grooming').val();
			var jml = parseInt(hrg_titp)+parseInt(grooming);
			$('#total').html(jml);
			$('#total').autoNumeric('init');
		});
	});

	//konfirmasi
	$(document).ready(function(){
		$('#tidak').on('click',function(){
			var id = $('#id').val();
			var ambil = $('#ambil').val();
			var titip = $('#titip').val();
			$.ajax({
				url:'proses/batal.php',
				type:'post',
				data:'id='+id+'&titip='+titip+'&ambil='+ambil,
				success:function(response){
					if (response=='berhasil') {
						swal({
							title: "Penambahan Dibatalkan",
							text: "Thank You :)",
							type: "success",
							timer: 1500,
							showConfirmButton: false,
						}).then(function() {
							window.location.href= 'index.php?halaman=penitipan&id='+id;
						})
					}else{
						swal({
							title: "Kesalahan Database",
							text: "OOPS :)",
							type: "error",
							timer: 1500,
							showConfirmButton: false,
						})
					}
				}
			})
		})
	});
</script>