<?php
include '../config/koneksi.php';

$norm = $_POST['norm'];
$tgl = $_POST['tgl'];

$cek = mysqli_query($koneksi,"SELECT count(no_rm) AS cek FROM pasien WHERE no_rm='$norm' AND tanggal_lahir='$tgl'");
$no = $cek->fetch_assoc();

if ($no['cek']==1) {

	$cek_berobat = mysqli_query($koneksi,"SELECT status FROM pasien_berobat WHERE no_rm='$norm' AND tanggal_lahir='$tgl' AND status='Belum Selesai'");
	$x = $cek_berobat->fetch_assoc();
	if ($x['status']=='Belum Selesai') {
		echo '1';
	}else{
		echo '0';
	}

}else{
	echo "2";
}

?>
