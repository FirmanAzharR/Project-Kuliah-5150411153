<?php 
include '../../config/koneksi.php';
$profil = mysqli_query($koneksi,"SELECT*FROM user WHERE id_user=1");
$data = $profil->fetch_assoc();
?>
<input type="text" id="nama" class="form-control" value="<?php echo $data['nama']; ?>"><br>
<input type="text" id="telepon" class="form-control" value="<?php echo $data['telepon']; ?>"><br>
<input type="email" id="email" class="form-control" value="<?php echo $data['email'] ;?>"><br>
<input type="text" id="password" class="form-control" value="<?php echo $data['password']; ?>">