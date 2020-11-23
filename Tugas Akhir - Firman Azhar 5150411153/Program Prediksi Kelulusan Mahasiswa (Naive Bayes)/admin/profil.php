<?php include '../config/koneksi.php'; ?>
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
<?php 
$data = mysqli_query($koneksi,"SELECT*FROM akun WHERE id='1'");
$profil = mysqli_fetch_assoc($data);
//echo "<pre>";
//print_r($profil);
//echo "</pre>";
?>
<div style="margin-top: 15px;margin-left: 15px;margin-right: 15px">
	<h3>Profil</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<div class="card card-avatar">
				<center><img src="image/<?php echo $profil['foto'] ?>" class="img-circle card-img-top img-fluid"></center>
				<div class="card-body">
					<hr>
					<div class="card-text" align="center" style="font-size: 15px;color: #7A7A7D">Admin</div>
				</div>
			</div>
		</div>
		<div class="col-md-8" style="border-left: 1px #ddd solid">
			<table class="table table-hover table-responsive" style="margin-left: 10px">
				<tbody style="opacity: 0.7;">	
					<tr>
						<td width="300px"><i class="fa fa-user"></i>&nbsp;&nbsp;Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="530px"><?php echo $profil['nama']?></td>
					</tr>
					<tr>
						<td><i class="fa fa-mars-stroke"></i>&nbsp;&nbsp;Jenis Kelamin</td>
						<td><?php if ($profil['jenis_kelamin']=="L") {
							echo "Laki-Laki";
						}else{
							echo "Perempuan";
						} ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-home"></i>&nbsp;&nbsp;Alamat</td>
						<td><?php echo $profil['alamat'] ?></td>
					</tr>	
					<tr>
						<td><i class="fa fa-comment"></i>&nbsp;&nbsp;Email</td>
						<td><?php echo $profil['email'] ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Telepon</td>
						<td><?php echo $profil['telepon'] ?></td>
					</tr>	
				</tbody>
			</table>	
			<button class="btn btn-warning btn-sm openmodal" style="color: white;margin-left: 10px"><i class="fa fa-edit"></i>&nbsp;Edit</button>	
			<button class="btn btn-primary btn-sm openmodal1" style="color: white;margin-left: 10px"><i class="fa fa-gear"></i>&nbsp;Akun</button>	
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" readonly="" name="id" value="">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Profil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="edit_profil.php">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="nama" value="<?php echo $profil['nama']?>">
					</div>
					<div class="form-group">
						<select name="sex" class="form-control" aria-label="jk" aria-describedby="basic-addon1" required="">
							<option value="" disabled selected>Pilih Jenis Kelamin</option>
							<option value="L" <?php if ($profil['jenis_kelamin']=="L") {
								echo "selected";
							} ?>>Laki - Laki</option>
							<option value="P" <?php if ($profil['jenis_kelamin']=="P") {
								echo "selected";
							} ?>>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="alamat" value="<?php echo $profil['alamat']?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="email" value="<?php echo $profil['email']?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="telepon" value="<?php echo $profil['telepon']?>">
					</div>
					<div class="form-group">
						<input type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg">
					</div>
					<hr>
					<center><img id="preview" class="img-thumbnail" src="#" width="150px"></center>
					<hr>
					<button class="btn btn-sm btn-success" name="update2"><i class="fa fa-save"></i>&nbsp;simpan</button>

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
				<input type="hidden" name="id" value="">
				<h5 class="modal-title" id="exampleModalLongTitle">Akun</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="user" value="<?php echo $profil['email']?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="pass" value="<?php echo $profil['password']?>">
					</div>
					<button class="btn btn-sm btn-success" name="update2"><i class="fa fa-save"></i>&nbsp;simpan</button>

					<button class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;batal</button>
				</div>
			</form>
		</div>
	</div>
</div>

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

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#image").change(function(){
		readURL(this);
	});
</script>