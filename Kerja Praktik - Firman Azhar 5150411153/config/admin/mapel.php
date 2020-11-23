<script type="text/javascript">
	$(document).ready(function(){
		$(".editlink").click(function(){
			var myModal = $('#myModal');
			var kode = $(this).closest('tr').find('td.km').html();
			var nama = $(this).closest('tr').find('td.nm').html();
			var kkm = $(this).closest('tr').find('td.kkm').html();
			var kodeguru = $(this).closest('tr').find('td.kg').html();
			$('.kode_hiden', myModal).val(kode);
			$('.kode_mapel', myModal).val(kode);
			$('.nama_mapel', myModal).val(nama);
			$('.kkm', myModal).val(kkm);
			$('.kode_guru', myModal).val(kodeguru);
			myModal.modal({ show: true });
			return false;
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$(".add_detail").click(function(){
			var myModal = $('#myModaldetail');
			var kode = $(this).closest('tr').find('td.km').html();
			var nama = $(this).closest('tr').find('td.nm').html();
			var kodeguru = $(this).closest('tr').find('td.kg').html();
			$('.kode_hiden', myModal).val(kode);
			$('.kode_mapel', myModal).val(kode);
			$('.nama_mapel', myModal).val(nama);
			$('.kode_guru', myModal).val(kodeguru);
			myModal.modal({ show: true });
			return false;
		});
	});
</script>

<div style="padding: 25px" class="animated fadeIn">
	<div style="padding: 20px" class="animated fadeIn">
		<div class="row">
			<div class="col-md-6">
				<h6 style="font-size: 25px;">Data Mata Pelajaran</h6>	
			</div>
			<div class="col-md-6">
				<?php if ($_SESSION['hak_akses']=='admin'): ?>
				<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i>&nbsp;&nbsp;Data Mapel</button>
				<button type="button" style="float: right;margin-right: 10px" class="btn btn-primary" data-toggle="modal" data-target="#mapel_kelas"><i class="fa fa-book"></i>&nbsp;&nbsp;Mapel Kelas</button>
			<?php endif ?>
			</div>
		</div>
		<hr>
		<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center;">
				<tr>
					<th scope="col">No</th>
					<th scope="col">KM</th>
					<th scope="col">Mata Pelajaran</th>
					<th scope="col">KKM</th>
					<th scope="col">KG</th>
					<th scope="col">Guru</th>
					<?php if ($_SESSION['hak_akses']=='admin'): ?>
					<th scope="col">Option</th>
				<?php endif ?>
				</tr>
			</thead>
			<tbody>
				<?php error_reporting(0); ?>
				<?php $mapel=$data->select_mapel()?>
				<?php foreach ($mapel as $key => $value): ?>
					<tr>
						<td width="10%" align="center"><?php echo $key+1; ?></td>
						<td class="km" align="center"><?php echo $value['kode_mapel']; ?></td>
						<td class="nm" width="25%" align="center"><?php echo $value['nama_mapel']; ?></td>
						<td class="kkm" align="center"><?php echo $value['kkm']; ?></td>
						<td class="kg" align="center"><?php echo $value['kode_guru']; ?></td>
						<td class="gr" width="25%" align="center"><?php echo $value['nama']; ?></td>
						<?php if ($_SESSION['hak_akses']=='admin'): ?>
						<td align="center" width="15%" >
							<button class="add_detail btn btn-info btn-sm" style="color: white; margin:1px" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></button>
							<button class="editlink btn btn-warning btn-sm" style="color: white; margin:1px" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
							<a data-toggle="confirmation" data-title="Delete Data ?" data-popout="true" data-singleton="true" href="index.php?halaman=deletemapel&id=<?php echo $value['kode_mapel'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td><?php endif ?>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

	</div>
	<!--mapel kelas detail-->
	<div class="modal fade" id="mapel_kelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Detail Mata Pelajaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table id="myTable1" align="center" class="table table-hover table-bordered table-responsive-sm">
						<thead class="thead-light" style="text-align: center;">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Kode</th>
								<th scope="col">Mata Pelajaran</th>
								<th scope="col">Kelas</th>
								<th scope="col">Jurusan</th>
								<th scope="col">Option</th>
							</tr>
						</thead>
						<tbody>
							<?php error_reporting(0); ?>
							<?php $select=$data->select_detail_mapel() ?>
							<?php foreach ($select as $key => $value): ?>
								<tr>
									<td width="10%" align="center"><?php echo $key+1; ?></td>
									<td class="km" align="center"><?php echo $value['kode_mapel']; ?></td>
									<td class="nm" width="25%" align="center"><?php echo $value['nama_mapel']; ?></td>
									<td class="kkm" align="center"><?php echo $value['nama_kelas']; ?></td>
									<td class="kg" align="center"><?php echo $value['nama_jurusan']; ?></td>
									<td align="center" width="15%" >
										<a data-toggle="confirmation" data-title="Delete Data ?" data-popout="true" data-singleton="true" href="index.php?halaman=deletedetailmapel&id=<?php echo $value['id_detail'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- ADD -->
	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Mata Pelajaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-code"></i></span>
							</div>
							<input type="text" name="kode" class="form-control kode_mapel" placeholder="Kode Mapel" aria-label="nama" aria-describedby="basic-addon1" required="">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
							</div>
							<input type="text" name="nama" class="form-control nama_mapel" placeholder="Nama Mapel" aria-label="nama" aria-describedby="basic-addon1" required="">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
							</div>
							<input type="number" min="65" max="100" name="kkm" class="form-control kkm" placeholder="KKM 65-100" aria-label="kkm" aria-describedby="basic-addon1" required="">
						</div>
						<div class="form-group">
							<select class="form-control kode_guru" name="kd_gr" class="form-group" required>
								<option value="">Pilih Guru</option>
								<?php $wali=$data->select_walikelas()?>
								<?php foreach ($wali as $key => $value): ?>
									<?php echo "<option value='".$value['kode_guru']."'>";?><?php echo $value['nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" name="add" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Tambah</button>
							<?php 
							if(isset($_POST['add']))
							{
								$data->add_mapel($_POST['kode'],$_POST['nama'],$_POST['kkm'],$_POST['kd_gr']);
							}
							?>
							<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!--EDIT-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Mata Pelajaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-code"></i></span>
							</div>
							<input type="text" class="form-control kode_mapel" placeholder="Kode Mapel" aria-describedby="basic-addon1" disabled="">
							<input type="hidden" name="kode" class="form-control kode_hiden" placeholder="Kode Mapel" aria-describedby="basic-addon1">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
							</div>
							<input type="text" name="nama" class="form-control nama_mapel" placeholder="Nama Mapel" aria-label="nama" aria-describedby="basic-addon1" required="">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
							</div>
							<input type="number" min="65" max="100" name="kkm" class="form-control kkm" placeholder="Nama Mapel" aria-label="kkm" aria-describedby="basic-addon1" required="">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
							</div>
							<select name="kode_guru" class="form-control kode_guru" aria-label="kg" aria-describedby="basic-addon1" required="">
								<option value="" disabled selected>Pilih Guru</option>
								<?php $aka=$data->select_mapel_guru()?>
								<?php foreach ($aka as $key => $value): ?>
									<?php echo "<option value='".$value['kode_guru']."'>";?><?php echo $value['nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-success" name="ubah">Update</button>
							<?php 
							if(isset($_POST['ubah']))
							{
								echo $_POST['kode'];
								$data->update_mapel($_POST['kode'],$_POST['nama'],$_POST['kkm'],$_POST['kode_guru']);
								echo "<script>setTimeout(function () { 
									swal({
										title: 'Update Berhasil',
										type: 'success',
										showConfirmButton: false,
										timer: 800,
										});  
										},10); 
										window.setTimeout(function(){ 
											window.location.replace('index.php?halaman=mapel');
										} ,800); </script>";
									}
									?>
									<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batal</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>


		<!--detail-->
		<div class="modal fade" id="myModaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Mapel Untuk Kelas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-code"></i></span>
								</div>
								<input type="text" name="kode" class="form-control kode_mapel" placeholder="Kode Mapel" aria-describedby="basic-addon1" readonly="">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span>
								</div>
								<input readonly="" type="text" name="nama" class="form-control nama_mapel" placeholder="Nama Mapel" aria-label="nama" aria-describedby="basic-addon1" required="">
							</div>
							<div class="form-group">
								<select class="form-control kode_kelas" name="kd_kls" class="form-group" required>
									<option value="">Pilih Kelas</option>
									<?php $kelas=$data->select_kelas()?>
									<?php foreach ($kelas as $key => $value): ?>
										<?php echo "<option value='".$value['id_kelas']."'>";?><?php echo $value['nama_kelas']; ?> - <?php echo $value['nama_jurusan']; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<button class="btn btn-success" name="simpan1"><i class="fa fa-save"></i>&nbsp;Simpan</button>
								<?php 
								if(isset($_POST['simpan1']))
								{
									$data->add_mapel_kelas($_POST['kd_kls'],$_POST['kode']);

								}
								?>
								<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batal</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$('[data-toggle=confirmation]').confirmation({
			rootSelector: '[data-toggle=confirmation]',});
		</script>

		<script type="text/javascript">
			$(document).ready( function () {
				$('#myTable').DataTable();
			} );
		</script>
		<script type="text/javascript">
			$(document).ready( function () {
				$('#myTable1').DataTable({
					"aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
					"iDisplayLength": 5
				});
			} );
		</script>