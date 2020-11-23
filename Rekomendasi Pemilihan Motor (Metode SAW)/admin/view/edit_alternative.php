<?php 

include '../../config/koneksi.php';

$kode = $_POST['kode'];

$detail = mysqli_query($koneksi,"SELECT*FROM `data_motor` INNER JOIN `spesifikasi_motor` ON  `spesifikasi_motor`.`kode_motor`=`data_motor`.`kode_motor` WHERE data_motor.kode_motor='$kode'");
$motor=$detail->fetch_assoc();

$tipe_mesin = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K1'");

$susunan_silinder = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K2'");

$merk = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K3'");

$volume_silinder = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K4'");

$sistem_bahanbakar = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K5'");

$transmisi = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K6'");

$harga = mysqli_query($koneksi,"SELECT*FROM nilai_kriteria INNER JOIN data_kriteria ON nilai_kriteria.kode_kriteria=data_kriteria.kode_kriteria WHERE nilai_kriteria.kode_kriteria='K7'");

?>

<div class="panel panel-info">
	<div class="panel-heading">
		<label style="font-size: 17px">Edit Data Motor</label>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<form id="form-data">
				<tr>
					<td>Kode Motor</td>
					<td><input type="text" id="kode_motor" name="kode_motor" class="form-control" value="<?php echo $kode; ?>" readonly></td>
				</tr>
				<tr>
					<td>Nama Motor</td>
					<td><input type="text" id="nama_motor" name="nama_motor" class="form-control" value="<?php echo $motor['nama_motor']; ?>"></td>
				</tr>
				<tr>
					<td>Gambar (Opsional)</td>
					<td><input id="fileupload" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="fileupload" autocomplete="off"></td>
				</tr>
				<tr>
					<td>Merk Motor</td>
					<td>
						<select class="form-control" id="merk" name="merk">
							<option value="" selected> -- Pilih Merk Motor -- </option>
							<?php foreach ($merk as $key => $value): ?>
								<option value="<?php echo $value['crips']; ?>"
									<?php if ($motor['merk_motor']==$value['crips']) {
											echo 'selected';
										} ?>
								><?php echo $value['crips'] ?></option>
							<?php endforeach ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Tipe Mesin</td>
					<td>							
						<select class="form-control" id="tipe_mesin" name="tipe_mesin">
							<option value="" selected> -- Pilih Tipe Mesin -- </option>
							<?php foreach ($tipe_mesin as $key => $value): ?>
								<option value="<?php echo $value['crips'] ?>"
									<?php if ($motor['tipe_mesin']==$value['crips']) {
										echo 'selected';
									} ?>
									><?php echo $value['crips'] ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Susunan Silinder</td>
						<td>
							<select class="form-control" id="susunan_silinder" name="susunan_silinder">
								<option value="" selected> -- Pilih Susunan Silinder -- </option>
								<?php foreach ($susunan_silinder as $key => $value): ?>
									<option value="<?php echo $value['crips'] ?>"
										<?php if ($motor['silinder']==$value['crips']) {
											echo 'selected';
										} ?>
										><?php echo $value['crips'] ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Volume Silinder</td>
							<td>
								<select class="form-control" id="volume_silinder" name="volume_silinder">
									<option value="" selected> -- Pilih Volume Silinder -- </option>
									<?php foreach ($volume_silinder as $key => $value): ?>
										<option value="<?php echo $value['crips'] ?>"
											<?php if ($motor['volume']==$value['crips']) {
											echo 'selected';
										} ?>
										><?php echo $value['crips'] ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Sistem Bahan Bakar</td>
							<td>
								<select class="form-control" id="sistem_bahanbakar" name="sistem_bahanbakar">
									<option value="" selected> -- Pilih Sistem Bahan Bakar -- </option>
									<?php foreach ($sistem_bahanbakar as $key => $value): ?>
										<option value="<?php echo $value['crips'] ?>"
										<?php if ($motor['sistem_bb']==$value['crips']) {
											echo 'selected';
										} ?>
										><?php echo $value['crips'] ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Tipe Transmisi</td>
							<td>
								<select class="form-control" id="transmisi" name="transmisi">
									<option value="" selected> -- Pilih Tipe Transmisi -- </option>
									<?php foreach ($transmisi as $key => $value): ?>
										<option value="<?php echo $value['crips'] ?>"
										<?php if ($motor['transmisi']==$value['crips']) {
											echo 'selected';
										} ?>
										><?php echo $value['crips'] ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Harga</td>
							<td>
								<input type="number" name="harga" id="harga" class="form-control" value="<?php echo $motor['harga'] ?>">
							</td>
						</tr>
					</form>
				</table>
				<hr>
				<center>
					<label>Preview Image</label><br>
					<img id="preview1" class="img-thumbnail" style="width: 250px" src="img/<?php echo $motor['gambar']; ?>">
					<!-- <img  class="img-thumbnail" src="#" width="150px"> -->
				</center>
			</div>
			<div class="panel-footer" align="right">
				<button class="btn btn-sm btn-danger" id="close">Close</button>
				<button class="btn btn-sm btn-success" id="update">Update Data</button>
			</div>
		</div>

		<script type="text/javascript">

			function readURL(input) {
				if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
				$('#preview1').attr('src', e.target.result);
					}
		
				reader.readAsDataURL(input.files[0]);
				}
			}

			$("#fileupload").change(function(){
				readURL(this);
			});

$(document).ready(function(){

		$('#close').click(function(){
			$('#detail-motor').hide(300);
		});

		$('#update').click(function(){
					
				var kode = $('#kode_motor').val();
				var nama = $('#nama_motor').val();
				var mesin = $('#tipe_mesin').val();
				var silinder = $('#susunan_silinder').val();
				var merk = $('#merk').val();
				var volume = $('#volume_silinder').val();
				var sistem_bb = $('#sistem_bahanbakar').val();
				var transmisi = $('#transmisi').val();
				var harga = $('#harga').val();
				var file = $('#fileupload').val();

				if (nama==''||mesin==''||silinder==''||merk==''||volume==''||sistem_bb==''||transmisi==''||harga=='') {
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
						url: "proses/update_alternative.php",
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						success: function (msg) {

						swal("Update Data Berhasil", "Data telah diperbarui", "success")
								.then((value) => {
								  $('#konten').load('view/tampil_alternative.php');
								});

						},
						error: function () {
							swal("Update Data Gagal", "Data tidak terupdate", "error")
								.then((value) => {
								  $('#konten').load('view/tampil_alternative.php');
								});

						}
					});//end simpan gambar
				
				}//end of else 
				});

			})

		</script>