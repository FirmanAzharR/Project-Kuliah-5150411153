<style type="text/css">
.img-circle {
	vertical-align: middle;
	width:200px;
	border-radius: 20%;
	margin-top: 20px
}

.card-avatar{
	border-bottom-right-radius: 30%;
	margin-right: 10px 
}
</style>

<div style="padding: 25px" class="animated fadeIn">
	<?php if ($_SESSION['hak_akses']=="admin"): ?>
		<?php $select=$data->profil_admin($_SESSION['id']); ?>
		<div class="row">
			<div class="col-md-4">
				<div class="card card-avatar">
					<center><img src="../../img/avatar.png" class="img-circle card-img-top img-fluid"></center>
					<div class="card-body">
						<hr>
						<div class="card-text" align="center" style="font-weight: bold;font-size: 20px;color: #7A7A7D">Administrator</div>
					</div>
				</div>
			</div>
			<div class="col-md-8" style="border-left: 1px #ddd solid">
				<table class="table table-hover table-responsive" style="margin-left: 10px">
					<tbody style="opacity: 0.7;">	
						<tr>
							<td width="300px"><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td width="530px"><?php echo $select['nama'] ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-mars-stroke"></i>&nbsp;&nbsp;Jenis Kelamin</td>
							<td><?php echo $select['jenkel'] ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Tempat / Tanggal Lahir</td>
							<td><?php echo $select['tempat_lahir'] ?>, <?php echo $select['tanggal_lahir'] ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat</td>
							<td><?php echo $select['alamat'] ?></td>
						</tr>	
						<tr>
							<td><i class="fa fa-comment"></i>&nbsp;&nbsp;Email</td>
							<td><?php echo $select['email'] ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Telepon</td>
							<td><?php echo $select['telepon'] ?></td>
						</tr>	
					</tbody>
				</table>	
				<button class="btn btn-warning btn-sm openmodal"  data-toggle="modal" style="color: white;margin-left: 10px"><i class="fa fa-edit"></i>&nbsp;Edit</button>	
				<button class="btn btn-primary btn-sm openmodal1" style="color: white;margin-left: 10px"><i class="fa fa-gear"></i>&nbsp;Akun</button>	
			</div>
		</div>
	<?php endif ?>
	<?php if ($_SESSION['hak_akses']=="kepala"): ?>
		<?php $select=$data->profil_kepala($_SESSION['id']); ?>
		<div class="row">
			<div class="col-md-4">
				<div class="card card-avatar">
					<center><img  style="width: 65%;margin-top: 15%" src="foto/<?php echo $select['gambar']?>" class="img-circle card-img-top img-fluid img-thumbnail"></center>
					<div class="card-body">
						<hr>
						<div class="card-text" align="center" style="font-weight: bold;font-size: 20px;color: #7A7A7D">Kepala Sekolah</div>
					</div>
				</div>
			</div>
			<div class="col-md-8" style="border-left: 1px #ddd solid">
				<table class="table table-hover table-responsive" style="margin-left: 10px">
					<tbody style="opacity: 0.7;">
						<tr>
							<td width="300px"><i class="fa fa-user"></i>&nbsp;&nbsp;NIP&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td width="530px"><?php echo $select['nip'] ?></td>
						</tr>	
						<tr>
							<td width="300px"><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td width="530px"><?php echo $select['nama'] ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-mars-stroke"></i>&nbsp;&nbsp;Jenis Kelamin</td>
							<td><?php echo $select['jenkel'] ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Tempat / Tanggal Lahir</td>
							<td><?php echo $select['tmpt_lhr'] ?>, <?php echo $select['tgl_lhr'] ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat</td>
							<td><?php echo $select['alamat'] ?></td>
						</tr>	
						<tr>
							<td><i class="fa fa-comment"></i>&nbsp;&nbsp;Email</td>
							<td><?php echo $select['email'] ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Telepon</td>
							<td><?php echo $select['telepon'] ?></td>
						</tr>	
					</tbody>
				</table>
				<button class="btn btn-warning btn-sm open" style="color: white;margin-left: 10px"><i class="fa fa-edit"></i>&nbsp;Edit</button>	
				<button class="btn btn-primary btn-sm open1" style="color: white;margin-left: 10px"><i class="fa fa-gear"></i>&nbsp;Akun</button>			
			</div>
		</div>
	<?php endif ?>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post">
				<div class="modal-body">
					<input type="hidden" readonly="" name="id" value="<?php echo $select['kode_admin'] ?>">
					<div class="form-group">
						<input type="text" class="form-control" name="nama" value="<?php echo $select['nama'] ?>">
					</div>
					<div class="form-group">
						<select name="jenkel" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
							<option value="" disabled selected>Pilih Jenis Kelamin</option>
							<option value="L" <?php if ($select['jenkel']=="L") {
								echo "selected";
							} ?>>Laki - Laki</option>
							<option value="P" <?php if ($select['jenkel']=="P") {
								echo "selected";
							} ?>>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="tmptlahir" value="<?php echo $select['tempat_lahir'] ?>">
					</div>
					<div class="form-group">
						<input type="date" class="form-control" name="tgllahir" value="<?php echo $select['tanggal_lahir'] ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="alamat" value="<?php echo $select['alamat'] ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="telepon" value="<?php echo $select['telepon'] ?>">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" value="<?php echo $select['email'] ?>">
					</div>
					<button class="btn btn-sm btn-success" name="update"><i class="fa fa-save"></i>&nbsp;simpan</button>
					<?php if (isset($_POST['update'])) {
						$data->profil_update($_POST['id'],$_POST['nama'],$_POST['jenkel'],$_POST['tmptlahir'],$_POST['tgllahir'],$_POST['alamat'],$_POST['email'],$_POST['telepon']);
					} ?>
					<button class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;batal</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" readonly="" name="id" value="<?php echo $select['kode_admin'] ?>">
				<?php $select=$data->profil_akun($_SESSION['id']); ?>
				<h5 class="modal-title" id="exampleModalLongTitle">Akun</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" readonly class="form-control" name="user" value="<?php echo $select['username'] ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="pass" value="<?php echo $select['password'] ?>">
					</div>
					<button class="btn btn-sm btn-success" name="update2"><i class="fa fa-save"></i>&nbsp;simpan</button>
					<?php if (isset($_POST['update2'])) {
						$data->profil_akun_update($_POST['user'],$_POST['pass']);
					} ?>
					<button class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;batal</button>
				</div>
			</form>
		</div>
	</div>
