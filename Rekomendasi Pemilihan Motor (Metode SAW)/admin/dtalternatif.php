	<h3>Data Alternatif Sepeda Motor</h3>
	<hr>
	<div id="detail-motor"></div>
	<button type="button" id="tambah" class="btn btn-primary" style="margin-bottom: 20px"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
	<div id="konten">
		
	</div>

	<?php 
	include '../config/koneksi.php';
	$tipe_mesin = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K1'");

	$susunan_silinder = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K2'");

	$merk = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K3'");

	$volume_silinder = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K4'");

	$sistem_bahanbakar = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K5'");

	$transmisi = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K6'");

	$harga = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K7'");
	?>

	<div class="modal fade" id="myModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Motor</h4>
				</div>
				<div class="modal-body">
					<form id="form-data">
						<div id="nama">
							<div class="form-group">
								<label>kode Sepeda Motor</label>
								<input type="text" id="kode_motor" name="kode_motor" class="form-control" value="" readonly>
							</div>
							<div class="form-group">
								<label>Nama Sepeda Motor</label>
								<input type="text" id="nama_motor" name="nama_motor" class="form-control" placeholder="Nama Sepeda Motor">
							</div>
							<div class="form-group">
								<label>Gambar</label>
								<input type="file" id="fileupload" name="fileupload" class="form-control">
							</div>
						</div>	
						<div id="spesifikasi">
							<label>Merk Motor</label>
							<select class="form-control" id="merk" name="merk">
								<option value="" selected> -- Pilih Merk Motor -- </option>
								<?php foreach ($merk as $key => $value): ?>
									<option value="<?php echo $value['crips'] ?>"><?php echo $value['crips'] ?></option>
								<?php endforeach ?>
							</select>
							<br>
							<label>Tipe Mesin</label>
							<select class="form-control" id="tipe_mesin" name="tipe_mesin">
								<option value="" selected> -- Pilih Tipe Mesin -- </option>
								<?php foreach ($tipe_mesin as $key => $value): ?>
									<option value="<?php echo $value['crips'] ?>"><?php echo $value['crips'] ?></option>
								<?php endforeach ?>
							</select>
							<br>
							<label>Susunan Silinder</label>
							<select class="form-control" id="susunan_silinder" name="susunan_silinder">
								<option value="" selected> -- Pilih Susunan Silinder -- </option>
								<?php foreach ($susunan_silinder as $key => $value): ?>
									<option value="<?php echo $value['crips'] ?>"><?php echo $value['crips'] ?></option>
								<?php endforeach ?>
							</select>
							<br>
							<label>Volume Silinder</label>
							<select class="form-control" id="volume_silinder" name="volume_silinder">
								<option value="" selected> -- Pilih Volume Silinder -- </option>
								<?php foreach ($volume_silinder as $key => $value): ?>
									<option value="<?php echo $value['crips'] ?>"><?php echo $value['crips'] ?></option>
								<?php endforeach ?>
							</select>
							<br>
							<label>Sistem Bahan Bakar</label>
							<select class="form-control" id="sistem_bahanbakar" name="sistem_bahanbakar">
								<option value="" selected> -- Pilih Sistem Bahan Bakar -- </option>
								<?php foreach ($sistem_bahanbakar as $key => $value): ?>
									<option value="<?php echo $value['crips'] ?>"><?php echo $value['crips'] ?></option>
								<?php endforeach ?>
							</select>
							<br>
							<label>Tipe Transmisi</label>
							<select class="form-control" id="transmisi" name="transmisi">
								<option value="" selected> -- Pilih Tipe Transmisi -- </option>
								<?php foreach ($transmisi as $key => $value): ?>
									<option value="<?php echo $value['crips'] ?>"><?php echo $value['crips'] ?></option>
								<?php endforeach ?>
							</select>
							<br>
							<label>Harga Motor</label>
							<input type="number" name="harga" id="harga" class="form-control" placeholder="RP. xxx">

						</div>				
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" id="prev">Sebelumnya</button>
					<button type="button" class="btn btn-success" id="simpan">Simpan</button>
					<button type="button" class="btn btn-primary" id="spec"><i class="fa fa-plus"></i>&nbsp;Spesifikasi</button>
					<button type="button" class="btn btn-secondary" id="close">Close</button>
					<hr>
					<div id="notif"></div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#dt-a').addClass("active");
			$('#konten').load('view/tampil_alternative.php');
			$('#detail-motor').hide();

			$('#tambah').click(function(){
				$('#myModal').modal({
					backdrop:'static',
					keyboard:false
				});
				$('#simpan').hide();
				$('#spesifikasi').hide();
				$('#prev').hide();
			});

			$('#spec').click(function(){
				var nama_motor = $('#nama_motor').val();
				var file = $('#fileupload').val();
				if (nama_motor==''||file=='') {
					$('#notif').html("<div style='text-align:center; font-weight:bold' class='alert alert-danger'>Lengkapi Inputan</div>");
				}else{

					$('#simpan').show();
					$(this).hide();
					$('#nama').hide();
					$('#spesifikasi').show();
					$('#prev').show();
					$('#notif').html('');
				}
			});

			$('#prev').click(function(){
				$('#prev').hide();
				$('#spesifikasi').hide();
				$('#simpan').hide();
				$('#nama').show();
				$('#spec').show();
				$('#notif').html('');
			});

			$('#close').click(function(){
				$('#myModal').hide();
				$('#prev').hide();
				$('#spesifikasi').hide();
				$('#simpan').hide();
				$('#nama').show();
				$('#spec').show();
				$('#notif').html('');
			});

			$.ajax({
				url: "proses/auto_kode.php",
				success: function (msg) {
					$('#kode_motor').val(msg);
				},
				error: function () {
					$('#kode_motor').val('reload kode error');
				}
			});

			$('#simpan').click(function(){

				var mesin = $('#tipe_mesin').val();
				var silinder = $('#susunan_silinder').val();
				var merk = $('#merk').val();
				var volume = $('#volume_silinder').val();
				var sistem_bb = $('#sistem_bahanbakar').val();
				var transmisi = $('#transmisi').val();
				var harga = $('#harga').val();

				if (mesin==''||silinder==''||merk==''||volume==''||sistem_bb==''||transmisi==''||harga=='') {
					$('#notif').html("<div style='text-align:center; font-weight:bold' class='alert alert-danger'>Lengkapi Inputan</div>");
				}else{

					//simpan data dan gambar ajax
					const fileupload = $('#fileupload').prop('files')[0];
					let formData = new FormData();
					formData.append('fileupload', fileupload);
					formData.append('kode_motor', $('#kode_motor').val());
					formData.append('nama_motor', $('#nama_motor').val());
					//data spek motor
					formData.append('merk', $('#merk').val());
					formData.append('tipe_mesin', $('#tipe_mesin').val());
					formData.append('susunan_silinder', $('#susunan_silinder').val());
					formData.append('volume_silinder', $('#volume_silinder').val());
					formData.append('sistem_bahanbakar', $('#sistem_bahanbakar').val());
					formData.append('transmisi', $('#transmisi').val());
					formData.append('harga', $('#harga').val());

					$.ajax({
						type: 'POST',
						url: "proses/tambah_alternative.php",
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						success: function (msg) {
							$('#notif').html("<div style='text-align:center' class='alert alert-success'; font-weight:bold'>Data Tersimpan</div>");
							document.getElementById("form-data").reset();
							$.ajax({
								url: "proses/auto_kode.php",
								success: function (msg) {
									$('#kode_motor').val(msg);
								},
								error: function () {
									$('#kode_motor').val('reload kode error');
								}
							});
							$('#konten').load('view/tampil_alternative.php');


						},
						error: function () {

							$('#notif').html("<div class='alert alert-danger; font-weight:bold'>Data Gagal Tersimpan</div>");
						}
					});//end simpan gambar
					
				}//end of else 
			})

			$(document).on('click','button[data-role=detail]',function(){
				var kode = $(this).data('id');
				$.post('view/detail_motor.php', { kode: kode },  function(data, status) {
					$('#detail-motor').html(data);
					$('#detail-motor').show(300);
				});
			});

			$(document).on('click','button[data-role=delete]',function(){
				var kode = $(this).data('id');
				swal({
					title: "Hapus Data Motor ?",
					text: "Data akan terhapus dari database.",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							url: "proses/delete_alternative.php",
							type: 'POST',
							data: {kode:kode},
							success: function (msg) {
								console.log(msg);
								if(msg=="berhasil"){
									swal("Berhasil Hapus Data", "tekan ok untuk keluar", "success");
									$('#'+kode).remove();
								}else{
									swal("Gagal Hapus Data", "tekan ok untuk keluar", "error");
								}
							}

						});
					}
				});
			});


			$(document).on('click','button[data-role=edit]',function(){
				var kode = $(this).data('id');
				$.post('view/edit_alternative.php', { kode: kode },  function(data, status) {
					$('#detail-motor').html(data);
					$('#detail-motor').show(300);
				});
			});


			$('#update').click(function(){

				var mesin = $('#tipe_mesin').val();
				var silinder = $('#susunan_silinder').val();
				var merk = $('#merk').val();
				var volume = $('#volume_silinder').val();
				var sistem_bb = $('#sistem_bahanbakar').val();
				var transmisi = $('#transmisi').val();
				var harga = $('#harga').val();

				if (mesin==''||silinder==''||merk==''||volume==''||sistem_bb==''||transmisi==''||harga=='') {
					$('#notif').html("<div style='text-align:center; font-weight:bold' class='alert alert-danger'>Lengkapi Inputan</div>");
				}else{

					//simpan data dan gambar ajax
					const fileupload = $('#fileupload').prop('files')[0];
					let formData = new FormData();
					formData.append('fileupload', fileupload);
					formData.append('kode_motor', $('#kode_motor').val());
					formData.append('nama_motor', $('#nama_motor').val());
					//data spek motor
					formData.append('merk', $('#merk').val());
					formData.append('tipe_mesin', $('#tipe_mesin').val());
					formData.append('susunan_silinder', $('#susunan_silinder').val());
					formData.append('volume_silinder', $('#volume_silinder').val());
					formData.append('sistem_bahanbakar', $('#sistem_bahanbakar').val());
					formData.append('transmisi', $('#transmisi').val());
					formData.append('harga', $('#harga').val());

					$.ajax({
						type: 'POST',
						url: "proses/tambah_alternative.php",
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						success: function (msg) {
							$('#notif').html("<div style='text-align:center' class='alert alert-success'; font-weight:bold'>Data Tersimpan</div>");
							document.getElementById("form-data").reset();
							$.ajax({
								url: "proses/auto_kode.php",
								success: function (msg) {
									$('#kode_motor').val(msg);
								},
								error: function () {
									$('#kode_motor').val('reload kode error');
								}
							});
							$('#konten').load('view/tampil_alternative.php');


						},
						error: function () {

							$('#notif').html("<div class='alert alert-danger; font-weight:bold'>Data Gagal Tersimpan</div>");
						}
					});//end simpan gambar
					
				}//end of else 
			})


		});

	</script>