<?php $kode = $_POST['kode']; ?>
<form id="form-data">
	<input type="hidden" name="kode" id="kode" class="form-control" value="<?php echo $kode; ?>">
	<label style="color:white">Foto Hewan Peliharaan</label>
	<input type="file" name="fileupload" id="fileupload" class="form-control">
	<br>
	
</form>
<a href="#" id="simpan" class="btn btn-success">Simpan</a>


<script>
	$(document).ready( function () {
		$("#simpan").click(function(){
			const fileupload = $('#fileupload').prop('files')[0];

			let formData = new FormData();
			formData.append('fileupload', fileupload);
			formData.append('kode', $('#kode').val());

			$.ajax({
				type: 'POST',
				url: "proses/upload.php",
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				success: function (msg) {
					document.getElementById("form-data").reset();
					Swal.fire({
						title: 'Konfirmasi Penitipan?',
						text: "Silahkan tekan *Selesai* apabila tidak ingin menambah penitipan pada transaksi ini.",
						type: 'question',
						showCancelButton: true,
						confirmButtonColor: '#0E9C58',
						cancelButtonColor: '#D34C3F',
						confirmButtonText: 'Selesai',
						cancelButtonText: "Tambah Penitipan"
					}).then((result) => {
						if (result.value) {
							swal({
								title: "Transaksi Sukses",
								text: "Thank You :)",
								type: "success",
								timer: 1500,
								showConfirmButton: false,
							}).then(function() {
								window.location = "index.php?halaman=dashboard";
							})
						}
						else {
							location.reload();
						}
					})
				},
				error: function () {
					alert("Data Gagal Diupload");
				}
			});
		});
	});
</script>