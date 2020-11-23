<?php include '../config/koneksi.php'; ?>
<?php 
$x =$_SESSION['level'];
$select = mysqli_query($koneksi,"SELECT*FROM login WHERE posisi = $x; ");
$data = $select->fetch_assoc();
?>
<div style="margin-top: 35px; margin-bottom: 35px;">
	<div class="auth-box lockscreen">
		<div class="content">
			<div class="logo text-center"><img src="../assets/img/logo.png"></div>
			<div class="user text-center">
				<img src="../assets/img/userx.png" class="img-circle" style="width: 60px" alt="Avatar">
				<h2 class="name"><?php echo $data['nama']; ?></h2>
			</div>
			<form>
				<div class="form-group">
					<label>Nama</label>
					<input id="nama" type="text" class="form-control" value="<?php echo $data['nama']; ?>">
					<input id="id" type="hidden" class="form-control" value="<?php echo $data['id_login']; ?>">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input id="usr" type="text" class="form-control" value="<?php echo $data['username']; ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input id="pass" type="text" class="form-control" value="<?php echo $data['password']; ?>">
				</div>
				<center>
					<button type="button" id="update" class="btn btn-primary">Update Profile</button>
				</center>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#update').click(function(){
			var usr = $('#usr').val();
			var pass = $('#pass').val();
			var nama = $('#nama').val();
			var id = $('#id').val();
			$.ajax({
				url:'proses/update_profil.php',
				type:'POST',
				data:{usr:usr,pass:pass,nama:nama,id:id},
				success:function(response){
					//console.log(response);
					$('h2').html(nama);
					swal('Updated','Berhasil Update Profil','success');

				}
			})
		})
	})
</script>