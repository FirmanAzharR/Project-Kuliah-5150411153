<div style="padding: 25px" class="animated fadeIn">
	<div class="row">
		<div class="col-md-6">
			<h6 style="font-size: 25px;">Data Siswa</h6>	
		</div>
		<div class="col-md-6">
			<?php if ($_SESSION['hak_akses']=='admin'): ?>
			<button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambahsiswa" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>&nbsp;Tambah Siswa
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
				<th scope="col">Kelas</th>
				<th scope="col">Jurusan</th>
				<th scope="col">Status</th>
				<th scope="col">Option</th>
			</tr>
		</thead>
		<tbody>
			<?php $siswa=$data->select_all_siswa()?>
			<?php foreach ($siswa as $key => $value): ?>
				<tr>
					<td width="10%" align="center"><?php echo $key+1; ?></td>
					<td width="25%" align="center"><?php echo $value['nama_siswa']; ?></td>
					<?php $id=$value['id_siswa'] ?>
					<td align="center"><?php echo $value['jenkel']; ?></td>
					<?php $akademik=$data->one_select_akademik_siswa($id)?>
					<td align="center"><?php echo $akademik['nama_kelas']; ?></td>
					<td align="center"><?php echo $akademik['nama_jurusan']; ?></td>
					<td align="center"><?php if ($akademik['status']==1) {
						echo "<i class='fa fa-check-circle' style='color:#1BA160'></i>&nbsp;Aktif";
					}elseif ($akademik['status']==0) {
						echo "<i class='fa fa-close' style='color:#DD5347'></i>&nbsp;Tidak Aktif";
					}elseif ($akademik['status']==2) {
						echo "<i class='fa fa-check-circle'></i>&nbsp;Lulus";
					} ?></td>
					<td align="center" width="20%" >
						<a href="index.php?halaman=akademiksiswa&id=<?php echo $value['id_siswa'];?>" style="color: white; margin:1px" class="btn btn-primary btn-sm" role="button" data-toggle="popover" title="Akademik" data-content="Tambah akademik siswa"><i class="fa fa-book"></i></a>
						<a href="index.php?halaman=detailsiswa&id=<?php echo $value['id_siswa'];?>" style="color: white; margin:1px" class="btn btn-info btn-sm" role="button" data-toggle="popover" title="Detail" data-content="Lihat detail data siswa"><i class="fa fa-eye"></i></a>
						<?php if ($_SESSION['hak_akses']=='admin'): ?>
							<a href="index.php?halaman=editsiswa&id=<?php echo $value['id_siswa'];?>" style="color: white; margin:1px" class="btn btn-warning btn-sm" role="button" data-toggle="popover" title="Edit" data-content="Edit data siswa" ><i class="fa fa-edit"></i></a>
							<a data-toggle="confirmation" data-title="Delete Data ?" title="Hapus Data" data-popout="true" data-singleton="true" href="index.php?halaman=deletesiswa&id=<?php echo $value['id_siswa'];?>" style="margin: 1px" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
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
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Siswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-4" style="border-right: 1px #eee solid">
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
									<input type="text" autocomplete="off" name="namalengkap" class="form-control" placeholder="Nama Lengkap" aria-label="nama" aria-describedby="basic-addon1" required="">
								</div>
								<label>Jenis Kelamin</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-mars-stroke"></i></span>
									</div>
									<select name="jenkel" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
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
									<input type="date" max="<?php echo $dt; ?>"" id="datepicker" name="tgllahir" class="form-control" aria-label="tgllahir" aria-describedby="basic-addon1" required="">
								</div>

								<label>Alamat</label>
								<div class="form-group">
									<textarea name="alamat" class="form-control" placeholder="Masukan Alamat..." required=""></textarea>
								</div>
							</div>
							<div class="col-md-4" style="border-right: 1px #eee solid">
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
									<input autocomplete="off" type="number" name="telepon" class="form-control" placeholder="Masukan Nomor Telepon" aria-label="telp" aria-describedby="basic-addon1" required="">
								</div>
								<label>Jumlah Saudara</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-plus"></i></span>
									</div>
									<input autocomplete="off" type="number" min="0" name="jmlsaudara" class="form-control" placeholder="Jumlah Saudara" aria-label="jml" aria-describedby="basic-addon1" required="">
								</div>
								<label>Nama Adik</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-child"></i></span>
									</div>
									<input autocomplete="off" type="text" name="namaadik" class="form-control" placeholder="Nama Lengkap Adik" aria-label="adik" aria-describedby="basic-addon1">
								</div>
								<label>Nama Kakak</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
									</div>
									<input autocomplete="off" type="text" name="namakakak" class="form-control" placeholder="Nama Lengkap Kakak" aria-label="kakak" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="col-md-4">
								<label>Nama Ayah</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
									</div>
									<input autocomplete="off" type="text" name="namaayah" class="form-control" placeholder="Nama Lengkap Ayah" aria-label="ayah" aria-describedby="basic-addon1">
								</div>
								<label>Nama Ibu</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
									</div>
									<input autocomplete="off" type="text" name="namaibu" class="form-control" placeholder="Nama Lengkap Ibu" aria-label="ibu" aria-describedby="basic-addon1">
								</div>
								<label>Pekerjaan Orangtua</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-tasks"></i></span>
									</div>
									<input autocomplete="off" type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan Ayah / Ibu" aria-label="work" aria-describedby="basic-addon1" required="">
								</div>
								<label>Alamat Orangtua</label>
								<div class="form-group">
									<textarea name="alamatortu" class="form-control" placeholder="Masukan Alamat Orangtua" required=""></textarea>	
								</div>
								<div  style="padding-top: 60px">
									<hr>
									<div class="form-group" align="center">
										<button type="submit" name="tambah" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
										<?php 
										if(isset($_POST['tambah']))
										{
											$data->add_siswa($_POST['namalengkap'],$_POST['jenkel'],$_POST['tempatlahir'],$_POST['tgllahir'],$_POST['agama'],$_POST['alamat'],$_POST['email'],$_POST['telepon'],$_POST['jmlsaudara'],$_POST['namaadik'],$_POST['namakakak'],$_POST['namaayah'],$_POST['namaibu'],$_POST['pekerjaan'],$_POST['alamatortu'],
												$_FILES['foto']);


											echo "<script>setTimeout(function () { 
												swal({
													title: 'Tersimpan',
													type: 'success',
													showConfirmButton: false,
													timer: 1000,
													});  
													},10); 
													window.setTimeout(function(){ 
														window.location.replace('index.php?halaman=siswa');
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