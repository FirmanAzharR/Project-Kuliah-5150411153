<style type="text/css">
thead,tbody{
	text-align: center;
}
tfoot input {
	width: 100%;
	padding: 3px;
	box-sizing: border-box;
	border-style: initial;
	text-align: center; 
}
</style>

<div style="padding: 25px" class="animated fadeIn" id="input" name="input">
	<div class="row">
		<div class="col-md-6">
			<div>
				<h4 style="display: inline-block;">Update Semester & Kelas
					<?php $judul=$user->judul_data_wali($_SESSION['id']) ?>
					<?php foreach ($judul as $key => $value): ?>
						[&nbsp;<?php echo $value['nama_kelas']; ?>&nbsp;-&nbsp;<?php echo $value['nama_jurusan']; ?>&nbsp;]&nbsp;&nbsp;
						<?php endforeach ?></h4>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-3">
					<div style="float: right">
						<form method="post">
							<button data-toggle="confirmation"
							data-btn-ok-label="Simpan" data-btn-ok-class="btn-success"
							data-btn-cancel-label="Batal!" data-btn-cancel-class="btn-danger"
							data-title="Update ke Semester 2" data-content="Update Seluruh Siswa ke Semester 2 "  data-singleton="true"  type="submit" style="float: right" name="update"  class="btn btn-primary btn-sm"><i class="fa fa-book"></i>&nbsp;Update Semester</button>
							<?php 
							$data->update_semester($_SESSION['id']);
							?>
						</form>
					</div>
				</div>
			</div>
			<hr>
			<form method="post">
				<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm ">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Jurusan</th>
							<th>Kelas</th>
						</tr>
					</thead>
					<tbody>
						<?php $nip=$_SESSION['id'];?>
						<?php error_reporting(0); ?>
						<?php $siswa=$user->siswa_base_on_wali($nip)?>
						<?php foreach ($siswa as $key => $value): ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><input type="hidden" name="id_siswa[]" value="<?php echo $value['id_siswa'] ?>"><?php echo $value['nama_siswa'] ?></td>
								<td><?php echo $value['nama_kelas'] ?></td>
								<td><?php echo $value['nama_jurusan'] ?></td>
								<?php $id=$value['id_siswa'] ?>
								<td width="15%">
									<?php $siswa=$data->one_select_siswa_akademik($id); ?>
									<?php $kode=$siswa['id_jurusan'] ?>
									<select class="form-control" name="kls[]" class="form-group" required="">
										<option value="">Pilih Kelas</option>
										<?php $kelas=$data->select_kelas1($kode)?>
										<?php foreach ($kelas as $key => $value): ?>
											<?php echo "<option value='".$value['id_kelas']."'"?> 
											<?php 
											if ($value['id_kelas']=="") {
												echo "selected";
											}?> <?php echo ">"; ?><?php echo $value['nama_kelas']; ?>  -  <?php echo $value['nama_jurusan']; ?></option>
										<?php endforeach ?>
									</select>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Filter</th>
							<th>( Nama )</th>
							<th>( Kelas )</th>
							<th>( Jurusan )</th>
							<th>( Semester )</th>
						</tr>
					</tfoot>
				</table>	
				<hr>
				<center><button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;Simpan</button></center>
				<?php 
				$data->multiple_naik_kelas();
				?>
			</form>
		</div>


		<script type="text/javascript">
			$(document).ready( function () {
				$('#myTable').DataTable();
			} );
			$(document).ready(function() {
				$('#myTable tfoot th').each( function () {
					var title = $(this).text();
					$(this).html( '<input type="text" placeholder="'+title+'" />' );
				} );

				var table = $('#myTable').DataTable();

				table.columns().every( function () {
					var that = this;

					$( 'input', this.footer() ).on( 'keyup change', function () {
						if ( that.search() !== this.value ) {
							that
							.search( this.value )
							.draw();
						}
					} );
				} );
			} );
		</script>

		<script type="text/javascript">
			$('[data-toggle=confirmation]').confirmation({
				rootSelector: '[data-toggle=confirmation]',});
			</script>