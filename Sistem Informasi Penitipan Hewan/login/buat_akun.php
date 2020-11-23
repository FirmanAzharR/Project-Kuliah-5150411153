<?php 

include '../config/koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$usr = $_POST['usr'];
$pass = $_POST['pass'];
$mail = $_POST['mail'];

$query=mysqli_query($koneksi,"SELECT username FROM user WHERE username='$usr';");
$cek = $query->num_rows;

$query1=mysqli_query($koneksi,"SELECT email FROM user WHERE email='$mail';");
$cek1 = $query1->num_rows;

$create_id=mysqli_query($koneksi,"SELECT id_user FROM user ORDER BY(id_user) DESC LIMIT 1;");
$x = $create_id->fetch_assoc();
$id = $x['id_user'];
$new_id = $id+1;

if ($cek>=1) {
	echo "same_usr";
}
elseif($cek1>=1){
	echo "same_mail";
}
elseif($nama==''||$alamat==''||$telp==''||$mail==''||$usr==''||$pass==''){
	echo "empty_input";
}
else{
	$create=mysqli_query($koneksi,"INSERT INTO user(id_user,nama,alamat,no_telp,username,password,email) VALUES($new_id,'$nama','$alamat','$telp','$usr','$pass','$mail');");
	if ($create) {
		echo "success";
	}else{
		echo "fail";
	}
}
?>