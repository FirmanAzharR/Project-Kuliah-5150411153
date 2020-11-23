<?php 
include '../../config/koneksi.php';

echo $kode=$_POST['kode'];
echo $kriteria=$_POST['kriteria'];
echo $crips=$_POST['crips'];
echo $nilai=$_POST['nilai'];

$update = mysqli_query($koneksi,"UPDATE nilai_kriteria SET kode_kriteria='$kriteria', crips='$crips', nilai='$nilai' WHERE kode_nilai_kriteria='$kode'");

if ($update) {
	echo "updated";
}else{
	echo "fail";
}

?>