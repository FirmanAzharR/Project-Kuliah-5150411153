<?php
include '../config/koneksi.php';
$tujuan = $_POST['tujuan'];

$query = mysqli_query($koneksi, "SELECT no_antrian FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='$tujuan' AND status='Selesai' ORDER BY(no_antrian) DESC LIMIT 1");
$x = $query->fetch_assoc();
$cek1 = $query->num_rows;

$jml = mysqli_query($koneksi,"select no_antrian from pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='$tujuan'");
$total = $jml->num_rows;

$jml2 = mysqli_query($koneksi,"select no_antrian from pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='$tujuan'  AND status='Belum Selesai' OR status='Tunda'");
$sisa = $jml2->num_rows;
if($cek1==0){
	echo 0;
}else{
    
	echo $x['no_antrian'];
}
echo "<br>";
	echo "<div style='font-size:15px'>
	<label>Jumlah antrian :  $total </label>
	<br>
	<label>Sisa antrian : $sisa </label>
	</div>";

?>
