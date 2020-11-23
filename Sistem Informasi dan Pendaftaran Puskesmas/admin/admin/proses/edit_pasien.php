<?php 
include '../../config/koneksi.php';
$norm = $_POST['rm'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$kk = $_POST['kk'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tgl'];
$agama = $_POST['agama'];

	$update = mysqli_query($koneksi,"UPDATE pasien SET nama_pasien='$nama', jenis_kelamin='$jenkel',nama_kk='$kk',pekerjaan='$pekerjaan',alamat='$alamat',tempat_lahir='$tempat',tanggal_lahir='$tanggal', agama='$agama' WHERE no_rm='$norm'");

	if ($update) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

?>