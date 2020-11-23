<?php 
include '../../config/koneksi.php';

if (isset($_POST['kucing'])) {
	$jml = $_POST['jml_kucing'];
	$nm=$_POST['kucing'];
	$select = mysqli_query($koneksi,"SELECT total,sisa FROM stok_kandang WHERE nama='$nm'");
	$x = $select->fetch_assoc();
	
	if ($jml>$x['total']) {
		$jml_sisa = ($jml-$x['total'])+$x['sisa'];
	}
	else{
		$jml_sisa = $x['sisa']-($x['total']-$jml);
	}
	echo $sisa = $jml_sisa;

	$update = mysqli_query($koneksi,"UPDATE stok_kandang SET total=$jml, sisa=$sisa WHERE nama='$nm';");
	if ($update) {
		header("Location:../index.php?halaman=menu1#");
	}
}else{
	echo $jml = $_POST['jml_anjing'];
	echo $nm=$_POST['anjing'];
	$select = mysqli_query($koneksi,"SELECT total,sisa FROM stok_kandang WHERE nama='$nm'");
	$x = $select->fetch_assoc();
	
	if ($jml>$x['total']) {
		$jml_sisa = ($jml-$x['total'])+$x['sisa'];
	}
	else{
		$jml_sisa = $x['sisa']-($x['total']-$jml);
	}
	echo $sisa = $jml_sisa;
	$update = mysqli_query($koneksi,"UPDATE stok_kandang SET total=$jml, sisa=$sisa WHERE nama='$nm';");
	header("Location:../index.php?halaman=menu1#");
}
?>