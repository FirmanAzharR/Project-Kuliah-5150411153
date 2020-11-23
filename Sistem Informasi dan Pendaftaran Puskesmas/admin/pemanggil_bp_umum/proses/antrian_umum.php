<?php 
include '../../config/koneksi.php';
$select = mysqli_query($koneksi,"SELECT no_antrian FROM pasien_berobat WHERE tanggal_berobat=CURDATE() AND tujuan='bpumum' AND status='Selesai' ORDER BY(no_antrian) DESC LIMIT 1");
$cek = $select->num_rows;
$antrian = $select->fetch_assoc();
if ($cek==0) {
	$x = 0;
}else{
	$x=$antrian['no_antrian'];
}
?>