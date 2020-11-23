<?php
//mengaktifkan session
session_start();
 
header("Content-type: image/png");
 
// menentukan session
$_SESSION["Captcha"]="";
 
// membuat gambar dengan menentukan ukuran
$gbr = imagecreate(100, 35);

//warna background captcha
imagecolorallocate($gbr,50, 122, 219);
 
// pengaturan font captcha
$color = imagecolorallocate($gbr, 253, 252, 252);
$font = "Allura-Regular.otf"; 
$ukuran_font = 20;
$posisi = 25;
// membuat nomor acak dan ditampilkan pada gambar
for($i=0;$i<=3;$i++) {
	// jumlah karakter
	$angka=rand(0, 9);
 
	$_SESSION["Captcha"].=$angka;
 
	$kemiringan= rand(20, 20);
 	
	imagettftext($gbr, $ukuran_font, $kemiringan, 9+25*$i, $posisi, $color, $font, $angka);	
}
//untuk membuat gambar 
imagepng($gbr); 
imagedestroy($gbr);
?>