</div>















<div class="modal fade" id="myModalkepala" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post">
				<div class="modal-body">
					<?php $select=$data->profil_kepala($_SESSION['id']); ?>
					<input type="hidden" readonly="" name="id" value="<?php echo $select['kode'] ?>">
					<div class="form-group">
						<input type="text" class="form-control" name="nama" value="<?php echo $select['nama'] ?>">
					</div>
					<div class="form-group">
						<select name="jenkel" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
							<option value="" disabled selected>Pilih Jenis Kelamin</option>
							<option value="L" <?php if ($select['jenkel']=="L") {
								echo "selected";
							} ?>>Laki - Laki</option>
							<option value="P" <?php if ($select['jenkel']=="P") {
								echo "selected";
							} ?>>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="tmptlahir" value="<?php echo $select['tmpt_lhr'] ?>">
					</div>
					<div class="form-group">
						<input type="date" class="form-control" name="tgllahir" value="<?php echo $select['tgl_lhr'] ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="alamat" value="<?php echo $select['alamat'] ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="telepon" value="<?php echo $select['telepon'] ?>">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" value="<?php echo $select['email'] ?>">
					</div>
					<button class="btn btn-sm btn-success" name="updatekepala"><i class="fa fa-save"></i>&nbsp;simpan</button>
					<?php if (isset($_POST['updatekepala'])) {
						$data->profil_kepala_update($_POST['id'],$_POST['nama'],$_POST['jenkel'],$_POST['tmptlahir'],$_POST['tgllahir'],$_POST['alamat'],$_POST['email'],$_POST['telepon']);
					} ?>
					<button class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;batal</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="myModalkepala1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" readonly="" name="id" value="<?php echo $select['kode_admin'] ?>">
				<?php $select=$data->profil_akun($_SESSION['id']); ?>
				<h5 class="modal-title" id="exampleModalLongTitle">Akun</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" readonly class="form-control" name="user" value="<?php echo $select['username'] ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="pass" value="<?php echo $select['password'] ?>">
					</div>
					<button class="btn btn-sm btn-success" name="update2"><i class="fa fa-save"></i>&nbsp;simpan</button>
					<?php if (isset($_POST['update2'])) {
						$data->profil_akun_update($_POST['user'],$_POST['pass']);
					} ?>
					<button class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;batal</button>
				</div>
			</form>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$(".open").click(function(){
			var myModal = $('#myModalkepala');
			myModal.modal({ show: true });
			return false;
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".open1").click(function(){
			var myModal = $('#myModalkepala1');
			myModal.modal({ show: true });
			return false;
		});
	});
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$(".openmodal").click(function(){
			var myModal = $('#myModal');
			myModal.modal({ show: true });
			return false;
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".openmodal1").click(function(){
			var myModal = $('#myModal1');
			myModal.modal({ show: true });
			return false;
		});
	});
</script>