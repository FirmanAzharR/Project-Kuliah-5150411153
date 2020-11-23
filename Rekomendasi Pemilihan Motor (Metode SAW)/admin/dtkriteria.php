	<h3>Data Kriteria Sepeda Motor</h3>
	<hr>
	<!-- <button type="button" id="tambah" class="btn btn-primary" style="margin-bottom: 20px"><i class="fa fa-plus"></i>&nbsp;Tambah Kriteria</button> -->
	<div id="konten">
		
	</div>


	<!-- MODAL -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Kriteria</h4>
				</div>
				<div class="modal-body">
					<form id="form-data">
						<div class="form-group">
							<label>kode Kriteria</label>
							<input type="text" id="kode_kriteria" name="kode_kriteria" class="form-control" value="" readonly>
						</div>
						<div class="form-group">
							<label>Nama Kriteria</label>
							<input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control" placeholder="Nama Kriteriar">
						</div>
						<div class="form-group">
							<label>Atribut</label>
							<select class="form-control" id="atribut">
								<option disabled selected>Pilih Atribut</option>
								<option value="benefit">Benefit</option>
								<option value="cost">Cost</option>
							</select>
						</div>
						<div class="form-group">
							<label>Bobot</label>
							<input type="number" id="bobot" name="bobot" class="form-control" placeholder="Bobot">
						</div>					
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" id="simpan">Simpan</button>
					<button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
					<div id="notif"></div>
				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#konten').load('view/tampil_kriteria.php');
		});
	</script>


	<script type="text/javascript">
		$(document).ready(function(){

			// $('#tambah').click(function(){
			// 	$('#myModal').modal('toggle');
			// });

			// $('#konten').load('view/tampil_alternative.php');

			// $.ajax({
			// 	url: "proses/auto_kode.php",
			// 	success: function (msg) {
			// 		$('#kode_motor').val(msg);
			// 	},
			// 	error: function () {
			// 		$('#kode_motor').val('reload kode error');
			// 	}
			// });

			// $('#simpan').click(function(){
			// 	const fileupload = $('#fileupload').prop('files')[0];

			// 	let formData = new FormData();
			// 	formData.append('fileupload', fileupload);
			// 	formData.append('kode_motor', $('#kode_motor').val());
			// 	formData.append('nama_motor', $('#nama_motor').val());

			// 	$.ajax({
			// 		type: 'POST',
			// 		url: "proses/tambah_alternative.php",
			// 		data: formData,
			// 		cache: false,
			// 		processData: false,
			// 		contentType: false,
			// 		success: function (msg) {
			// 			$('#notif').html("<div class='alert alert-success'>Data Tersimpan</div>");
			// 			document.getElementById("form-data").reset();
			// 			$.ajax({
			// 				url: "proses/auto_kode.php",
			// 				success: function (msg) {
			// 					$('#kode_motor').val(msg);
			// 				},
			// 				error: function () {
			// 					$('#kode_motor').val('reload kode error');
			// 				}
			// 			});
			// 			$('#konten').load('view/tampil_alternative.php');

			// 		},
			// 		error: function () {

			// 			$('#notif').html("<div class='alert alert-danger'>Data Gagal Tersimpan</div>");
			// 		}
			// 	});
			// })

		});
	</script>	


	<script type="text/javascript">
		$(document).ready(function(){

			$('#dt-k').addClass("active");

		})
	</script>