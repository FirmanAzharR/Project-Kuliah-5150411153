<div style="padding: 25px" class="animated fadeIn">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Data Guru</h6>	
		</div>
		<div class="col-md-6">
			<?php if ($_SESSION['hak_akses']=='admin'): ?>
			<button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambahsiswa" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>&nbsp;Tambah Guru
			</button>
		<?php endif ?>
		</div>
	</div>
<hr>
<table id="myTable" align="center" class="table table-hover table-bordered table-responsive-sm">
	<thead class="thead-light" style="text-align: center;">
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama Lengkap</th>
			<th scope="col">Jenis Kelamin</th>
			<th scope="col">Email</th>
			<th scope="col">Status</th>
			<th scope="col">Option</th>
		</tr>
	</thead>
	<tbody>
		<?php $guru=$data->select_guru()?>
		<?php foreach ($guru as $key => $value): ?>
			<tr>
				<td width="10%" align="center"><?php echo $key+1; ?></td>
				<td align="center"><?php echo $value['nama']; ?></td>
				<td align="center"><?php echo $value['jenkel']; ?></td>
				<td align="center"><?php echo $value['email']; ?></td>
				<?php $id=$value['id_guru'] ?>
				<?php $akademik=$data->status_akademik_guru($id) ?>
				<td align="center"><?php if ($akademik['status']==1) {
						echo "<i class='fa fa-check-circle' style='color:#1BA160'></i>&nbsp;Aktif";
					}elseif ($akademik['status']==0) {
						echo "<i class='fa fa-close' style='color:#DD5347'></i>&nbsp;Tidak Aktif";
					}else{
						echo "";
					} ?></td>
				<td align="center" width="20%" >
					<a href="index.php?halaman=akademikguru&id=<?php echo $value['id_guru'];?>" style="color: white; margin:1px" class="btn btn-primary btn-sm" role="button" data-toggle="popover" title="Akademik" data-content="Tambah akademik guru"><i class="fa fa-book"></i></a>
					<a href="index.php?halaman=detailguru&id=<?php echo $value['id_guru'];?>" style="color: white; margin:1px" class="btn btn-info btn-sm" role="button" data-toggle="popover" title="Detail" data-content="Detail data guru"><i class="fa fa-eye"></i></a>
					<?php if ($_SESSION['hak_akses']=='admin'): ?>
					<a href="index.php?halaman=editguru&id=<?php echo $value['id_guru'];?>" style="color: white; margin:1px" class="btn btn-warning btn-sm" role="button" data-toggle="popover" title="Edit" data-content="Edit akademik guru"><i class="fa fa-edit"></i></a>
					<a  data-toggle="confirmation" data-title="Delete Data ?" data-popout="true" data-singleton="true" href="index.php?halaman=deleteguru&id=<?php echo $value['id_guru'];?>" style="margin: 1px" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
				<?php endif ?>
				</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modaltambahsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Guru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6" style="border-right: 1px #eee solid">
							<label>Foto</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-image"></i></span>
								</div>
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="foto" accept="image/png, image/jpeg">
									<label class="custom-file-label" for="inputGroupFile01">Upload Foto</label>
								</div>
							</div>
							<label>Nama Lengkap</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
								</div>
								<input autocomplete="off" type="text" name="namalengkap" class="form-control" placeholder="Masukan Nama Lengkap" aria-label="nama" aria-describedby="basic-addon1" required="">
							</div>
							<label>Jenis Kelamin</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-mars-stroke"></i></span>
								</div>
								<select autocomplete="off" name="jenkel" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
									<option value="" disabled selected>Pilih Jenis Kelamin</option>
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
							<label>Tempat Lahir</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker fa-lg"></i></span>
								</div>
								<input autocomplete="off" type="text" name="tempatlahir" class="form-control" aria-label="tgllahir" aria-describedby="basic-addon1" required="" placeholder="Tempat Lahir">
							</div>
							<label>Tanggal Lahir</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
								</div>
								<?php $dt = date('Y-m-d');?>
								<input autocomplete="off" type="date" name="tgllahir" min="1800-12-30" max="<?php echo $dt; ?>" class="form-control" aria-label="tgllahir" aria-describedby="basic-addon1" required="">
							</div>
							<label>Agama</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa  fa-asterisk"></i></span>
								</div>
								<select name="agama" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required="">
									<option value="" disabled selected>Pilih Agama</option>
									<option value="islam">Islam</option>
									<option value="kristen">Kristen</option>
									<option value="katholik">Katholik</option>
									<option value="hindu">Hindu</option>
									<option value="budha">Budha</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<label>Status</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa  fa-asterisk"></i></span>
								</div>
								<select name="status" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required="">
									<option value="" disabled selected>Pilih Status</option>
									<option value="nikah">Nikah</option>
									<option value="belum nikah">Belum Nikah</option>
								</select>
							</div>
							<label>Email</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
								</div>
								<input autocomplete="off" type="email" name="email" class="form-control" placeholder="contoh@mail.com" aria-label="email" aria-describedby="basic-addon1" required="">
							</div>
							<label>Telepon</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
								</div>
								<input type="number" autocomplete="off" name="telepon" class="form-control" placeholder="Masukan Nomor Telepon" aria-label="telp" aria-describedby="basic-addon1" required="">
							</div>
							<label>Pendidikan</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-plus"></i></span>
								</div>
								<input autocomplete="off" type="text" name="pendidikan" class="form-control" placeholder="Pendidikan Terakhir" aria-label="jml" aria-describedby="basic-addon1" required="">
							</div>
							<label>Alamat</label>
							<div class="form-group">
								<textarea name="alamat" class="form-control" placeholder="Masukan Alamat..." required=""></textarea>
							</div>
							<div>
								<hr>
								<div class="form-group" align="center">
									<button type="submit" name="tambah" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
									<?php 
									if(isset($_POST['tambah']))
									{
										$data->add_guru($_POST['namalengkap'],$_POST['jenkel'],$_POST['tempatlahir'],$_POST['tgllahir'],$_POST['agama'],$_POST['alamat'],$_POST['email'],$_POST['telepon'],$_POST['status'],$_POST['pendidikan'],$_FILES['foto']);
										echo "<script>setTimeout(function () { 
											swal({
												title: 'Tersimpan',
												type: 'success',
												showConfirmButton: false,
												timer: 1000,
												});  
												},10); 
												window.setTimeout(function(){ 
													window.location.replace('index.php?halaman=guru');
												} ,1000); </script>";
											}
											?>
											<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;&nbsp;Batal</button>
										</div>
										<hr>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer"></div>
				</div>
			</div>
		</div>

		<!-- Detai Modal -->
		<div class="modal fade" id="detai-lmodal"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Detail Siswa</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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


<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'top',
        trigger : 'hover'
    });
});
</script>