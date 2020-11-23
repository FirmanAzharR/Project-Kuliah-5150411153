<style type="text/css">
td{
	text-align: center;
}
</style>

<div style="padding: 25px" class="animated fadeIn" id="tampil">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Data User</h6>
		</div>
		<div class="col-md-6">
			<button class="btn btn-info btn-sm" style="float: right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah User</button>
		</div>
	</div>
	<hr>
	<form method="POST">
		<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
			<thead class="thead-light" style="text-align: center;">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">Username</th>
					<th scope="col">Password</th>
					<th scope="col">Hak Akses</th>
					<th scope="col">Option</th>
				</tr>
			</thead>
			<tbody>
				<?php $user=$data->select_user(); ?>
				<?php foreach ($user as $key => $value): ?>
					<tr>
						<?php $id=$value['username']; ?>
						<?php $nama_siswa=$data->select_siswa_user($id); ?>
						<?php $nama_guru=$data->select_guru_user($id); ?>
						<?php $nama_admin=$data->select_admin_user($id); ?>
						<?php $nama_kepala=$data->select_kepala_user($id); ?>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $nama_siswa['nama_siswa']; ?><?php echo $nama_guru['nama']; ?><?php echo $nama_admin['nama']; ?><?php echo $nama_kepala['nama']; ?></td>
						<td class="usr"><?php echo $value['username']; ?></td>
						<td class="pass"><?php echo $value['password']; ?></td>
						<td class="ha"><?php echo $value['hak_akses']; ?></td>
						<td><button style="color: white; margin:1px" class="btn btn-warning btn-sm editlink" role="button" data-toggle="popover" title="Edit" data-content="Edit data siswa"><i class="fa fa-edit"></i></button>					<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deleteuser&id=<?php echo $value['username'];?>" style="margin: 1px" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</form>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control user" placeholder="username" aria-label="username" aria-describedby="basic-addon1" readonly="true">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
						</div>
						<input type="text" name="password" class="form-control password" placeholder="password" aria-label="password" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
						</div>
						<select name="hak_akses" class="form-control hak_akses" aria-label="hak_akses" aria-describedby="basic-addon1" required="">
							<option disabled selected value="">Pilih Hak Akses</option>
							<option value="siswa">siswa</option>
							<option value="guru">guru</option>
							<option value="admin">admin</option>
						</select>
					</div>
					<div style="float: right">
						<button name="ubah" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Update</button>
						<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</button>
					</div>
					<?php 
					if (isset($_POST['ubah'])) {
						$data->update_user($_POST['username'],$_POST['password'],$_POST['hak_akses']);
						echo "<script>setTimeout(function () { 
							swal({
								title: 'Update Berhasil',
								type: 'success',
								showConfirmButton: false,
								timer: 800,
								});  
								},10); 
								window.setTimeout(function(){ 
									window.location.replace('index.php?halaman=kelolauser');
								} ,800); </script>";
							}

							?>
						</form>
					</div>
				</div>
			</div>
		</div>



		<!--tambah-->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text user" id="basic-addon1"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" name="username" class="form-control" placeholder="username" aria-label="username" aria-describedby="basic-addon1">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text password" id="basic-addon1"><i class="fa fa-key"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon1">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
								</div>
								<select name="hak_akses" class="form-control hak_akses" aria-label="hak_akses" aria-describedby="basic-addon1" required="">
									<option disabled selected value="">Pilih Hak Akses</option>
									<option value="siswa">siswa</option>
									<option value="guru">guru</option>
									<option value="admin">admin</option>
								</select>
							</div>
							<div style="float: right">
								<button class="btn btn-success" name="simpan"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
								<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</button>
							</div>
							<?php 
							if (isset($_POST['simpan'])) {
								$data->add_user($_POST['username'],$_POST['password'],$_POST['hak_akses']);
								echo "<script>setTimeout(function () { 
									swal({
										title: 'Data Tersimpan',
										type: 'success',
										showConfirmButton: false,
										timer: 800,
										});  
										},10); 
										window.setTimeout(function(){ 
											window.location.replace('index.php?halaman=kelolauser');
										} ,800); </script>";
									}

									?>
								</form>
							</div>
						</div>
					</div>
				</div>


				<script type="text/javascript">
					$(document).ready(function(){
						$(".editlink").click(function(){
							var myModal = $('#myModal');
							var user = $(this).closest('tr').find('td.usr').html();
							var password = $(this).closest('tr').find('td.pass').html();
							var hak_akses = $(this).closest('tr').find('td.ha').html();
							$('.user', myModal).val(user);
							$('.password', myModal).val(password);
							$('.hak_akses', myModal).val(hak_akses);
							myModal.modal({ show: true });
							return false;
						});
					});
				</script>



				<script type="text/javascript">
					function Redirect() {
						window.location="index.php?halaman=nilai";
					}
				</script>

				<script type="text/javascript">
					$('[data-toggle=confirmation]').confirmation({
						rootSelector: '[data-toggle=confirmation]',});
					</script>

					<script type="text/javascript">
						$(document).ready( function () {
							$('#myTable').DataTable();
						} );
					</script>