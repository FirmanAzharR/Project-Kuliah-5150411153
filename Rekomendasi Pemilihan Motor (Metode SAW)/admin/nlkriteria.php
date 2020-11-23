	<?php include '../config/koneksi.php'; ?>
	<h3>Data Nilai Kriteria Sepeda Motor</h3>
	<hr>
	<!-- <button type="button" id="tambah" class="btn btn-primary" style="margin-bottom: 20px"><i class="fa fa-plus"></i>&nbsp;Tambah Kriteria</button> -->
	<div id="konten">
		
	</div>

	<!-- MODAL -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Nilai Kriteria</h4>
				</div>
				<div class="modal-body">
					<form id="form-data">
						<div class="form-group">
							<label>Kode Nilai Kriteria</label>
							<input type="text" id="kode_nilai_kriteria" name="kode_nilai_kriteria" class="form-control" value="" readonly>
						</div>
						<div class="form-group">
							<label>Kriteria</label>
							<select class="form-control" id="kriteria">
								<option disabled selected>Pilih Kriteria</option>
								<?php $kriteria = mysqli_query($koneksi,"SELECT*FROM data_kriteria"); ?>
								<?php foreach ($kriteria as $key => $value): ?>
									<option value="<?php echo $value['kode_kriteria'] ?>" nama_kriteria="<?php echo $value['nama_kriteria'] ?>">
										<?php echo $value['nama_kriteria']; ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Crips</label>
							<input type="text" id="crips" name="crips" class="form-control" placeholder="Crips">
						</div>	
						<div class="form-group">
							<label>Nilai</label>
							<input type="number" id="nilai" name="nilai" class="form-control" placeholder="Nilai">
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
			$('#konten').load('view/tampil_nilai_kriteria.php');
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#dt-nk').addClass("active");

		})
	</script>