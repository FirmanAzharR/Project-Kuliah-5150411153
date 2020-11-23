<div style="padding: 20px" class="animated fadeIn">
	<div class="row">
		<div class="col-md-4">
			<h6 style="font-size: 25px;">Data Kelas</h6>	
		</div>
		<?php if ($_SESSION['hak_akses']=='admin'): ?>
			<div class="col-md-6">
				<button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i>&nbsp;&nbsp;Data Kelas</button>
			</div>
			<div class="col-md-2">
				<button type="button" style="float: right" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;
					Data Jurusan
				</button>
			</div>
		<?php endif ?>
	</div>
	<hr>
	<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
		<thead class="thead-light" style="text-align: center;">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Kelas</th>
				<th scope="col">Jurusan</th>
				<th scope="col">Wali Kelas</th>
				<?php if ($_SESSION['hak_akses']=='admin'): ?>
				<th scope="col">Option</th>
				<?php endif ?>
			</tr>
		</thead>
		<tbody>
			<?php //error_reporting(0); ?>
			<?php $kelas=$data->select_kelas()?>
			<?php foreach ($kelas as $key => $value): ?>
				<tr>
					<td width="10%" align="center"><?php echo $key+1; ?></td>
					<td align="center"><?php echo $value['nama_kelas']; ?></td>
					<td align="center"><?php echo $value['nama_jurusan']; ?></td>
					<td align="center"><?php echo $value['nama']; ?></td>
					<?php if ($_SESSION['hak_akses']=='admin'): ?>
					<td align="center" width="30%" ><a href="index.php?halaman=editkelas&id=<?php echo $value['id_kelas'];?>" style="color: white; margin:1px" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
						<a data-toggle="confirmation" data-title="Delete Data ?" data-popout="true" data-singleton="true" href="index.php?halaman=deletekelas&id=<?php echo $value['id_kelas'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a></td>
						<?php endif ?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<!--TAMBAH-->
	<div class="modal fade element" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" style="padding-right: 0px;"aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Kelas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<select id="kelas" name="kelas" class="form-control" required>
								<option value="">Pilih Kelas</option>
								<option value="X">X</option>
								<option value="XI">XI</option>
								<option value="XII">XII</option>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control" id="jurusan" name="jurusan" class="form-group" required>
								<option value="">Pilih Jurusan</option>
								<?php $jurusan=$data->select_jurusan()?>
								<?php foreach ($jurusan as $key => $value): ?>
									<?php echo "<option value='".$value['id_jurusan']."'>";?><?php echo $value['nama_jurusan']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control kode_guru" name="kd_gr" class="form-group" required>
								<option value="">Pilih Wali Kelas</option>
								<?php $guru=$data->select_walikelas()?>
								<?php foreach ($guru as $key => $value): ?>
									<?php echo "<option value='".$value['kode_guru']."'>";?><?php echo $value['nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<hr>
						<div class="form-group">
							<button type="submit" name="tambah" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
							<?php 
							if(isset($_POST['tambah']))
							{
								$data->add_kelas($_POST['kelas'],$_POST['jurusan'],$_POST['kd_gr']);
								
							}
							?>
							<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!--Modal Tambah Jurusan-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Data Jurusan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-5">
							<form method="post">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-check"></i></span>
									</div>
									<input type="text" name="nmjurusan" class="form-control" placeholder="Nama Jurusan" required="">
								</div>
								<hr>
								<div class="form-group">
									<button type="submit" name="add" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button> 
									<?php 
									if(isset($_POST['add']))
									{
										$data->add_jurusan(strtoupper($_POST['nmjurusan']));
									}
									?>
									<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</button>
								</div>
							</form>
						</div>
						<div class="col-md-7">
							<table class="table table-bordered">
								<thead align="center">
									<th>No</th>
									<th>Jurusan</th>
									<th>Option</th>
								</thead>
								<tbody>
									<?php $select=$data->select_jurusan() ?>
									<?php foreach ($select as $key => $value):?> 
										<tr align="center">
											<td td width="20px"><?php echo $key+1; ?></td>
											<td><?php echo $value['nama_jurusan']; ?></td>
											<td width="20px">
												<a data-toggle="confirmation" data-title="Delete Data ?" href="index.php?halaman=deletejurusan&id=<?php echo $value['id_jurusan'];?>" style="margin: 1px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
									<tr></tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );
	</script>


	<script type="text/javascript">
		$('[data-toggle=confirmation]').confirmation({
			rootSelector: '[data-toggle=confirmation]',});
		</script>
