<?php include '../config/koneksi.php'; ?>
<?php 
	$id = $_POST['id'];
	$query=mysqli_query($koneksi,"SELECT*FROM user WHERE id_user='$id';");
	$dt=$query->fetch_assoc();
?>
<center>
  <label style="color: white; font-weight: bold; font-size: 22px">Profil Pengguna</label>
</center>
<br>
<div class="alert alert-primary">
	<i class="fa fa-user"></i>&nbsp;Nama Lengkap : <label style="font-weight: bold"><?php echo $dt['nama']; ?></label>
</div>
<div class="alert alert-primary">
	<i class="fa fa-map"></i>&nbsp;Alamat : <label style="font-weight: bold"><?php echo $dt['alamat']; ?></label>
</div>
<div class="alert alert-primary">
	<i class="fa fa-phone"></i>&nbsp;Telepon : <label style="font-weight: bold"><?php echo $dt['no_telp']; ?></label>
</div>
<div class="alert alert-primary">
	<i class="fa fa-envelope"></i>&nbsp;E-mail : <label style="font-weight: bold"><?php echo $dt['email']; ?></label>
</div>
<div class="alert alert-primary">
	<i class="fa fa-user"></i>&nbsp;Username : <label style="font-weight: bold"><?php echo $dt['username']; ?></label>
</div>
<div class="alert alert-primary">
	<i class="fa fa-key"></i>&nbsp;Password : <label style="font-weight: bold"><?php echo $dt['password']; ?></label>
</div>