<?php 
include '../../config/koneksi.php';

echo $id = $_POST['id'];
echo $nama = $_POST['nama'];


$update = mysqli_query($koneksi,"UPDATE gejala SET nama_gejala ='$nama' WHERE id_gejala = '$id'");

if ($update) {
	echo "berhasil";
}else{
	echo "gagal";
}

?>